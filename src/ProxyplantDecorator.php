<?php

namespace Muscobytes\ProxyplantLaravel;


use Illuminate\Cache\Repository;
use Muscobytes\Proxyplant\Interfaces\ProxyplantInterface;


class ProxyplantDecorator
{
    protected ProxyplantInterface $provider;

    protected Repository $cache;

    protected array $providers = [];


    public function __construct(ProxyplantInterface $provider, Repository $cache)
    {
        $this->provider = $provider;
        $this->cache = $cache;
    }


    public function getProvider(string $providerName)
    {
        if (!key_exists($providerName, $this->providers)) {
            $this->providers[$providerName] = new ProxyProviderDecorator($this->provider->getProvider($providerName), $this->cache);
        }
        return $this->providers[$providerName];
    }


}