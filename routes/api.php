<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TagTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('tasks', TasksController::class);
Route::resource('action', ActionController::class)->only(['store', 'update', 'destroy']);
Route::resource('tagtask', TagTaskController::class)->only(['store', 'update', 'destroy']);
Route::resource('status', StatusController::class)->only(['index']);
Route::resource('tag', TagController::class)->only(['index']);

Route::get('init', [InitController::class, 'init']);
