<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '*send*',
        '*register*',
        '*login*',
        '*is_bind*',
        '*send_editor*',
        '*collection*',
        '*bind_mobile*',
        '*editor/upload*',
    ];
}
