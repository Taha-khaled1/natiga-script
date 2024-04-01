<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\EmailVerificationController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\CollegeController;
use App\Http\Controllers\Api\CommandController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\UserAddressController;
use Illuminate\Support\Facades\Route;




Route::controller(NotificationController::class)->group(function () {


    // Route to get all notifications of the authenticated user.
    Route::get('/notifications', 'getUserNotifications');
    Route::get('/notifications/unread', 'getUnReadNotifications');
    // Route to mark a specific notification as read.
    Route::post('/notifications/{notification}/read', 'markAsRead');

    // Route to mark all notifications of the authenticated user as read.
    Route::post('/notifications/mark-all-read', 'markAllAsRead');
});






Route::controller(CollegeController::class)->group(function () {
    Route::get('/category/{category}/books', 'getBook');
    Route::get('/colleges', 'getColleges');
    Route::get('/users/{user_id}/previousAnswers', 'getPreviousAnswers');

    Route::post('/submit/answers', 'submitAnswers');
    Route::get('/colleges/{college}/years', 'getYears');
    Route::get('/years/{year}/semesters', 'getSemesters');
    Route::get('/semesters/{semester}/subjects', 'getSubjects');
    Route::get('/subjects/{subject}/questions', 'getQuestions');
    Route::get('/subjects/search', 'searchSubject');
    Route::get('/book/search', 'searchBook');
});






Route::get('schedule-run', [CommandController::class, 'scheduleCommand'])->name("schedule.run");

Route::group(['middleware' => 'ChangeLanguage'], function () {
    Route::post('verification-notification', [EmailVerificationController::class, 'sendEmailverfyc'])->name('verification-notification');
    Route::post('verify-email', [EmailVerificationController::class, 'verifyEmail'])->name('verify-email');
    Route::post('verify-code', [EmailVerificationController::class, 'verifyCode'])->name('verify-code');


    Route::post('forgot-password', [ResetPasswordController::class, 'forgotPassword']);
    Route::post('reset-password', [ResetPasswordController::class, 'resetPassword'])->middleware('sanctum');


    Route::post('/contact', [ContactUsController::class, 'store']);

    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/logout', 'logout')->middleware('sanctum');
        Route::post('/register', 'register');
    });
    Route::get('getOtpForUser', [UserController::class, 'getOtpForUser']);


    Route::group(['middleware' => 'sanctum'], function () {









        Route::controller(UserController::class)->group(function () {
            Route::get('userInformation', 'getUserInfo');
            Route::post('updateUserInfo', 'updateUserInfo');
            Route::post('changePassword', 'changePassword');
        });
    });
});
