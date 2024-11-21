<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GitHubController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('hr', HrController::class);
Route::resource('company', CompanyController::class);

Route::get('company/{id}/download', [CompanyController::class, 'download'])->name('company.download');
Route::get('hr/{id}/download', [HrController::class, 'download'])->name('hr.download');

Route::prefix('github')->group(function () {
    Route::get('connect', [GitHubController::class, 'redirectToGitHub'])->name('github.connect');
    Route::get('callback', [GitHubController::class, 'handleGitHubCallback'])->name('github.callback');
    Route::get('dashboard', [GitHubController::class, 'dashboard'])->name('github.dashboard');
    Route::get('repositories', [GitHubController::class, 'listRepositories'])->name('github.repositories');
    Route::get('create-repository', [GitHubController::class, 'createRepositoryForm'])->name('github.create-repository.form');
    Route::post('create-repository', [GitHubController::class, 'createRepository'])->name('github.create.repository');
    Route::get('disconnect', [GitHubController::class, 'disconnectForm'])->name('github.disconnect.form');
    Route::post('disconnect', [GitHubController::class, 'disconnect'])->name('github.disconnect');
});

