Elasticache Laravel
===================
[![Build Status](https://travis-ci.org/atyagi/elasticache-laravel.svg?branch=master)](https://travis-ci.org/atyagi/elasticache-laravel)
[![Coverage Status](https://img.shields.io/coveralls/atyagi/elasticache-laravel.svg?style=flat)](https://coveralls.io/r/atyagi/elasticache-laravel?branch=master)
[![Packagist](http://img.shields.io/packagist/v/atyagi/elasticache-laravel.svg?style=flat)](https://packagist.org/packages/atyagi/elasticache-laravel)

AWS Elasticache Session and Cache Drivers for Laravel (Memcached specifically). This is a fork to add the option of consistent hashing (always on) and to use the GracefulCacheRepository and SpartzMemcachedStore.

## Setup

This package requires the memcached extension for PHP. Please see [this link](http://php.net/manual/en/book.memcached.php) for installation instructions.

To install this branch with composer, add this repository to your repositories configuration:
```

```

And add `"atyagi/elasticache-laravel": "dev-autodiscovery"` to your composer.json dependencies.

Once `composer update` is ran, add

`'Atyagi\Elasticache\ElasticacheServiceProvider',`

to the providers array in `app/config.php`. It's important that this service provider comes AFTER the default `'Illuminate\Session\SessionServiceProvider'` session service provider.

At this point, inside of `app/session.php` and `app/cache.php`, you can use `elasticache` as a valid driver.

#### Versions
- dev-master -- Stable release version
- dev-dev -- Generally stable, but still the main development branch
- tags -- see Packagist (https://packagist.org/packages/atyagi/elasticache-laravel) for specific tagged versions. Most releases to master get tagged.

## Configuration

All configuration lives within `app/session.php` and `app/cache.php`. The key ones are below:

#### Session.php
- lifetime -- the session lifetime within the Memcached environment
- cookie -- this is the prefix for the session ID to prevent clashing

#### Cache.php
- memcached -- follow the Laravel defaults for host/port information


