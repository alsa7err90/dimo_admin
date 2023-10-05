@extends('layouts.admin')
@push('button')
    @include('components.buttons.create', [
        'id_modal' => 'new_modal',
        'id_btn' => 'create_mpdal',
    ])
@endpush
@section('content')
    <x-messages-noty />
    <form method="post" action="{{ route('admin.settings.updateAll') }}">
        @csrf
        <ul class="mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0" role="tablist" data-te-nav-ref>

            @foreach ($all_items as $key => $items)
                <!--Tabs navigation-->
                <li role="presentation">
                    <a href="#tabs-{{ $key }}"
                        class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                        data-te-toggle="pill" data-te-target="#tabs-{{ $key }}"  @if ($loop->first) data-te-nav-active  @endif  role="tab"
                        aria-controls="tabs-{{ $key }}" aria-selected="true">{{ $key }}</a>
                </li>

            @endforeach
        </ul>

        <!--Tabs content-->
        <div class="mb-6">
            @foreach ($all_items as $key => $items)
            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
            id="tabs-{{ $key }}" role="tabpanel" aria-labelledby="tabs-{{ $key }}-tab" @if ($loop->first) data-te-tab-active @endif   >
                @forelse ($items as $item)
                    
                    <x-inputs.text-2 name="{{ $item->key }}" id="{{ $item->key }}">
                        <x-slot name="title">{{ $item->key }} </x-slot>
                        <x-slot name="bottomLeft">@lang($item->desc) </x-slot>
                        <x-slot name="value">{{ $item->value }}</x-slot>
                    </x-inputs.text-2>

                @empty
                @endforelse
            </div>
            @endforeach
        </div>


        <x-inputs.btn_create />
    </form>

    @include('setting::admin.form_add')
@endsection
