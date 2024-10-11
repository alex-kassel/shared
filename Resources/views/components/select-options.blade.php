@props(['options'])

@foreach($options as $option)
    <option
        value="{{ $option->value }}"

        @isset($option->title)
            title="{{ $option->title }}"
        @endisset

        @selected($option->selected)>

        {{ $option->text }}

    </option>
@endforeach
