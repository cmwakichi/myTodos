<x-layout>
    <div class="max-w-xl mx-auto rounded mt-10 border border-gray-200 text-center">
        <h1 class="text-white-500 bg-blue-500 rounded px-2">All Status</h1>
            @foreach($statuses as $status)
                <div class=" m-4 p-1 bg-gray-100 flex items-center">
                    <span class="text-sm m-4">{{ ucfirst($status->name) }}</span>
                    <span class="text-sm m-4">{{$status->created_at->diffForHumans()}}</span>
                    <span>
                        <form method="GET" action="/todos/{{$status->id}}/edit">
                            @csrf
                            <button
                                class="bg-blue-500 text-sm rounded-sm p-2 m-2 hover:bg-green-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </button>
                        </form>
                    </span>
                    <span>
                        <form method="POST" action="/todos/{{$status->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="bg-blue-500 rounded-sm  p-2 m-2 hover:bg-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </span>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</x-layout>
