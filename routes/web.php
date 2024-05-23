<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\ContactListController;
use App\Mail\EmailCampaignMailable;
use App\Models\Adoption;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('contacts', ContactController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::post('/contacts/bulk-action', [ContactController::class, 'bulkAction'])->name('contacts.bulkAction')->middleware(['auth', 'verified']);

Route::resource('animals', AnimalController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('adoptions', AdoptionController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('contact_lists', ContactListController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
