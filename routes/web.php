<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TabbyPaymentController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/send/notification', [NotificationController::class, 'sendNotificationToUser'])->name('send.notification');
Route::get('/play/order', [NotificationController::class, 'playOrder'])->name('play.order');
Route::get('/s/{code}', [NotificationController::class, 'shortenLinkRedirect'])->name('s');
Route::get('/qr-code/page', [NotificationController::class, 'qrCodeCreate'])->name('qr-code.page');
Route::get('/qr-code/static', [NotificationController::class, 'qrCodeStatic'])->name('qr-code.static');
Route::post('/send/notificationToAll', [NotificationController::class, 'sendNotificationToAll'])->name('send.notificationToAll');



require __DIR__ . '/auth.php';
