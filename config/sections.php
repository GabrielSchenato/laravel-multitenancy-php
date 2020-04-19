<?php

return [
    'sections' => [
        'app' => [
            'login' => [
                'route_login' => 'app.login',
                'show_login_form' => 'auth.login',
                'logged_out' => '/app/login',
                'guard' => 'app_web',
                'redirect_login' => '/app/dashboard'
            ],
            'password' => [],
            'layout' => 'layouts.app'
        ],
        'admin' => [
            'login' => [
                'route_login' => 'admin.login',
                'show_login_form' => 'auth.login',
                'logged_out' => '/admin/login',
                'guard' => 'admin_web',
                'redirect_login' => '/admin/dashboard'
            ],
            'password' => [],
            'layout' => 'layouts.admin'
        ]
    ]
];
