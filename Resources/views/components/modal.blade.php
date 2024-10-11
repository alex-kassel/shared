<button class="btn {{ $btnClass ?? '' }}" data-bs-toggle="modal" data-bs-target="#{{ $id }}">
    {{ $button }}
</button>

@pushonce('modals')
    <div class="modal fade {{ $modalClass ?? '' }}"
         id="{{ $id }}"
         tabindex="-1"
         @if($label ?? '') aria-labelledby="{{ $id }}lLabel" @endif
         aria-hidden="true">

        <div class="modal-dialog {{ $dialogClass ?? '' }}">
            <div class="modal-content">

                @if($label ?? '')
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{ $id }}Label">{{ $label }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                @endif

                <div class="modal-body">{{ $bodyContent ?? 'Modal content here' }}</div>

                @if($dismissButton ?? '')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ $dismissButton }}</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endpushonce

