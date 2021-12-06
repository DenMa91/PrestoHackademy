<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnounceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// PublicController
Route::get('/', [ PublicController::class, 'index'])->name('home');
Route::post('/locale/{locale}', [ PublicController::class, 'locale'])->name('locale');
Route::get('/about-us', [ PublicController::class, 'aboutus'])->name('about-us');
Route::get('/rock-paper-scissors', [PublicController::class, 'rps'])->name('rps');
Route::get('/project', [PublicController::class, 'project'])->name('project');

// Announce Controller
Route::get('/announce/create', [AnnounceController::class, 'create'])->name('announce.create');
Route::post('/announce/store', [AnnounceController::class, 'store'])->name('announce.store');
Route::get('/announce/show/{announce}', [AnnounceController::class, 'show'])->name('announce.show');
Route::get('/announce/search', [ AnnounceController::class, 'search'])->name('announce.search');
Route::get('/announce/index', [ AnnounceController::class, 'index'])->name('announce.index');
Route::get('/announce/edit/{announce}', [ AnnounceController::class, 'edit'])->name('announce.edit');
Route::post('/announce/update/{announce}', [ AnnounceController::class, 'update'])->name('announce.update');
// Route::delete('/announce/delete/{announce}', [ AnnounceController::class, 'destroy'])->name('announce.delete');

Route::get('/announce/userAnnounce', [ AnnounceController::class, 'userAnnounce'])->name('announce.userAnnounce');

//images
Route::post('/announce/images/upload', [AnnounceController::class, 'uploadImage'])->name('announce.uploadImage');
Route::delete('/announce/images/remove',[AnnounceController::class, 'removeImage'])->name('announce.removeImage');
Route::get('/announce/images',[AnnounceController::class,'getImages'])->name('announce.images');

// Filter Controller
Route::get('/filter/{category}/announce', [FilterController::class, 'category'])->name('filter.category');


// Revisor controller

Route::get('/revisor/index',[RevisorController::class, 'index'])->name('revisor.index');
Route::post('/revisor/announce/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announce/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
Route::post('/revisor/announce/{id}/undo', [RevisorController::class, 'undoRevision'])->name('revisor.undo');
Route::get('/revisor/accepted',[RevisorController::class, 'accepted'])->name('revisor.accepted');
Route::get('/revisor/rejected',[RevisorController::class, 'rejected'])->name('revisor.rejected');

// Admin controllerrrr
Route::post('/admin/acceptRevisor', [AdminController::class, 'acceptRevisor'])->name('admin.acceptRevisor');
Route::get('/admin/accept',[AdminController::class, 'accept'])->name('admin.accept');





//mail
// Route::get('/revisor/form',[ PublicController::class , 'revisorRequest' ])->name('revisor.form');
Route::post('/revisor/mail/request',[PublicController::class,'revisorRequest'])->name('revisor.mail');