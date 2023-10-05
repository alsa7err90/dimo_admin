@if ($items->children)
    <div class="bg-slate-200">
        @foreach ($items->children as $child)
            <div id="{{ $child->id }}" class="">
                <div class="w-full  flex flex-row p-2 border-solid border-2  border-indigo-100">
                    <div class="basis-1/2 font-bold">
                        - {{ $child->name }}
                    </div>
                    <div class="basis-1/4 font-bold">

                        @include('components.buttons.edit', [
                            'action' => route('admin.category.update', $child->id),
                            'data' => json_encode($child->toArray()),
                            'id_btn' => 'edit_child_' . $child->id,
                            'id_modal' => 'edit_modal',
                            'label' => 'Edit',
                            'onClick' => "btnEditModal('edit_child_$child->id')",
                        ])
                    </div>
                    <div class="basis-1/4 font-bold">
                        @include('components.buttons.delete', [
                            'action' => route('admin.category.destroy', $child->id),
                            'label' => 'Remove',
                            'id_btn' => 'del_item_' . $child->id,
                            'id_item' => 'item_' . $child->id,
                            'id_modal' => 'delete_modal',
                            'onClick' => "btnDeleteModal('del_item_$child->id')",
                        ])
                    </div>
                </div>
                @include('category::admin.child', [
                    'items' => $child,
                ])
            </div>
        @endforeach
    </div>
@endif
