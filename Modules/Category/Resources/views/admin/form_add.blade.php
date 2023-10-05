<form method="post" id="{{ $id_form }}" action="{{ $action }}" data-action="{{ $action }}">
    @csrf
    @method($method)
    <div data-te-modal-body-ref class="relative p-4">
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



        <div
            class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
            <x-inputs.btn_cancel />
            <x-inputs.btn_create />

        </div>
    </div>



</form>

@push('script')
    @if ($method == 'PUT')
        <script type="module">

            $('#{{ $id_btn }}').on('click', function() {
                var modal = $('#{{ $id_form }}');
                var action = $(this).data('action');
                var data = $(this).data('data');
                console.log(data);
                modal.find('form').attr('action', action);
                modal.find('input[name=name]').val(data.name);
                $("#parent_id option[selected=selected]").removeAttr("selected") ;
                if(data.parent_id){
                    $("#parent_id option[value='"+data.parent_id +"']").attr('selected', 'selected');

                }
            });
        </script>
    @endif
@endpush
