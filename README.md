Elasticache Laravel
===================
AWS Elasticache Session and Cache Drivers for Laravel (Memcached specifically). This is a fork to add the option of consistent hashing (always on) and to use the GracefulCacheRepository and SpartzMemcachedStore.

## Setup

This package requires the memcached extension for PHP. Please see [this link](http://php.net/manual/en/book.memcached.php) for installation instructions.

To install this branch with composer, add this as a dependency to your project:
```
"spartz/elasticache-laravel": "~1.2"
```

Once `composer update` is ran, add

`'Spartz\Elasticache\ElasticacheServiceProvider',`

to the providers array in `app/config.php`. It's important that this service provider comes AFTER the default `'Illuminate\Session\SessionServiceProvider'` session service provider.

At this point, inside of `app/session.php` and `app/cache.php`, you can use `elasticache` as a valid driver.

## Configuration

All configuration lives within `app/session.php` and `app/cache.php`. The key ones are below:

#### Session.php
- lifetime -- the session lifetime within the Memcached environment
- cookie -- this is the prefix for the session ID to prevent clashing

#### Cache.php
- memcached -- follow the Laravel defaults for host/port information
