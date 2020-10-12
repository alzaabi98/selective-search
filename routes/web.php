<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/home', [HomeController::class, 'index'])->middleware('auth');


Route::post('/search', [SearchController::class, 'search'])->name('search');

Route::get('/test', function () {

    $meds = App\Models\Medicine::whereHas('pharmacy.location', function (Builder $query) {
        $query->where('name', 'Muscat');
    })->get();
    dd($meds);
});
