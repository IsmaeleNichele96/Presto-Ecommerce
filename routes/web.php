<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Middleware\IsRevisor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('/Category/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');

// ? Rotte announcement
Route::get('/create/Announcement', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('createAnnouncement');
Route::get('/Announcement/Index', [AnnouncementController::class, 'index'])->name('index');
Route::get('/Details/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('showAnnouncement');
Route::get('/Search/Announcement', [PublicController::class, 'searchAnnouncement'])->name('searchAnnouncement');

//? rotte revisore

Route::get('/Revisor/Home', [RevisorController::class, 'revisorIndex'])->middleware('isRevisor')->name('revisorIndex');
Route::patch('/Accept/Announcement/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('acceptAnnouncement');
Route::patch('/Reject/Announcement/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('rejectAnnouncement');

Route::get('/request/revisor/Index', [RevisorController::class, 'IndexRevisor'])->middleware('auth')->name('IndexRevisor');
Route::post('/request/revisor', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('becomeRevisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('makeRevisor');

Route::patch('/undo/announcement', [RevisorController::class, 'undoAnnouncement'])->name('undoAnnouncement');
Route::post('/set/locale/{lang}', [PublicController::class, 'setLocale'])->name('setLocale');
