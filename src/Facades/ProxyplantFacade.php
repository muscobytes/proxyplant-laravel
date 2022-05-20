<?php

namespace Muscobytes\ProxyplantLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class ProxyplantFacade extends Facade
{
    /**
     * Get the registered method of the component.
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'proxyplantdecorator';
    }
}