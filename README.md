# InitPHP HTTP Client

> ## ⚠️ DEPRECATED — Use [`initphp/http`](https://github.com/InitPHP/HTTP) instead
>
> As part of the InitPHP package consolidation, **this package has been merged into [`initphp/http`](https://github.com/InitPHP/HTTP) starting with version 2.2.** The consolidated package ships its own PSR-18 client that talks to `ext-curl` directly — no separate cURL wrapper is required.
>
> This repository is kept read-only for historical reference. **No further updates will be released.**
>
> ### Why this package no longer works
>
> The standalone `\InitPHP\HTTPClient\Client` was written against `initphp/http:^1.x`, which used the flat `\InitPHP\HTTP\*` namespace. In `initphp/http:^2.0` those classes moved to `\InitPHP\HTTP\Message\*`, so this package's `use` statements no longer resolve. It is effectively broken against any current version of `initphp/http`.
>
> ### Migration
>
> Drop the dependency and use the canonical client shipped in `initphp/http`:
>
> ```diff
> - "initphp/http-client": "^1.0",
> - "initphp/http": "^1.0",
> + "initphp/http": "^2.2"
> ```
>
> Code change:
>
> ```php
> // Before
> use InitPHP\HTTPClient\Client;
> use InitPHP\HTTP\Request;
>
> $client   = new Client(['timeout' => 0]);
> $request  = new Request('GET', 'https://example.com');
> $response = $client->sendRequest($request);
>
> // After
> use InitPHP\HTTP\Client\Client;
> use InitPHP\HTTP\Message\Request;
>
> $client   = new Client();
> $request  = new Request('GET', 'https://example.com');
> $response = $client->sendRequest($request);
> ```
>
> See the [HTTP README — Migrating from `initphp/http-client`](https://github.com/InitPHP/HTTP#migrating-from-initphphttp-client) for option-by-option translation notes.

---

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
