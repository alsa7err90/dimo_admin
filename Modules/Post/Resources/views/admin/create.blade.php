@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
@endpush
@push('button')
    <a href="{{ route('admin.posts.index') }}" class="{{ Style::BTN_DARK }}"> @lang('Back')</a>
@endpush
@section('content')

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class=" ">
            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">

                @if (isset($post))
                    <input type="hidden" name="id" value="{{ $post->id }}" />
                @endif
                @csrf
                <div class="grid grid-cols-2  ">
                    <div class="relative m-3">
                    <x-inputs.text name="title" id="title">
                        <x-slot name="label">@lang('Category title :') </x-slot>
                        <x-slot name="value">{{ $post->title ?? '' }}</x-slot>
                        <x-slot name="placeholder">@lang('title') </x-slot>
                    </x-inputs.text>
                    </div>
                    <div class="relative m-3">
                        <label for="publishe"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('Select Status Publish')</label>

                        <select id="publishe" name="publishe"   class="border-2 border-slate-300	 peer block min-h-[auto] w-full rounded border-0 bg-transparent outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-gray-200 dark:placeholder:text-gray-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 cursor-pointer data-[te-input-disabled]:bg-[#e9ecef] data-[te-input-disabled]:cursor-default group-data-[te-was-validated]/validation:mb-4 dark:data-[te-input-disabled]:bg-zinc-600 py-[0.32rem] px-3 leading-[1.6]"
                            data-te-select-placeholder="@lang('Publishe')">

                            <option value="{{ Status::PUBLISHED }}" @if (isset($post) && $post->publishe != null) selected @endif>
                                @lang('Publish')</option>
                            <option value="{{ Status::DRAFT }}" @if (isset($post) && $post->publishe == null) selected @endif>
                                @lang('Draft')</option>

                        </select>
                    </div>

                    <div class="m-3">
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('Select Category')</label>
                        <select id="category_id" name="category_id"  class="border-2 border-slate-300	 peer block min-h-[auto] w-full rounded border-0 bg-transparent outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-gray-200 dark:placeholder:text-gray-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 cursor-pointer data-[te-input-disabled]:bg-[#e9ecef] data-[te-input-disabled]:cursor-default group-data-[te-was-validated]/validation:mb-4 dark:data-[te-input-disabled]:bg-zinc-600 py-[0.32rem] px-3 leading-[1.6]"
                            data-te-select-placeholder="@lang('Category')" data-te-select-filter="true">
                            @foreach ($categories_all as $item)
                                <option value="{{ $item->id }}"
                                    @if (isset($post)) {{ $item->id == $post->category_id ? 'selected=selected' : '' }} @endif>
                                    @lang($item->name)</option>
                            @endforeach
                        </select>

                    </div>
                    

                </div>
                <div class="mb-6">
                    <label class="block">
                        <span class="text-gray-700">@lang('content :')</span>
                        <textarea id="markdown-editor" class="block w-full mt-1 rounded-md" name="content" rows="3">{{ $post->content ?? '' }}</textarea>
                    </label>
                    @error('description')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="m-3">
                    <label for="image"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('main image :')</label>
                    <input type="file" name="image" accept="image/png, image/jpeg, image/gif" />
                   
                </div>
                @if (isset($post))
                    <img src="{{ getImage($post->main_image) }}" class="border-2 m-2" width="150"
                        alt="{{ $post->title }}">
                @endif 
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <x-inputs.btn_create />
                </div>

        </div>
    @endsection

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
        <script>
            const easyMDE = new EasyMDE({
                showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger',
                    'heading-smaller', 'clean-block', 'horizontal-rule'
                ],
                hideIcons: ['side-by-side', 'fullscreen', 'guide'],
                element: document.getElementById('markdown-editor')
            });
        </script>
    @endpush
