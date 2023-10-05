 <button class="{{ Style::BTN_SHOW }} btn_show_modal"  data-data="{{ $data }}"
 data-id_modal="{{ $id_modal ?? 'show_modal' }}" id="{{ $id_btn }}" onclick="toggleModal('show_modal');{{ $onClick ?? '' }}">
     {{ $label ?? 'Show' }}
 </button>
