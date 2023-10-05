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
                    <x-inputs.text name="name" id="name">
                        <x-slot name="label">@lang('Category Name') </x-slot>
                        <x-slot name="value">{{ old('name') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('media') </x-slot>
                    </x-inputs.text>

                    <div class="relative m-3">
                        <label for="publishe"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('Select Category')</label>
                        <select name="parent_id" id="parent_id" data-te-select-init  >
                            <option   value="0" >@lang('Without Categry')</option>
                            @if (isset($categories))
                            @foreach ($categories as $category)
                                <?php $dash = ''; ?>
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @if (count($category->subcategory))
                                    @include('category::subCategoryList-option', [
                                        'subcategories' => $category->subcategory,
                                    ])
                                @endif
                            @endforeach
                        @endif

                        </select>
                    </div>

                    <x-inputs.text name="slug" id="slug">
                        <x-slot name="label">@lang('Category slug')</x-slot>
                        <x-slot name="value">{{ old('slug') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('Ex:main') </x-slot>
                    </x-inputs.text>

                    <x-inputs.text name="icon" id="icon">
                        <x-slot name="label">@lang('Category icon')</x-slot>
                        <x-slot name="message">get icon in <a href='https://fontawesome.com/icons' target='_blank'>fontawesome.com
                                v6</a> or <a href='https://icofont.com/icons' target='_blank'>icofont.com</a></x-slot>
                        <x-slot name="value">{{ old('icon') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('Ex:fa-brands fa-facebook') </x-slot>
                    </x-inputs.text>
                    <x-inputs.text name="content" id="content">
                        <x-slot name="label">@lang('content')</x-slot>
                        <x-slot name="value">{{ old('content') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('description') </x-slot>
                    </x-inputs.text>

                    <div class="p-5 col-xs-12 col-sm-12 col-md-12 text-center">
                        <x-inputs.btn_create />
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-modal>

