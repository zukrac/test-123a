<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class RouteHelper
{
    /**
     * Load routes from a directory
     *
     * @param string $directory
     * @param string $prefix
     * @param array $middleware
     * @return void
     */
    public static function loadRoutesFromDirectory(string $directory, string $prefix, array $middleware): void
    {
        $routeDir = base_path($directory);
        foreach (File::allFiles($routeDir) as $routeFile) {
            Route::group([
                'prefix' => $prefix,
                'middleware' => $middleware,
            ], function () use ($routeFile) {
                require $routeFile->getPathname();
            });
        }
    }
}
