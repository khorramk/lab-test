{{-- polling every 30s to make sure there is a slight delay for oncoming messages --}}
<div class="overflow-x-auto text-center" wire:poll.30s>
    <h1 class="text-4xl font-bold mb-7 mt-2.5 text-gray-400">
        Process the message please
    </h1>
    <table class="table text-gray-400">
      <thead class="text-gray-400">
        <tr>
          <th class="border border-gray-400">ID</th>
          <th class="border border-gray-400">Message Title</th>
          <th class="border border-gray-400">Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($messages as $message)
          <tr>
            <th class="border border-gray-400">{{ $message->id}}</th>
            <td class="border border-gray-400">{{ $message->message }}</td>
            <td class="border border-gray-400"><button class="btn" wire:click="go($message->id)">Go</button></td>
          </tr>
        @endforeach

      </tbody>
    </table>

    {{ $messages->links() }}

  </div>
