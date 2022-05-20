<?php

namespace Muscobytes\ProxyplantLaravel;

use Illuminate\Cache\Repository;
use Muscobytes\Proxyplant\DTO\ProxyDTO;
use Muscobytes\Proxyplant\Interfaces\ProxyProviderInterface;

class ProxyProviderDecorator implements ProxyProviderInterface
{
    protected ProxyProviderInterface $provider;

    protected Repository $cache;

    public function __construct(ProxyProviderInterface $provider, Repository $cache)
    {
        $this->provider = $provider;
        $this->cache = $cache;
    }


    public function load(): array {
        $config = config('proxyplant');
        $cache_key = get_class($this->provider);
        return $this->cache->remember($cache_key, $config['cache']['ttl'], function() {
            return $this->provider->load();
        });
    }


    public function getRandomProxy(array $list = []): ProxyDTO
    {
        return $this->provider->getRandomProxy($this->load());
    }

}