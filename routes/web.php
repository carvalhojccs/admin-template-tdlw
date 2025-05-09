<?php

use App\Livewire\Users\Users;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login', 301);

Route::middleware(['auth'])->group(function (): void {
    Route::get('/users', Users::class)->name('users.users');
});

require __DIR__.'/auth.php';
require __DIR__.'/plan.php';
