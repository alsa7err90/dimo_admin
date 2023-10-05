<?php
$id_modal = 'new_modal';
?>
<x-modal id="{{ $id_modal }}" title="New">
    <x-slot name="content">
        <form method="post" id="form_new" data-id_modal="{{ $id_modal }}" action="{{ route('admin.category.store') }}"
            class="form_ajax_post ">
            {{--  data-id_modal : we need it in ajax after success request hide the modal --}}
            {{--  form_ajax_post : لتنفيذ الطلب بالاجاكس --}}
            @csrf
            <div class="row">
                <div data-te-modal-body-ref class="relative p-4">
                    <x-inputs.text name="name" id="name">
                        <x-slot name="label">@lang('Category Name') </x-slot>
                        <x-slot name="value">{{ old('name') ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('media') </x-slot>
                    </x-inputs.text>

                    <div class="relative m-3">
                        <label for="publishe"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('Select Category')</label>
                        <select name="parent_id" id="parent_id" data-te-select-init>
                            <option value="0">@lang('Without Categry')</option>
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
                        <x-slot name="message">get icon in <a href='https://fontawesome.com/icons'
                                target='_blank'>fontawesome.com
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
            </div>
        </form>
    </x-slot>
</x-modal>
