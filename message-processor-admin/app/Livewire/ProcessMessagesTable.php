<?php

namespace App\Livewire;

use App\Events\ProcessMessages;
use App\Models\Messages;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
class ProcessMessagesTable extends Component
{
    use WithPagination;

    public function render()
    {
        $messages = Messages::query()->where('processed', false)->paginate(5);
        return view('livewire.process-messages-table', [
            'messages' => $messages
        ]);
    }

    public function go(int $id)
    {
        try {
            $message = Messages::query()->find($id);
            $message->processed = true;
            $message->save();
            //TODO broadcast to the message user if you can

            broadcast(new ProcessMessages($message))->toOthers();
            session()->flash('processed', true);
        } catch (\Exception $exception) {
            report($exception);

            session()->flash('failed', true);

        }

    }
}
