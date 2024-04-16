<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\User\Infrastructure\Controllers\CreateUserController;
use Src\User\Infrastructure\Controllers\GetUserByIdController;

Route::post('/user', CreateUserController::class);
Route::get('/user/{id}', GetUserByIdController::class);