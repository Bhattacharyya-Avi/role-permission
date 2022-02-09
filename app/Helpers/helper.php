<?php

if (!function_exists('hasAnyPermission')) {
    function hasAnyPermission($permission): bool
    {
        // dd($permission);
        // dd(auth()->user());
        return auth()->user()->hasPermission($permission);
    }
}