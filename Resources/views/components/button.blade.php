@props(['button'])

<button
    type="button"
    class="btn {{ $button->class ?? '' }}"

    @isset($button->title)
    title="{{ $button->title }}"
    @endisset

    @isset($button->url)
    data-url="{{ $button->url }}"
    @endisset
>
    @isset($button->icon)
        <i class="{{ $button->icon }}"></i>
    @endisset
    @isset($button->text)
        {{ $button->text }}
    @endisset
</button>
