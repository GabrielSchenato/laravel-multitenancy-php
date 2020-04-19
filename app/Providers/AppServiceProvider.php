<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\User;
use App\Models\UserTenant;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('is_admin', function ($attribute, $value, $parameters, $validator) {
            $user = User::whereEmail($value)->first();
            return $user && $user->isType(Admin::class);
        });
        \Validator::extend('is_user_tenant', function ($attribute, $value, $parameters, $validator) {
            $user = User::whereEmail($value)->first();
            return $user && $user->isType(UserTenant::class);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        ResetPassword::toMailUsing(function ($user, $token) {
            $routeReset = route($user->isType(Admin::class) ? 'admin.password.reset' : 'app.password.reset', $token, false);
            return (new MailMessage)
                ->subject(\Lang::get('Reset Password Notification'))
                ->line(\Lang::get('You are receiving this email because we received a password reset request for your account.'))
                ->action(\Lang::get('Reset Password'), url(config('app.url') . $routeReset))
                ->line(\Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
                ->line(\Lang::get('If you did not request a password reset, no further action is required.'));
        });
    }
}
