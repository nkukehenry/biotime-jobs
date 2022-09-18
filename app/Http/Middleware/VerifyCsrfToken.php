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
        '/offence',
        '/attach_action',
        '/village',
        '/permission',
        '/role',
        '/user',
        'changepass',
        '/action',
        '/saveOffence',
        '/forwarder',
        '/bulkforwarder',
        '/offences',
        '/parish',
        '/subcounty',
        '/county',
        '/district'
    ];
}
