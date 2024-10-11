@props(['button'])

@php($button->class = trim('btn-instant-submit ' . ($button->class ?? '')))

<x-shared::button :button="$button" />

@pushonce('scripts')
    <script>
        document.querySelectorAll('.btn-instant-submit').forEach(function(button) {
            button.addEventListener('click', function() {
                window.location.href = this.dataset.url;
            });
        });
    </script>
@endpushonce
