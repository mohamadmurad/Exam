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

Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';



Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['role:Admin']], function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard.index');


        Route::resource('students', \App\Http\Controllers\StudentController::class);
        Route::resource('admins', \App\Http\Controllers\AdminController::class);

        Route::resource('exams', \App\Http\Controllers\ExamController::class);
        Route::get('exams/{exam}/submits', [\App\Http\Controllers\ExamSubmitsController::class,'index'])->name('exams.submits');
        Route::get('exams/{exam}/submits/{submit}', [\App\Http\Controllers\ExamSubmitsController::class,'show'])->name('exams.submits.show');


    });

    Route::group(['prefix' => 'front', 'as' => 'student.', 'middleware' => ['role:student']], function () {
        Route::get('/dashboard', [\App\Http\Controllers\FrontController::class,'dashboard'])->name('dashboard');

        Route::get('exam/submit/{exam}',[\App\Http\Controllers\FrontController::class,'examStart'])
        ->name('exam.submit');
        Route::post('exam/submit/{exam}',[\App\Http\Controllers\FrontController::class,'examStore'])
        ->name('exam.store');
    });
});
