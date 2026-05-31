<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\ShortUrlController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:SuperAdmin'])->group(function () {

    Route::get('/companies/{company}/invite', [InviteController::class, 'inviteForm'])
        ->name('companies.invite');
    Route::post('/companies/{company}/invite', [InviteController::class, 'sendInvite'])
        ->name('companies.sendInvite');
    Route::resource('companies', CompanyController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/adminmemberlist', [InviteController::class, 'adminMemberList'])
        ->name('adminmemberlist');

    Route::get('/invite/{company}/invite', [InviteController::class, 'inviteFormAdmin'])
        ->name('invite.invite');
    Route::post('/invite/{company}/invite', [InviteController::class, 'sendInviteAdmin'])
        ->name('invite.sendInvite');
});


Route::middleware('auth')->group(function () {

    Route::resource('short-urls', ShortUrlController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

Route::get('/invitation/{token}', [InviteController::class, 'showForm'])
    ->name('invitation.accept');
Route::post('/invitation/{token}', [InviteController::class, 'store'])
    ->name('invitation.store');

Route::get('/s/{shortCode}', [ShortUrlController::class, 'redirect'])
    ->name('shorturl.redirect');



require __DIR__ . '/auth.php';
