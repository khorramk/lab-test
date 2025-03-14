<?php

namespace App\Services;

use App\Http\Requests\InsertMessages;
use App\Models\Messages;
use Livewire\Livewire;

class MessageProcessorService
{
    public function __invoke(InsertMessages $request)
    {
        $message = $request->safe()->input('message');
        $client_id = $request->safe()->input('client_id');

        try {
        $messageBucket = new Messages();
        $messageBucket->message = $message;
        $messageBucket->processed = false;
        $messageBucket->client_id = $client_id;
        $messageBucket->save();

        return response()->json(['success' => true]);

        } catch (\Exception $exception) {
         report($exception);
        }


        return response()->json(['error' => 'Server error'], 500);
    }
}
