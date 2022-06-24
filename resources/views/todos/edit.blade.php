<x-layout>
    <x-mycomponents.setting>
        <x-slot name="heading">
            Todo Edit Form
        </x-slot>

        <form method="POST" action="/todos/{{$todo->id}}">
            @csrf
            @method('PATCH')
            <x-mycomponents.input name="description"
                                  value="{{old('description',$todo->description)}}" />
            <x-mycomponents.button type="submit">Edit</x-mycomponents.button>
            <a href="/dashboard">&laquo;Go to dashboard</a>
        </form>
    </x-mycomponents.setting>
</x-layout>
