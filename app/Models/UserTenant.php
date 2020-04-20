<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Model;

class UserTenant extends Model
{
    use TenantModels, Uuid;
    public static function createUser(array $attributes)
    {
        $admin = self::create([]);
        $admin->users()->create($attributes['user']);
        return $admin;
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }
}
