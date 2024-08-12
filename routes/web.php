<?php

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\ReportController;

Route::get('home',[HomeController::class, 'index'])->name('home');



Route::controller(ProjectController::class)->group(function () {

Route::get('project/index','index')->name('project.index');
Route::get('project/create','create')->name('project.create');

});

Route::controller(TimeController::class)->group(function () {

Route::get('time/index','index')->name('time.index');
Route::get('time/create','create')->name('time.create');
Route::post('time','store')->name('time.store');
Route::get('timeedit/{id}','edit')->name('time.edit');
Route::put('timeupdate/{id}','update')->name('time.update');

});

Route::controller(TaskController::class)->group(function () {

Route::get('task/index','index')->name('task.index');
Route::get('task/create','create')->name('task.create');
});

Route::controller(ReportController::class)->group(function () {

Route::get('report/index','index')->name('report.index');
Route::get('report/create','create')->name('report.create');
Route::post('report/searchbyproject','searchbyproject')->name('report.searchbyproject');
});