@props(['data'])

<div class="form-check form-switch">
    <input
            id="{{ $id = md5(microtime()) }}"
            class="form-check-input checkbox-instant-submit"
            type="checkbox"
            data-url-checked="{{ $data->urlChecked }}"
            data-url-unchecked="{{ $data->urlUnchecked }}"
            {{ $data->checked ? 'checked' : '' }}>
    <label for="{{ $id }}"  class="form-check-label">{{ $data->label }}</label>
</div>

@pushonce('scripts')
<script>
    document.querySelectorAll('.checkbox-instant-submit').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            let url = this.checked ? this.dataset.urlChecked : this.dataset.urlUnchecked;
            window.location.href = url;
        });
    });
</script>
@endpushonce
