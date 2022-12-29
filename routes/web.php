<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ListeningController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserAuthenticationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin_dashboard', [App\Http\Controllers\HomeController::class, 'dashboard']);
// 'middleware' => 'api',
Route::group(['prefix'=> 'admin'], function ($routes) {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    // users routes
    Route::get('/users', [AdminController::class, 'allUser'])->name('admin.users');
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
    Route::get('/quiz/delete/{templete}/{quizType}/{id}', [QuizController::class, 'deleteQuiz'])->name('admin.settings.quiz.delete');
    //admin add quizzes
    Route::get('/add-question/{quizType}/{quizId}', [QuestionController::class, 'addQuestion'])->name('admin.settings.quiz.add-question');
    Route::post('/store-question/fill-blanks', [QuestionController::class, 'storeFillBlank'])->name('admin.settings.quiz.fill-blank.store-question');
    Route::get('/delete-question/fill-blanks/{id}', [QuestionController::class, 'deleteFillBlank'])->name('admin.settings.quiz.fill-blank.delete-question');
    Route::post('/store-question/multiple-choice', [QuestionController::class, 'storeMultipleChoice'])->name('admin.settings.quiz.multiple-choice.store-question');
    Route::get('/delete-question/multiple-choice/{id}/{quizType}', [QuestionController::class, 'deleteMultipleChoice'])->name('admin.settings.quiz.multiple-choice.delete-question');
    //admin article
    Route::get('/article/{quizType}/{quizId}', [ArticleController::class, 'article'])->name('admin.settings.quiz.article');
    Route::post('/article/store', [ArticleController::class, 'articleStore'])->name('admin.settings.quiz.store-article');
    Route::get('/article/delelete/perm/{id}',  [ArticleController::class, 'articleDelete'])->name('admin.settings.quiz.delete-article');
    //admin listening
    Route::get('/listening/{quizId}', [ListeningController::class, 'listening'])->name('admin.settings.quiz.listening');
    Route::post('/listening/store', [ListeningController::class, 'listeningStore'])->name('admin.settings.quiz.store-listening');
    Route::get('/listening/delelete/perm/{id}',  [ListeningController::class, 'listeningDelete'])->name('admin.settings.quiz.delete-listening');
    Route::get('/quiz/fillBlank/box/{quizId}/{quizType}',  [QuestionController::class, 'showOptionBox'])->name('admin.settings.quiz.show.box');
    Route::post('/quiz/fillBlank/box/add',  [QuestionController::class, 'showOptionBoxUpdate'])->name('admin.settings.quiz.update.box');

});

// frontend routes
Route::get('/', [FrontendController::class, 'frontendHome'])->name('frontend.home');

Route::group(['prefix'=> 'frontend'], function ($routes) {
    Route::post('/user-login', [UserAuthenticationController::class, 'login'])->name('frontend.user.login'); 
    Route::post('/user-regitster', [UserAuthenticationController::class, 'register'])->name('frontend.user.register'); 
    Route::get('/user-logout', [UserAuthenticationController::class, 'logout'])->name('frontend.user.logout'); 
    Route::get('/exam-info/{test_id}', [FrontendController::class, 'frontendExamInfo'])->name('frontend.exam.info'); 
    Route::get('/start-exam/{test_id}', [FrontendController::class, 'frontendExamStart'])->name('frontend.exam.start'); 
    Route::get('/start-exam/{test_id}/check', [FrontendController::class, 'frontendExamChecked'])->name('frontend.exam.checked'); 
});

