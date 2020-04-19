<?php

use App\Models\Admin;
use App\Models\Company;
use App\Models\UserTenant;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    private $password = 'secret';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Tenant::setTenant(Company::find(1));
        $users = factory(\App\Models\User::class, 1)
            ->make([
                'email' => 'admin@user.com',
            ]);
        foreach ($users as $user) {
            Admin::createUser([
                'user' => $user->toArray() + ['password' => $this->password]
            ]);
        };

        \Tenant::setTenant(Company::find(2));
        $users = factory(\App\Models\User::class, 1)
            ->make([
                'email' => 'user1@user.com',
            ]);
        foreach ($users as $user) {
            UserTenant::createUser([
                'user' => $user->toArray() + ['password' => $this->password]
            ]);
        };

        \Tenant::setTenant(Company::find(3));
        $users = factory(\App\Models\User::class, 1)
            ->make([
                'email' => 'user2@user.com',
            ]);
        foreach ($users as $user) {
            UserTenant::createUser([
                'user' => $user->toArray() + ['password' => $this->password]
            ]);
        };
    }
}
