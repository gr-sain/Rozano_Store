<?php


if (!function_exists('activeRoute')) {
    function activeRoute($routeName)
    {
        return request()->routeIs($routeName) ? 'active-link' : '';
    }
}

if(!function_exists('adminRoute')){
    function adminRoute($adminRouteN)
    {
        return request()->routeIs($adminRouteN) ? 'active' : '';
    }
}
