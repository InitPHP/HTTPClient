<?php
/**
 * Client.php
 *
 * This file is part of HTTPClient.
 *
 * @author     Muhammet ŞAFAK <info@muhammetsafak.com.tr>
 * @copyright  Copyright © 2022 Muhammet ŞAFAK
 * @license    ./LICENSE  MIT
 * @version    1.0
 * @link       https://www.muhammetsafak.com.tr
 */

declare(strict_types=1);

namespace InitPHP\HTTPClient;

use InitPHP\Curl\Curl;
use \Psr\Http\Message\{RequestInterface, ResponseInterface};
use \InitPHP\HTTP\{Response, Stream};

class Client implements \Psr\Http\Client\ClientInterface
{
    /** @var Curl */
    protected Curl $curl;

    protected $options = [
        'allow_redirect'    => true,
        'max_redirect'      => 3,
        'timeout'           => 0,
        'proxy'             => null,
        'ssl'               => null,
    ];

    public function __construct(array $options = [])
    {
        if(!empty($options)){
            $this->options = array_merge($this->options, $options);
        }
    }

    public function __destruct()
    {
        unset($this->curl, $this->options);
    }

    /**
     * @inheritDoc
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->curl = new Curl();

        try {
            $url = $request->getUri()->__toString();
            $version = $request->getProtocolVersion();
            $method = $request->getMethod();
            $headers = $request->getHeaders();
            $body = $request->getBody()->getContents();
        }catch (\Exception $e) {
            throw new RequestException($request, $e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        try {
            $this->curl->setUrl($url)
                ->setVersion($version)
                ->setMethod($method)
                ->setHeaders($headers);
            if(!empty($body)){
                $this->curl->setBody($body);
            }

            if($this->options['allow_redirect'] !== FALSE){
                $this->curl->setAllowRedirect((int)$this->options['max_redirect']);
            }

            $this->curl->setTimeout((int)$this->options['timeout']);

            if(!empty($this->options['ssl'])){
                $this->curl->setSSL(
                    (int)($this->options['ssl']['host'] ?? 2),
                    (int)($this->options['ssl']['verify'] ?? 1),
                    ($this->options['ssl']['version'] ?? null)
                );
            }

            if(!empty($this->options['proxy'])){
                $this->curl->setProxy($this->options['proxy']);
            }

            $this->curl->handler();
        }catch (\Exception $e) {
            throw new ClientException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        $error = $this->curl->getError();
        if(!empty($error)){
            throw new NetworkException($request, $error);
        }

        $res = $this->curl->getResponse();
        if(empty($res)){
            throw new ClientException('No response with CURL or response returned blank.');
        }

        return new Response((int)$res['code'], $res['headers'], (new Stream((string)$res['body'], null)), $res['version']);
    }

}
