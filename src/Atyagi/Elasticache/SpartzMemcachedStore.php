<?php

use Illuminate\Cache\MemcachedStore;
use Illuminate\Cache\StoreInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class SpartzMemcachedStore extends MemcachedStore implements StoreInterface
{
    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string $key
     * @return mixed
     */
    public function get($key)
    {
        try {
            return parent::get($key);
        } catch (ErrorException $e) {
            if (str_contains($e->getMessage(), 'igbinary')) {
                $url = Request::url();
                Log::error('igbinary error -> SpartzMemcachedStore::get(), key: ' . $key . ', url: ' . $url);
            }

            //now that we've caught it, let's invalidate the bad cache key and return like nothing was cached
            $this->forget($key);

            return false;
        }
    }

    /**
     * Store an item in the cache for a given number of minutes.
     *
     * @param  string $key
     * @param  mixed $value
     * @param  int $minutes
     * @return void
     */
    public function put($key, $value, $minutes)
    {
        try {
            parent::put($key, $value, $minutes);
        } catch (ErrorException $e) {
            if (str_contains($e->getMessage(), 'igbinary')) {
                $url = Request::url();
                Log::error('igbinary error -> SpartzMemcachedStore::put(), key: ' . $key . ', value: ' . $value . ', minutes: ' . $minutes . ', url: ' . $url);
            }

            throw $e;
        }
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string $key
     * @param  mixed $value
     * @return void
     */
    public function forever($key, $value)
    {
        try {
            return parent::forever($key, $value);
        } catch (ErrorException $e) {
            if (str_contains($e->getMessage(), 'igbinary')) {
                $url = Request::url();
                Log::error('igbinary error -> SpartzMemcachedStore::forever(), key: ' . $key . ', value: ' . $value . ', url: ' . $url);
            }

            throw $e;
        }
    }
}
