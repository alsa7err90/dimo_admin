class="close {{ $id_form_close }}  {{ Style::BTN_CANCEL }}"

@include('components.modal.delete',[
    'action'=>route('admin.lang.destroy', $item->id),
    'id_btn'=>'openModalDeleteLang'. $item->id,
    'label'=>__('Remove'),
    'id_modal'=>'id_modal_lang'. $item->id,
    'id_item'=> $item->id,
    'title_modal'=>__('Remove'),
    'message'=>__('Are you sure you want to delete this?'),
    'method'=>'delete',
    'yes'=>__('Delete'),
    'no'=>__('cancel'),
    'id_form'=> 'id_form_del_'. $item->id,
])

@include('components.modal.edit',[
    'action'=>route('admin.lang.update', $item->id),
    'data'=>json_encode($item->only('name', 'code','flag', 'is_default')),
    'id_btn'=>'edit-item_'. $item->id,
    'label'=>__('Edit'),
    'id_modal'=>'id_modal_lang_'. $item->id,
    'id_form'=>'id_form_lang_'. $item->id,

    'title_modal'=>__('Edit'),
    'link_file_form'=>'language::form_edit'
])

     @include('components.modal.create',[
        'id_btn'=>'new_'. $item->id,
        'label'=>__('New Language'),
        'id_modal'=>'id_new_lang_'. $item->id,
        'id_form'=>'id_new_lang_'. $item->id,
        'title_modal'=>__('New Language'),
        'link_file_form'=>'language::form_edit'
    ])
