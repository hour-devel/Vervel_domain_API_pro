<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/api/product/upload',
        'API/Import_Amount/add_amount/*',
        'http://localhost:8000/API/Web/Product_Detail/*',
        '/API/Customer/Store',
        '/API/Customer/Update/*/*',
        '/API/Web/Add_Card/*',
        '/API/ToDo-List/Status_update/*/*'
    ];
}
