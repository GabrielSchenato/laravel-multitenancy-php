<?php

namespace App\Listeners;


use Illuminate\Support\Facades\Facade;

class SectionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return  SectionGuardManager::class;
    }
}
