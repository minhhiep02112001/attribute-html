<?php

use Attributes\Developer\Controllers\AttributeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:web', 'keycloak-web-can'], 'as' => 'hr.', 'prefix' => env('ROUTE_PREFIX')], function () use ($router) {
    Route::resource('attributes', AttributeController::class);
});