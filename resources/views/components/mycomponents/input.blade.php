@props(['type'=>'text','name'])
<x-mycomponents.field>
    <x-mycomponents.label name="{{$name}}"/>
    <input name="{{$name}}"
           type="{{$type}}"
           id="{{$name}}"
           {{$attributes(['value'=>old('name')])}}
           class="border-b border-blue-500"
           required/>
    <x-mycomponents.error name="{{$name}}"/>
</x-mycomponents.field>
