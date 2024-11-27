<?php

use App\Livewire\TestComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', TestComponent::class);