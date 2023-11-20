<?php

declare(strict_types=1);

namespace Centrex\LaravelCountries\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Centrex\LaravelCountries\Countries
 */
class Countries extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Centrex\LaravelCountries\Countries::class;
    }
}
