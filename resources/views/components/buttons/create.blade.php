

<button class="{{ Style::BTN_DEFAULT }} btn_new_modal" data-id_modal="{{ $id_modal ?? 'new_modal' }}" type="button"
    onclick="toggleModal('new_modal');{{ $onClick ?? '' }}" id="{{ $id_btn }}">
    {{ $label ?? 'New' }}
</button>
