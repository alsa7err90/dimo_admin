<?php
$id_modal = "new_modal";
?>
<x-modal id="{{ $id_modal }}" title="New">
    <x-slot name="content">
        <form method="post" id="form_new" data-id_modal="{{ $id_modal }}"
        action="{{ route('admin.roles.store') }}"
        class="form_ajax_post ">
            {{--  data-id_modal : we need it in ajax after success request hide the modal --}}
            {{--  form_ajax_post : لتنفيذ الطلب بالاجاكس --}}
            @csrf
            <div class="row">
                <x-inputs.text  name="name" id="name">
                    <x-slot name="label" >@lang('Role Name') </x-slot>
                    <x-slot name="value" >{{ old('name') ?? '' }}</x-slot>
                    <x-slot name="placeholder" >@lang('admin-2') </x-slot>
                </x-inputs.text>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br/>
                    @foreach($var_1 as $value)
                    <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                        <input   id="{{  $value->id }}" type="checkbox" value="{{ $value->id }}" name="permission[]" class=" checkbox namew-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="{{  $value->id }}" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Checked state</label>
                    </div>

                    @endforeach
                </div>
            </div>
                <div class="p-5 col-xs-12 col-sm-12 col-md-12 text-center">
                    <x-inputs.btn_create />
                </div>
            </div>
        </form>
    </x-slot>
</x-modal>
