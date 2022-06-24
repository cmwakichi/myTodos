@props(['type'])
<button type="{{$type}}"
    class="block rounded-sm block hover:bg-green-400 p-2
            text-sm bg-blue-500 mt-2 text-white">{{$slot}}</button>
