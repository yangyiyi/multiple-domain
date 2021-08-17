# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 2021-08-11
1. Added two default ['web.php'](config/web.php) & ['api.php'](config/api.php) to allow [`Domain.php`](src/Domain.php) based on the config to generate the route.
2. Added domain type in [`Domain.php`](src/Domain.php).
3. Added laravel publish command function and merge config function in [`ServiceProvider`](src/ServiceProvider.php).

## [0.0.2] - 2021-07-15
1. Added [`Domain.php`](src/Domain.php) to handle the Route structure generate.
2. Added Exception [`InvalidOption.php`](src/Exceptions/InvalidOption.php) to handle invalid information from `Domain.php`.

## [0.0.1] - 2021-07-14
Initial commit and early project setup.
