<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertMessages;
use App\Services\MessageProcessorService;
use Illuminate\Http\Request;

class ProcessMessageController extends Controller
{
    public function insert(InsertMessages $request, MessageProcessorService $messageProcessorService)
    {
        return $messageProcessorService->insert($request);
    }
}
