@extends('layouts.admin')
@push('button')
    @include('components.buttons.create', [
        'id_modal' => 'new_modal',
        'id_btn' => 'create_mpdal',
    ])
@endpush

@section('content')
    {{-- {{ route('admin.question.update', $item->id) }} --}}
    <x-messages-noty />

    <div class="container ">
        <div class="row">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="main_table">
                        {!! $rows !!}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('question::components.form_add')
    @include('question::components.form_edit')
    @include('question::components.form_show')
    @include('question::components.form_delete')
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
            modal.find('input[name=question]').val(data.question);
            modal.find('input[name=answer]').val(data.answer);
        }

        function btnShowModal(id){
            console.log('btnShowModal');
            var modal = $('#content_show_modal');
            var action = $('#'+id).data('action');
            var data = $('#'+id).data('data');
            console.log(data);
            modal.find('#key_1').text('id');
            modal.find('#value_1').text(data.id);
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
