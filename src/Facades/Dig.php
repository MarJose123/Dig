<?php

namespace Marjose123\Dig\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Marjose123\Dig\Dig
 */
class Dig extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Marjose123\Dig\Dig::class;
    }
}
