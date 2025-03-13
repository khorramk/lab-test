<?php

namespace App\Services;

use App\Http\Requests\InsertMessages;
use App\Models\Messages;

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
       $message = $request->safe()->input('message');

       try {
        //code...
       $messageBucket = new Messages();
       $messageBucket->message = $message;
       $messageBucket->processed = false;
       $messageBucket->save();



       return response()->json(['success' => true]);

       } catch (\Exception $exception) {
        report($exception);
       }


       return response()->json(['error' => 'Server error'], 500);
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
