# InitPHP HTTP Client

It is HTTP Client library following Psr-18 standards. It uses cURL for HTTP requests. 

## Requirements

- PHP 7.4 or higher
- [Psr-18 HTTP Client Interface Package](https://github.com/php-fig/http-client)
- [InitPHP HTTP Library](https://github.com/InitPHP/HTTP)
- [InitPHP Curl Library](https://github.com/InitPHP/Curl)

In the above libraries themselves; It can have dependencies such as libcurl.

## Installation

```
composer require initphp/http-client
```

## Usage

```php
require_once "vendor/autoload.php";
use InitPHP\HTTPClient\Client;

/** @var \Psr\Http\Client\ClientInterface $client */
$client = new Client();

/** @var \Psr\Http\Message\RequestInterface $request */
$request = new \InitPHP\HTTP\Request('GET', 'https://www.example.com');

/** @var \Psr\Http\Message\ResponseInterface $response */
$response = $client->sendRequest($request);
```


## Getting Help

If you have questions, concerns, bug reports, etc, please file an issue in this repository's Issue Tracker.

## Getting Involved

> All contributions to this project will be published under the MIT License. By submitting a pull request or filing a bug, issue, or feature request, you are agreeing to comply with this waiver of copyright interest.

There are two primary ways to help:

- Using the issue tracker, and
- Changing the code-base.

### Using the issue tracker

Use the issue tracker to suggest feature requests, report bugs, and ask questions. This is also a great way to connect with the developers of the project as well as others who are interested in this solution.

Use the issue tracker to find ways to contribute. Find a bug or a feature, mention in the issue that you will take on that effort, then follow the Changing the code-base guidance below.

### Changing the code-base

Generally speaking, you should fork this repository, make changes in your own fork, and then submit a pull request. All new code should have associated unit tests that validate implemented features and the presence or lack of defects. Additionally, the code should follow any stylistic and architectural guidelines prescribed by the project. In the absence of such guidelines, mimic the styles and patterns in the existing code-base.

## Credits

- [Muhammet ŞAFAK](https://www.muhammetsafak.com.tr) <<info@muhammetsafak.com.tr>>

## License

Copyright &copy; 2022 [MIT License](./LICENSE)
