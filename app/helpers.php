<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('activeRoute')) {
    function activeRoute($routeName)
    {
        return request()->routeIs($routeName) ? 'active-link' : '';
    }
}
