<?php

use App\Livewire\Products;
use App\Livewire\TalabaComponent;
use App\Livewire\TestComponent;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/test', TestComponent::class);
Route::get('/' , Products::class);
Route::get('/talaba' , TalabaComponent::class);
