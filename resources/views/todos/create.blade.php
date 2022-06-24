<x-layout>
    <x-mycomponents.setting>
        <x-slot name="heading">
            Todo Create Form
        </x-slot>
        <form method="POST" action="/todos">
            @csrf
            <x-mycomponents.input name="description"/>
            <x-mycomponents.button type="submit">Add</x-mycomponents.button>
            <a href="/dashboard">&laquo;Go to dashboard</a>
        </form>
    </x-mycomponents.setting>
</x-layout>


