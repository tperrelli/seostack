<?php

namespace Tperrelli\SeoStack\Traits;

use SeoStack;

trait HasSeoStack
{
    protected static function booted()
    {
        static::created(function ($model) {
            SeoStack::save($model);
        });
        
        static::updated(function ($model) {
            SeoStack::save($model);
        });
    }
}