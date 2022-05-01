<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/about-you', [\App\Http\Controllers\WelcomeController::class, 'about_you'])->name('about-you');
Route::post('/about-you/create-participant', [\App\Http\Controllers\WelcomeController::class, 'create_participant'])->name('create-participant');

Route::get('/ready-to-start', [\App\Http\Controllers\WelcomeController::class, 'ready_to_start'])->name('ready-to-start');
Route::get('/go-to-next-step', [\App\Http\Controllers\WelcomeController::class, 'go_to_next_step'])->name('go-to-next-step');
Route::get('/ending', [\App\Http\Controllers\WelcomeController::class, 'ending'])->name('ending');

Route::get('/question/{question_number}', [\App\Http\Controllers\QuestionController::class, 'question'])->middleware(['participant'])->name('question');
Route::post('/question-submit', [\App\Http\Controllers\QuestionController::class, 'question_submit'])->middleware(['participant'])->name('question-submit');

Route::get('/question_next_step/{question_number}', [\App\Http\Controllers\QuestionController::class, 'question_next_step'])->middleware(['participant'])->name('question-next-step');

//admin
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::post('/admin/upload-image', [\App\Http\Controllers\AdminController::class, 'upload_image'])->name('upload-image');
