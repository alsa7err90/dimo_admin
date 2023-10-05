

 <button class="{{ Style::BTN_DELETE }} btn_delete_modal" id="{{ $id_btn }}" data-key="{{ $key ?? '' }}" data-value="{{ $value ?? '' }}"
     data-question="{{ $question ?? __('Are you sure to remove this?') }}" data-action="{{ $action }}"
     data-id="{{ $id_item }}" data-id_modal="{{ $id_modal ?? 'delete_modal' }}" onclick="toggleModal('delete_modal');{{ $onClick ?? '' }}">
     {{ __($label) ?? __('Remove') }}
 </button>
