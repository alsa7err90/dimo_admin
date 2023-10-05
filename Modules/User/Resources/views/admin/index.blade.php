@extends('layouts.admin')
@push('button')
    @include('components.buttons.create', [
        'id_modal' => 'new_modal',
        'id_btn' => 'create_mpdal',
    ])
@endpush
@section('content')
<x-messages-noty />

    <table class="table table-bordered">
        <thead
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody id="main_table">
            {!! $rows !!}
        </tbody>
    </table>


    {!! $data->render() !!}

    @include('user::components.form_add')
    @include('user::components.form_edit')
    @include('user::components.form_show')
    @include('user::components.form_delete')
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
            modal.find('input[name=email]').val(data.email);

            modal.find("select option[selected=selected]").removeAttr("selected") ;
                $.each(data.roles, function (key, value) {
                    console.log(value.id);
                         $("select option[value='"+value.name +"']").attr('selected', 'selected');
                 });
        }

        function btnShowModal(id){
            console.log('btnShowModal');
            var modal = $('#content_show_modal');
            var action = $('#'+id).data('action');
            var data = $('#'+id).data('data');
            console.log(data);

            modal.find('#key_1').text("id");
            modal.find('#value_1').text(data.id);
            modal.find('#key_2').text("name");
            modal.find('#value_2').text(data.name);
            modal.find('#key_3').text("email");
            modal.find('#value_3').text(data.email);
            modal.find('#key_4').text("email_verified_at");
            modal.find('#value_4').text(data.email_verified_at ? 'yes' : 'no');
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
