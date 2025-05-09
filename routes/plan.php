<?php

use App\Livewire\Plans\Plans;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (): void {
    Route::get('/plans', Plans::class)->name('plans.plans');
});