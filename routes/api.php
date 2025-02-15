<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HomePageEtcController;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/chartdata', [ChartController::class, 'onAllSelect']);
Route::get('/clientreview', [ClientReviewController::class, 'onAllSelect']);
Route::post('/contactsend', [ContactController::class, 'onContactSend']);
Route::get('/coursehome', [CoursesController::class, 'onSelectFour']);
Route::get('/courseall', [CoursesController::class, 'onSelectAll']);
Route::get('/coursedetails/{courseId}', [CoursesController::class, 'onSelectDetails']);
Route::get('/footerdata', [FooterController::class, 'onSelectAll']);
Route::get('/information', [InformationController::class, 'onSelectAll']);
Route::get('/services', [ServiceController::class, 'serviceView']);
Route::get('/projecthome', [ProjectController::class, 'onSelectThree']);
Route::get('/projectall', [ProjectController::class, 'onSelectAll']);
Route::get('/projectdetails/{projectId}', [ProjectController::class, 'projectDetails']);
Route::get('/home/video', [HomePageEtcController::class, 'selectVideo']);
Route::get('/totalhome', [HomePageEtcController::class, 'selectTotalHome']);
Route::get('/techhome', [HomePageEtcController::class, 'selectTechHome']);
Route::get('/homepage/title', [HomePageEtcController::class, 'selectHomeTitle']);

Route::get('/upload/service/{imageId}', [ServiceController::class, 'getImage']);

Route::get('/upload/project/{imageId}', [ProjectController::class, 'getImage']);

