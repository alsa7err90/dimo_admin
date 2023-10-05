@extends('layouts.admin')
@push('button')
    @include('components.buttons.create', [
        'id_modal' => 'new_modal',
        'id_btn' => 'create_mpdal',
    ])
@endpush
@section('content')

<x-messages-noty />

    <table class="table datatable">
        <thead>
            <th width="50px"><input type="checkbox" id="master"></th>
            <th width="80px">No</th>
            <th>Name show</th>
            <th>Name</th>
        </thead>
        <tbody id="main_table">
            {!! $rows !!}
        </tbody>

    </table>
    <button class="{{ Style::BTN_DELETE }} delete_all"
        data-url="{{ route('admin.permissions.delete_many_permission') }}">Delete All Selected</button>


    {!! $permissions->render() !!}

    @include('roles::components.form_add_permission')
    @include('roles::components.form_delete')
@endsection


@push('script')
<script type="application/javascript" >

    function btnDeleteModal(id){
        console.log('btnDeleteModal');
        var modal = $('#id_footer_delete');
        var action = $('#'+id).attr('data-action');
        var id_item = $('#'+id).attr('data-id');
        $('.form_ajax_delete').attr('action',action);
        $('.form_ajax_delete').attr('data-id',id_item);
    }
    </script>

    <script  type="module">

    $(document).ready(function() {


        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });


            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {


                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {
                    var join_selected_values = allVals.join(",");
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            console.log(data);
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                iziToast.success({ timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: data['message'] ,position: "topRight" });

                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }

                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });


                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });


        $(document).on('confirm', function(e) {
            var ele = e.target;
            e.preventDefault();
            $.ajax({
                url: ele.href,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);

                },
                error: function(data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>
@endpush
