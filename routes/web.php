<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [PageController::class, 'home'])->name('home');

foreach (array_keys(config('summit.planned_pages')) as $uri) {
    Route::get($uri, [PageController::class, 'planned']);
}

Route::fallback(fn () => Inertia::render('NotFound')->toResponse(request())->setStatusCode(404));
