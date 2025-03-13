<?php

namespace App\Livewire;

use App\Models\Messages;
use Livewire\Component;

class ProcessMessagesTable extends Component
{

    public function render()
    {
        $messages = Messages::query()->paginate();
        return view('livewire.process-messages-table', [
            'messages' => $messages
        ]);
    }
}
