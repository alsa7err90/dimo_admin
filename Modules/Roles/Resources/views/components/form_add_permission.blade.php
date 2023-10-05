<?php
$id_modal = "new_modal";
?>
<x-modal id="{{ $id_modal }}" title="New">
    <x-slot name="content">
        <form method="post" id="form_new" data-id_modal="{{ $id_modal }}"
        action="{{ route('admin.permissions.store') }}"
        class="form_ajax_post ">
            {{--  data-id_modal : we need it in ajax after success request hide the modal --}}
            {{--  form_ajax_post : لتنفيذ الطلب بالاجاكس --}}
            @csrf
            <div class="row">
                <x-inputs.text  name="name_show" id="name_show">
                    <x-slot name="label" >@lang('Name for show by any language') </x-slot>
                    <x-slot name="value" >{{ old('name_show') ?? '' }}</x-slot>
                    <x-slot name="placeholder" >@lang('Name for show') </x-slot>
                </x-inputs.text>

                <x-inputs.text  name="name" id="name">
                    <x-slot name="label" >@lang('Name :auto (list-create-edit-delete)') </x-slot>
                    <x-slot name="value" >{{ old('name') ?? '' }}</x-slot>
                    <x-slot name="placeholder" >@lang('Name EX:post') </x-slot>
                </x-inputs.text>
                <x-inputs.text  name="custom" id="custom">
                    <x-slot name="label" >@lang('custom Permission') </x-slot>
                    <x-slot name="value" >{{ old('custom') ?? '' }}</x-slot>
                    <x-slot name="placeholder" >@lang('custom Name EX:post_custom') </x-slot>
                </x-inputs.text>
            </div>
                <div class="p-5 col-xs-12 col-sm-12 col-md-12 text-center">
                    <x-inputs.btn_create />
                </div>
            </div>
        </form>
    </x-slot>
</x-modal>
