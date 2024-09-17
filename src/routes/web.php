<?php

use Attributes\Developer\Controllers\AttributeController;
use Illuminate\Support\Facades\Route;

// Các route cho AttributeController
Route::prefix('attributes')->group(function () {
    Route::resource('attributes', AttributeController::class);
});