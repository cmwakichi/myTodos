<x-layout>

    <div class="flex-end">
        <a  title="add new todo" href="todo/create"
            class="text-white-500 border bg-blue-500 p-1 m-4 text-white">
            Add item</a>
    </div>
    <div x-data="{show:false}" @click.away="show = false" class="text-left ml-4 mt-5">
        <p>Filter todos based on the status:</p>
        <button @click="show=!show"
        class="inline-flex text-sm p-1 font-semibold rounded border border-black-500 rounded w-24">
            Status
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div x-show="show" class="py-2 rounded border border-black-500 p-1 mt-2 w-24" style="display: none">
            <a href="#" class="pb-1 focus:bg-blue-300 hover:bg-blue-100 block text-sm font-semibold leading-5">completed</a>
            <a href="#" class="pb-1 focus:bg-blue-300 hover:bg-blue-100 block text-sm font-semibold leading-5">pending</a>
            <a href="#" class="pb-1 focus:bg-blue-300 hover:bg-blue-100 block text-sm font-semibold leading-5">in-progress</a>
        </div>
    </div>

    <div class="flex flex-col">
        @if($todos->count() < 1)
            <div class="grid grid-cols-1 text-center bg-red-200 rounded max-w-xl mx-auto p-10 mt-4">
                <p>Nothing yet to show.Add your Todos to appear here!</p>
            </div>
        @else
            @foreach($todos as $todo)
                @if($todo->user_id === auth()->id())
                    <div class=" m-4 p-1 bg-gray-100 flex items-center">
                        <span class="text-sm m-4">{{ $todo->description }}</span>
                        <span class="text-sm m-4">{{$todo->created_at->diffForHumans()}}</span>
                        <span>
                            <form method="GET" action="/todos/{{$todo->id}}/edit">
                                @csrf

                                <button
                                    class="bg-blue-500 text-sm rounded-sm p-2 m-2 hover:bg-green-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                            </form>
                        </span>
                        <span>
                            <form method="POST" action="/todos/{{$todo->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="bg-blue-500 rounded-sm  p-2 m-2 hover:bg-red-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </span>
                    </div>
                    <hr>
                @endif
            @endforeach
        @endif
    </div>
    <div class="m-4">{{$todos->links()}}</div>
    <div class="bottom-0 right-0">
        <a href="/dashboard" title="Go to Dashboard">&laquo;Go to Dashboard</a>
    </div>
    </body>
    </html>

</x-layout>
