@extends('layouts.admin')

@push('button')
    @include('components.buttons.create', [
        'id_modal' => 'new_modal',
        'id_btn' => 'create_mpdal',
    ])
@endpush

@section('content')
    <x-messages-noty />

    <div class="container ">
        <div class="row">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">

                    <tbody id="main_table">
                        {!! $rows !!}
                    </tbody>
                </table>

                @include('category::components.form_add')
                @include('category::components.form_edit')
                @include('category::components.form_delete')
            </div>
        </div>
    </div>
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
                $("#parent_id option[selected=selected]").removeAttr("selected") ;
                if(data.parent_id){
                    $("#parent_id option[value='"+data.parent_id +"']").attr('selected', 'selected');
                }
            modal.find('input[name=slug]').val(data.slug);
            modal.find('input[name=icon]').val(data.icon);
            modal.find('input[name=content]').val(data.content);
        }

        function btnShowModal(id){
            console.log('btnShowModal');
            var modal = $('#content_show_modal');
            var action = $('#'+id).data('action');
            var data = $('#'+id).data('data');
            // modal.find('#key_column').text(data.question);
            // modal.find('#value_column').text(data.answer);
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
