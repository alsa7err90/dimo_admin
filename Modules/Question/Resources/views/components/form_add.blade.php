<?php
$id_modal = "new_modal";
?>
<x-modal id="{{ $id_modal }}" title="New">
    <x-slot name="content">
        <form method="post" id="form_new" data-id_modal="{{ $id_modal }}"
        action="{{ route('admin.question.store') }}"
        class="form_ajax_post ">
            {{--  data-id_modal : we need it in ajax after success request hide the modal --}}
            {{--  form_ajax_post : لتنفيذ الطلب بالاجاكس --}}
            @csrf
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
    </x-slot>
</x-modal>
