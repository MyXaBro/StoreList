<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Personal\ListController;
use App\Http\Controllers\Personal\PersonalController;
use App\Http\Controllers\Personal\TagController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['prefix' => 'show', 'middleware' => 'auth'], function () {
    Route::get('/{list}', [ShowController::class, 'index'])->name('show');
});

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::post('/filter', [FilterController::class, 'filter'])->name('filter');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'filter.user.lists']], function () {
    Route::get('/', [PersonalController::class, 'index'])->name('personal.index');

    Route::group(['prefix' => 'list'], function () {
        Route::get('/', [ListController::class, 'list'])->name('list.index');
        Route::get('/create', [ListController::class, 'createList'])->name('list.create');
        Route::post('/save-list', [ListController::class, 'saveList'])->name('list.save');
        Route::get('/{list}', [ListController::class, 'showList'])->name('list.show');
        Route::get('/{list}/edit-list', [ListController::class, 'editList'])->name('list.edit');
        Route::patch('/{list}', [ListController::class, 'updateList'])->name('list.update');
        Route::delete('/{list}', [ListController::class, 'deleteList'])->name('list.delete');
    });

    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', [TagController::class, 'tag'])->name('tag.index');
        Route::get('/create', [TagController::class, 'createTag'])->name('tag.create');
        Route::post('/save-tag', [TagController::class, 'saveTag'])->name('tag.save');
        Route::get('/{tag}', [TagController::class, 'showTag'])->name('tag.show');
        Route::get('/{tag}/edit-tag', [TagController::class, 'editTag'])->name('tag.edit');
        Route::patch('/{tag}', [TagController::class, 'updateTag'])->name('tag.update');
        Route::delete('/{tag}', [TagController::class, 'deleteTag'])->name('tag.delete');
    });
});
