<?php

use App\Http\Controllers\ProcessMessageController;
use Illuminate\Support\Facades\Route;

Route::post('/process/message', ProcessMessageController::class)->name('message.insert');
