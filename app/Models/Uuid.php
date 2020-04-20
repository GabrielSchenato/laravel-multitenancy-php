<?php

namespace App\Models;

use Ramsey\Uuid\Uuid as UuidUuid;

trait Uuid
{
    protected static function bootUuid()
    {
        static::creating(function ($obj) {
            $obj->uuid = UuidUuid::uuid4();
        });
    }

    public function getRouteKey()
    {
        return 'uuid';
    }
}
