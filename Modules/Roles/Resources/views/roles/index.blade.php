@extends('layouts.admin')

@push('button')
    @include('components.buttons.create', [
        'id_modal' => 'new_modal',
        'id_btn' => 'create_mpdal',
    ])
@endpush

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">NO.</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody  id="main_table" class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {!! $rows !!}
                </tbody>
            </table>
        </div>
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">

            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    {!! $roles->render() !!}
                </nav>
            </span>
        </div>
    </div>
    @include('roles::components.form_add',['var_1'=>$permission])
    @include('roles::components.form_edit',['var_1'=>$permission])
    @include('roles::components.form_show')
    @include('roles::components.form_delete')
@endsection


@push('script')
    <script type="application/javascript" >
        function btnEditModal(id){
            console.log('btn_edit_modal');
            var modal = $('#form_edit');
            var action = $('#'+id).data('action');
            var data = $('#'+id).data('data');
            console.log(data);
            modal.find('form').attr('action', action);
            modal.find('input[name=name]').val(data.name);
                $.each(data.permissions, function (key, value) {
                        modal.find('input[id='+value.id+']').prop("checked",true);

                 });
        }

        function btnShowModal(id){
            console.log('btnShowModal');
            var modal = $('#content_show_modal');
            var action = $('#'+id).data('action');
            var data = $('#'+id).data('data');

            console.log(data);
            modal.find('#key_1').text('name');
            modal.find('#value_1').text(data.name);
            var permisson = '';
            $.each(data.permissions, function (key, value) {
                permisson += '<label class="{{ Style::BADGE_SUCCESS }}">' +value.name+ '</label>';

            });
            modal.find('#key_2').text('permissons');
            modal.find('#value_2').html(permisson);
        }

        function btnDeleteModal(id){
            console.log('btnDeleteModal');
            var modal = $('#id_footer_delete');
            var action = $('#'+id).attr('data-action');
            var id_item = $('#'+id).attr('data-id');
            $('.form_ajax_delete').attr('action',action);
            $('.form_ajax_delete').attr('data-id',id_item);
        }
        </script>
@endpush
