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

Route::get('/question-1', [\App\Http\Controllers\QuestionController::class, 'question_1'])->name('question-1');
Route::post('/question-1', [\App\Http\Controllers\QuestionController::class, 'question_1_submit'])->name('question-1-submit');

Route::get('/question-2', [\App\Http\Controllers\QuestionController::class, 'question_2'])->name('question-2');
Route::post('/question-2', [\App\Http\Controllers\QuestionController::class, 'question_2_submit'])->name('question-2-submit');

Route::get('/question-3', [\App\Http\Controllers\QuestionController::class, 'question_3'])->name('question-3');
Route::post('/question-3', [\App\Http\Controllers\QuestionController::class, 'question_3_submit'])->name('question-3-submit');

Route::get('/question-4', [\App\Http\Controllers\QuestionController::class, 'question_4'])->name('question-4');
Route::post('/question-4', [\App\Http\Controllers\QuestionController::class, 'question_4_submit'])->name('question-4-submit');

Route::get('/question-5', [\App\Http\Controllers\QuestionController::class, 'question_5'])->name('question-5');
Route::post('/question-5', [\App\Http\Controllers\QuestionController::class, 'question_5_submit'])->name('question-5-submit');

Route::get('/question-6', [\App\Http\Controllers\QuestionController::class, 'question_6'])->name('question-6');
//Route::post('/question-6', [\App\Http\Controllers\QuestionController::class, 'question_6_submit'])->name('question-6-submit');


//admin
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::post('/admin/upload-image', [\App\Http\Controllers\AdminController::class, 'upload_image'])->name('upload-image');
