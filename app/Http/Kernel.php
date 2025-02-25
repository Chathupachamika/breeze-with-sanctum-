<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewareGroups = [
        'web' => [
            // Other middleware...
        ],
        'api' => [
            // Other middleware...
        ],
    ];

    protected $routeMiddleware = [
        // Other middleware...
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}
