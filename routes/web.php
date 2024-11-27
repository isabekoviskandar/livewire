<?php

use App\Livewire\Products;
use App\Livewire\TestComponent;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', TestComponent::class);
Route::get('/product' , Products::class);