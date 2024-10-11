@props(['options'])

@foreach($options as $group)
    <optgroup label="{{ $group->label }}">
        <x-shared::select-options :options="$group->data" />
    </optgroup>
@endforeach
