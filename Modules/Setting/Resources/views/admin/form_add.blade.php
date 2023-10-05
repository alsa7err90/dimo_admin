<?php
$id_modal = "new_modal";
?>
<x-modal id="{{ $id_modal }}" title="New">
    <x-slot name="content">
        <form method="post" id="form_new" data-id_modal="{{ $id_modal }}"
        action="{{ route('admin.settings.store') }}"
         >
            {{--  data-id_modal : we need it in ajax after success request hide the modal --}}
            {{--  form_ajax_post : لتنفيذ الطلب بالاجاكس --}}
            @csrf
            <div class="row">
                <x-inputs.text  name="key" id="key">
                    <x-slot name="label" >@lang('key') </x-slot>
                    <x-slot name="value" >{{ old('key') ?? '' }}</x-slot>
                    <x-slot name="placeholder" >@lang('NAME_APP') </x-slot>
                </x-inputs.text>


                <x-inputs.text  name="value" id="value">
                    <x-slot name="label" >@lang('value')</x-slot>
                    <x-slot name="value" >{{ old('value') ?? '' }}</x-slot>
                    <x-slot name="placeholder" >@lang('Ex:my app') </x-slot>
                </x-inputs.text>


                <x-inputs.text  name="desc" id="desc">
                    <x-slot name="label" >@lang('desc')</x-slot>
                    <x-slot name="value" >{{ old('desc') ?? '' }}</x-slot>
                    <x-slot name="placeholder" >@lang('Ex:this name my app') </x-slot>
                </x-inputs.text>


                <x-inputs.text  name="category" id="category">
                    <x-slot name="label" >@lang('category')</x-slot>
                    <x-slot name="value" >{{ old('category') ?? '' }}</x-slot>
                    <x-slot name="placeholder" >@lang('Ex:this name my app') </x-slot>
                    <x-slot name="msg" >@lang('To add this value to one of the pre-existing sections, just type the name literally, or you can type the name of a new section') </x-slot>
                </x-inputs.text>
                The Categoies : 
                @foreach ($all_items as $key => $items)
                <br /><button type="button" onclick="copyToClipboard('{{ $key }}')"  ><div class="{{ Style::BADGE_0 }}">{{ $key }} </div></button>   
                @endforeach
                <div class="p-5 col-xs-12 col-sm-12 col-md-12 text-center">
                    <x-inputs.btn_create />
                </div>
            </div>
        </form>
    </x-slot>
</x-modal>



{{-- @push('script')
    @if ($method == 'PUT')
        <script type="module">

            $('#{{ $id_btn }}').on('click', function() {
                var modal = $('#{{ $id_form }}');
                var action = $(this).data('action');
                var data = $(this).data('data');
                console.log(data);
                modal.find('form').attr('action', action);
                modal.find('input[name=name]').val(data.name);
                $("#parent_id option[selected=selected]").removeAttr("selected") ;
                if(data.parent_id){
                    $("#parent_id option[value='"+data.parent_id +"']").attr('selected', 'selected');

                }
            });
        </script>

    @endif
@endpush --}}
