@props(['disabled' => false])

<select
        class="form-select select-instant-submit"
        aria-label="default select"
        @disabled($disabled)
>

    {{ $options }}

</select>

@unless($disabled)
    @pushonce('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.select-instant-submit').forEach(function(node) {
                    node.addEventListener('change', function() {
                        if (this.value) {
                            window.location.href = this.value;
                        }
                    });
                });
            });
        </script>
    @endpushonce
@endunless
