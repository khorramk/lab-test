<?php

namespace App\Services;

use App\Http\Requests\InsertMessages;

class MessageProcessorService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Insert Message to Database
     * as Que
     * @return void
     */
    public function insert(InsertMessages $request)
    {
        $hello = [
            'hi' => 'horray'
        ];
        return response()->json($hello);
    }

    /**
     * getMessage from db or Cache if it exist
     * @return void
     */
    public function getMessages()
    {
        return;
    }

    /**
     * process the message and remove it from db
     * @return void
     */
    public function processMessage()
    {
        return;
    }

    /**
     * Send the message to back to the user
     * @return void
     */
    public function sendProcessedMessageEvent()
    {
        return;
    }
}
