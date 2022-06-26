<x-layout>
    <x-mycomponents.setting>
        <x-slot name="heading">
            Status Create Form
        </x-slot>
        <form method="POST" action="/status">
            @csrf
            <x-mycomponents.field>
                <x-mycomponents.label name="status"/>
                <x-mycomponents.input name="name"/>
            </x-mycomponents.field>

            <x-mycomponents.button type="submit">Add</x-mycomponents.button>
            <a href="/dashboard">&laquo;Go to dashboard</a>
        </form>
    </x-mycomponents.setting>
</x-layout>


