<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendmail',[EmailController::class, 'sendMail']);

Route::get('/contactform',[EmailController::class, 'contactForm']);

Route::post('/sendcontactform',[EmailController::class, 'sendcontactForm'])->name('sendcontactform');