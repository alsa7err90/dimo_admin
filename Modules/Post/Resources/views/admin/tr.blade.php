@foreach ($posts as $key => $post)
    <tr id="user_{{ $post->id }}">
        <td>{{ $post->id }}</td>
        <td><img src="{{ getImage($post->main_image) }}" alt="{{ $post->title }}" width="100" /></td>
        <td>{{ $post->title }}</td>

        <td>

            <a href="{{ route('admin.posts.edit', $post->id) }}" class="{{ Style::BTN_SHOW }}"> @lang('Edit')</a>

            @include('components.buttons.delete', [
                'action' => route('admin.posts.destroy', $post->id),
                'label' => 'Remove',
                'id_btn' => 'del_item_' . $post->id,
                'id_item' => 'item_' . $post->id,
                'id_modal' => 'delete_modal',
                'onClick'=>"btnDeleteModal('del_item_$post->id')"
            ])

        </td>
    </tr>
@endforeach
