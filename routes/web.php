<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;

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
Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin_dashboard', [App\Http\Controllers\HomeController::class, 'dashboard']);
// 'middleware' => 'api',
Route::group(['prefix'=> 'admin'], function ($routes) {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    //admin level routes
    Route::get('/level', [LevelController::class, 'level'])->name('admin.settings.level');
    Route::get('/level/create', [LevelController::class, 'createLevel'])->name('admin.settings.level.create');
    Route::post('/level/store', [LevelController::class, 'storeLevel'])->name('admin.settings.level.store');
    Route::get('/level/show/{id}', [LevelController::class, 'editLevel'])->name('admin.settings.level.edit');
    Route::post('/level/update/{id}', [LevelController::class, 'updateLevel'])->name('admin.settings.level.update');
    Route::get('/level/delete/{id}', [LevelController::class, 'deleteLevel'])->name('admin.settings.level.delete');
    //admin category routes
    Route::get('/category', [CategoryController::class, 'category'])->name('admin.settings.category');
    Route::get('/category/create', [CategoryController::class, 'createCategory'])->name('admin.settings.category.create');
    Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('admin.settings.category.store');
    Route::get('/category/show/{id}', [CategoryController::class, 'editCategory'])->name('admin.settings.category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('admin.settings.category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.settings.category.delete');
    //admin exam routes
    Route::get('/exam', [ExamController::class, 'exam'])->name('admin.settings.exam');
    Route::get('/exam/create', [ExamController::class, 'createExam'])->name('admin.settings.exam.create');
    Route::post('/exam/store', [ExamController::class, 'storeExam'])->name('admin.settings.exam.store');
    Route::get('/exam/show/{id}', [ExamController::class, 'editExam'])->name('admin.settings.exam.edit');
    Route::post('/exam/update/{id}', [ExamController::class, 'updateExam'])->name('admin.settings.exam.update');
    Route::get('/exam/delete/{id}', [ExamController::class, 'deleteExam'])->name('admin.settings.exam.delete');
    //admin quiz routes
    Route::get('/quiz', [QuizController::class, 'quiz'])->name('admin.settings.quiz');
    Route::get('/quiz/create', [QuizController::class, 'createQuiz'])->name('admin.settings.quiz.create');
    Route::post('/quiz/store', [QuizController::class, 'storeQuiz'])->name('admin.settings.quiz.store');
    Route::get('/quiz/show/{id}', [QuizController::class, 'editQuiz'])->name('admin.settings.quiz.edit');
    Route::post('/quiz/update/{id}', [QuizController::class, 'updateQuiz'])->name('admin.settings.quiz.update');
    Route::get('/quiz/delete/{id}', [QuizController::class, 'deleteExam'])->name('admin.settings.quiz.delete');
    //admin add quizzes
    Route::get('/add-question', [QuestionController::class, 'addQuestion'])->name('admin.settings.quiz.add-question');
});


