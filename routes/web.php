<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToyController;
use App\Http\Controllers\MailController; // Asumimos la creación de este controlador

Route::get('/', function () {
    return view('welcome');
});

Route::get('/toys/list', [ToyController::class, 'listToys'])->name('toys.list');


Route::get('/toys/mail', [MailController::class, 'sendToyMail'])->name('toys.mail');
