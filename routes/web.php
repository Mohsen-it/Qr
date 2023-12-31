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
    return view('qrcode');
});

use App\Http\Controllers\QRCodeController;

Route::post('/generate-qrcode', [QRCodeController::class, 'generateQRCode'])->name('generate-qrcode');
Route::post('/phone-qrcode', [QRCodeController::class, 'phoneQrCode'])->name('phone-qrcode');
