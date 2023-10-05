

 <button class="{{ Style::BTN_EDIT }} btn_edit_modal" data-action="{{ $action }}" data-data="{{ $data ?? '' }}" data-value="{{ $value ?? '' }}" data-key="{{ $key ?? '' }}"
     data-id_modal="{{ $id_modal ?? 'edit_modal' }}" id="{{ $id_btn }}" onclick="toggleModal('edit_modal');{{ $onClick ?? '' }}">
     {{ $label ?? 'Edit' }}
 </button>
