<?php
$id_modal = "new_modal";
?>
<x-modal id="{{ $id_modal }}" title="New">
    <x-slot name="content">
        <form method="post" id="form_new" data-id_modal="{{ $id_modal }}"
        action="{{ route('admin.users.store') }}"
        class="form_ajax_post ">
            {{--  data-id_modal : we need it in ajax after success request hide the modal --}}
            {{--  form_ajax_post : لتنفيذ الطلب بالاجاكس --}}
            @csrf
            <div class="row">

                <x-inputs.text name="name" id="name">
                    <x-slot name="label">@lang('name') </x-slot>
                    <x-slot name="value">{{ old('name') ?? '' }}</x-slot>
                    <x-slot name="placeholder">@lang('name') </x-slot>
                </x-inputs.text>

                <x-inputs.email name="email" id="email">
                    <x-slot name="label">@lang('email') </x-slot>
                    <x-slot name="value">{{ old('email') ?? '' }}</x-slot>
                    <x-slot name="placeholder">@lang('email') </x-slot>
                </x-inputs.email>

                <x-inputs.password name="password" id="password">
                    <x-slot name="label">@lang('password') </x-slot>
                    <x-slot name="value">{{ old('password') ?? '' }}</x-slot>
                    <x-slot name="placeholder">@lang('password') </x-slot>
                </x-inputs.password>

                <x-inputs.password name="confirm-password" id="confirm-password">
                    <x-slot name="label">@lang('confirm password') </x-slot>
                    <x-slot name="value">{{ old('confirm-password') ?? '' }}</x-slot>
                    <x-slot name="placeholder">@lang('confirm password') </x-slot>
                </x-inputs.password>

                <div class="m-3">
                    <label for="status"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('Roles')</label>
                    <select id="roles" name="roles[]" data-te-select-init
                        data-te-select-placeholder="@lang('Category')" data-te-select-filter="true" multiple>
                        @foreach ($roles as $item)
                            <option value="{{ $item->name }}" > @lang($item->name)</option>
                        @endforeach
                    </select>

                </div>


                <div class="p-5 col-xs-12 col-sm-12 col-md-12 text-center">
                    <x-inputs.btn_create />
                </div>
            </div>
        </form>
    </x-slot>
</x-modal>
