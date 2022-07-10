<?php
/**
 * ClientException.php
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

class ClientException extends \Exception implements \Psr\Http\Client\ClientExceptionInterface
{
}
