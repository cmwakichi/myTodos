<x-layout>
    <x-mycomponents.setting>
        <x-slot name="heading">
            Todo Create Form
        </x-slot>
        <form method="POST" action="/todos">
            @csrf
            <x-mycomponents.input name="description"/>
            <x-mycomponents.field>
                <x-mycomponents.label name="status"/>
                <select name="status_id" id="status">
                    <option value="">--select status--</option>
                    @foreach($statuses as $status)
                        <option value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                </select>
            </x-mycomponents.field>
            <x-mycomponents.button type="submit">Add</x-mycomponents.button>
            <a href="/dashboard">&laquo;Go to dashboard</a>
        </form>
    </x-mycomponents.setting>
</x-layout>


