<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public static function createUserAndTenant(array $attributes)
    {
        $admin = self::createUser($attributes);
        $userTenant = UserTenant::create([]);
        $user = $admin->users->first();
        $userTenant->users()->sync($user->id);
        return ['admin' => $admin, 'user_tenant' => $userTenant];
    }

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
