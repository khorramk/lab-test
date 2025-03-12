<?php

use App\Http\Controllers\ProcessMessageController;
use Illuminate\Support\Facades\Route;

Route::get('/process/message', [ProcessMessageController::class, 'insert'])->name('message.insert');
