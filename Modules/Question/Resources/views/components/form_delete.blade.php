<?php
$id_modal = "delete_modal";
?>
<x-modal id="{{ $id_modal }}" title="Delete" id_form="form_delete">
    <x-slot name="content">

        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                {{ $title_modal ?? 'Delete' }}
            </h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500">
                    {{ $message ?? __('Are you sure you want to delete this?') }}
                </p>
            </div>
        </div>

    </x-slot>
    <x-slot name="footer">
            <form action="" class="form_ajax_delete" data-id_modal="{{ $id_modal }}"  method="POST">
                @csrf
                @method($method ?? 'Delete')
                <button type="submit"
                    class=" focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                    data-bs-dismiss="modal">{{ $yes ?? __('Yes') }}</button>
            </form>
            <button type="button" onclick="toggleModal('delete_modal')" class="{{ Style::BTN_CANCEL }}">{{ $no ?? __('No') }}</button>
    </x-slot>
</x-modal>
