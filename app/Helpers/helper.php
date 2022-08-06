<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('getAllRoutesInArray')) {
    function getAllRoutesInArray(){
        $data =[];
        foreach (Route::getRoutes() as $key => $route) {
            if ($route->getName() && $route->getPrefix() !='' && $route->getPrefix() != '_ignition') {
                $data[$key] = [
                    'name'=> $route->getName(),
                    'prefix'=> $route->getPrefix(),
                ];
            }
        }
        $arr = array();
        foreach ($data as $key => $item) {
            $arr[$item['prefix']][$key] = $item;
        }
        ksort($arr, SORT_NUMERIC);
        return $arr;
    }
}

if (!function_exists('hasAnyPermission')) {
    function hasAnyPermission($permission): bool
    {
        // dd($permission);
        // dd(auth()->user());
        return auth()->user()->hasPermission($permission);
    }
}