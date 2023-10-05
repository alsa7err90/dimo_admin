<ul id="categories" class=" space-y-1 text-gray-500 list-none list-inside dark:text-gray-400">
    @foreach ($categories as $item)

        <div class="border-solid p-3  border-2  border-indigo-100" id="{{ $item->id }}">
            <div class="flex flex-row">
                <div class="basis-1/2 font-bold"> {{ $item->name }}</div>
                <div class="basis-1/4">
                @include('components.buttons.edit', [
                    'action' => route('admin.category.update', $item->id),
                    'data' => json_encode($item->toArray()),
                    'id_btn' => 'edit_item_' . $item->id,
                    'id_modal' => 'edit_modal',
                    'label' => 'Edit',
                    'onClick'=>"btnEditModal('edit_item_$item->id')"
                ])
                 </div>

                <div class="basis-1/4">
                    @include('components.buttons.delete', [
                        'action' => route('admin.category.destroy', $item->id),
                        'label' => 'Remove',
                        'id_btn' => 'del_item_' . $item->id,
                        'id_item' => 'item_' . $item->id,
                        'id_modal' => 'delete_modal',
                        'onClick'=>"btnDeleteModal('del_item_$item->id')"
                    ])
                </div>
            </div>

            @include('category::admin.child',[
                'items'=>$item
            ])

            {{-- @if ($item->children)
                <ul class="bg-slate-200">
                    @foreach ($item->children as $child)
                        <li  id="{{ $child->id }}" class="p-2 flex flex-row border-solid border-2  border-indigo-100">
                            <div class="basis-1/2 font-bold">
                                -- {{ $child->name }}
                            </div>
                            <div class="basis-1/4 font-bold">

                                @include('components.modal.edit', [
                                    'action' => route('admin.category.update', $child->id),
                                    'data' => json_encode($child->only('name', 'parent_id')),
                                    'id_btn' => 'edit_child_' . $child->id,
                                    'label' => __('Edit'),
                                    'id_modal' => 'id_modal_child_' . $child->id,
                                    'id_form' => 'id_form_child_' . $child->id,
                                    'title_modal' => __('Edit'),
                                    'link_file_form' => 'category::admin.form_add_edit',
                                ]) </div>
                            <div class="basis-1/4 font-bold">
                                @include('components.modal.delete',[
                                    'action'=>route('admin.category.destroy', $child->id),
                                    'id_btn'=>'openModalDeleteLang'. $child->id,
                                    'label'=>__('Remove'),
                                    'id_modal'=>'id_modal_lang'. $child->id,
                                    'id_item'=> $child->id,
                                    'title_modal'=>__('Remove'),
                                    'id_form'=> 'id_form_del_'. $child->id,
                                ])

                            </div>


                        </li>
                    @endforeach
                </ul>
            @endif --}}
        </div>
    @endforeach
</ul>
