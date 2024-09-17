<?php

use Attributes\Developer\Controllers\AttributeController;
use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth:web', "keycloak-web-can"], 'prefix' => \Config::get('route.prefix', ''), 'as' => \Config::get('route.as', '')], function () {
    Route::resource('attributes', AttributeController::class);
});