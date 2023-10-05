<?php
$id_modal = "edit_modal";
?>
<x-modal id="{{ $id_modal }}" title="Edit">
    <x-slot name="content">
        <div id="form_edit">
            <form method="post" action="" data-id_modal="{{ $id_modal }}"  class="form_ajax_edit">
                @csrf
                @method('PUT')
                <div class="row">
                    <x-inputs.text name="name" id="name_edit">
                        <x-slot name="label">@lang('name') </x-slot>
                        <x-slot name="value">{{ old('name') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('name') </x-slot>
                    </x-inputs.text>

                    <x-inputs.email name="email" id="email_edit">
                        <x-slot name="label">@lang('email') </x-slot>
                        <x-slot name="value">{{ old('email') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('email') </x-slot>
                    </x-inputs.email>

                    <x-inputs.password name="password" id="password_edit">
                        <x-slot name="label">@lang('password') </x-slot>
                        <x-slot name="value">{{ old('password') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('password') </x-slot>
                    </x-inputs.password>

                    <x-inputs.password name="confirm-password" id="confirm_password_edit">
                        <x-slot name="label">@lang('confirm password') </x-slot>
                        <x-slot name="value">{{ old('confirm-password') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('confirm password') </x-slot>
                    </x-inputs.password>

                    <div class="m-3">
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('Roles')</label>
                        <select id="roles__edit" name="roles[]" data-te-select-init
                            data-te-select-placeholder="@lang('Roles')" data-te-select-filter="true" multiple>
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
        </div>
    </x-slot>
</x-modal>

