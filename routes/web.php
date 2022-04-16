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
Route::get('/demo-task', [\App\Http\Controllers\WelcomeController::class, 'demo_task'])->name('demo-task');
Route::post('/demo-task/submit-demo-task', [\App\Http\Controllers\WelcomeController::class, 'submit_demo_task'])->name('submit-demo-task');
Route::get('/ready-to-start', [\App\Http\Controllers\WelcomeController::class, 'ready_to_start'])->name('ready-to-start');

Route::get('/question-one', [\App\Http\Controllers\QuestionController::class, 'question_one'])->name('question-one');


//admin
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::post('/admin/upload-image', [\App\Http\Controllers\AdminController::class, 'upload_image'])->name('upload-image');
