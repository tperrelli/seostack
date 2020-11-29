<?php

namespace Tperrelli\SeoStack\Facades;

use Illuminate\Support\Facades\Facade;

class SeoStack extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'seostack';
    }
}