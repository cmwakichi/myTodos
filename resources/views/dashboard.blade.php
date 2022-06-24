<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
            <div>
                <a href="/todo/create"></a>
            </div>
            <div class="mt-10">
                <p>Use the links below to navigate to your todo items</p>
            </div>
            <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav class="menu">
                        <ol class="flex sm:justify-between">
                            <li><a href="/todos"
                                class="rounded p-2 bg-blue-500 hover:bg-green-500 text-white text-sm">View todos</a></li>
                            <li><a href="/todo/create"
                                   class="rounded p-2 bg-blue-500 hover:bg-green-500 text-white text-sm">Add New todos</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
