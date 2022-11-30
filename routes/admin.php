<?php

use App\Http\Livewire\Admin\Products\Show;
use Illuminate\Support\Facades\Route;

Route::get('/', Show::class)->name('admin.index');

Route::get('products/{product}/edit', function() {})->name('admin.products.edit');
Route::get('products/new', function() {})->name('admin.products.create');
