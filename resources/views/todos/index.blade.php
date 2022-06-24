<x-layout>

    <div class="flex-end">
        <a  title="add new todo" href="todo/create"
            class="text-white-500 border bg-blue-500 p-1 m-4 text-white">Add item</a>
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
                                    class="bg-blue-500 text-sm rounded-sm p-2 m-2 hover:bg-green-200">Edit</button>
                            </form>
                        </span>
                        <span>
                            <form method="POST" action="/todos/{{$todo->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="bg-blue-500 rounded-sm  p-2 m-2 hover:bg-red-800">Delete</button>
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
