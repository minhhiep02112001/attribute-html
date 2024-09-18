<?php

use Attributes\Developer\Controllers\AttributeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:web', 'keycloak-web-can'], 'prefix' => env('ROUTE_PREFIX')], function () {
    Route::resource('attributes', AttributeController::class);
});
