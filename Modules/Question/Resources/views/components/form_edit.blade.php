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
                    <x-inputs.text name="question" id="question">
                        <x-slot name="label">@lang('question') </x-slot>
                        <x-slot name="value">{{ old('question') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('question') </x-slot>
                    </x-inputs.text>

                    <x-inputs.text name="answer" id="answer">
                        <x-slot name="label">@lang('answer') </x-slot>
                        <x-slot name="value">{{ old('answer') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('answer') </x-slot>
                    </x-inputs.text>
                    <div class="p-5 col-xs-12 col-sm-12 col-md-12 text-center">
                        <x-inputs.btn_create />
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-modal>

