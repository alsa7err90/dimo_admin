
    @foreach ($data as $key => $item)
        <tr id="item_{{ $item->id }}">
            <td>{{ $item->id }}</td>
            <td>{{ $item->question }}</td>
            <td>{{ $item->answer }}</td>
            <td>

                @include('components.buttons.show', [
                   'data' => json_encode($item->toArray()),
                    'id_btn' => 'show_item_' . $item->id,
                    'id_modal' => 'new_modal',
                    'label' => 'Show'
                ])
                @include('components.buttons.edit', [
                    'action' => route('admin.question.update', $item->id),
                    'data' => json_encode($item->toArray()),
                    'id_btn' => 'edit_item_' . $item->id,
                    'id_modal' => 'edit_modal',
                    'label' => 'Edit'
                ])


                @include('components.buttons.delete', [
                    'action' => route('admin.question.destroy', $item->id),
                    'label' => 'Remove',
                    'id_item' => 'item_' . $item->id,
                    'id_modal' => 'delete_modal',
                ])

            </td>
        </tr>
    @endforeach

