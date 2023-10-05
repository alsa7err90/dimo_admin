
<form class="p-5" method="post" id="{{ $id_form }}" action="{{ $action }}" data-action="{{ $action }}">
    @csrf
    @method($method)<div class="row">

        <x-inputs.text  name="name_show" id="name_show">
            <x-slot name="label" >@lang('Name for show by any language') </x-slot>
            <x-slot name="value" >{{ old('name_show') ?? '' }}</x-slot>
            <x-slot name="placeholder" >@lang('Name for show') </x-slot>
        </x-inputs.text>

        <x-inputs.text  name="name" id="name">
            <x-slot name="label" >@lang('Name :auto (list-create-edit-delete)') </x-slot>
            <x-slot name="value" >{{ old('name') ?? '' }}</x-slot>
            <x-slot name="placeholder" >@lang('Name EX:post') </x-slot>
        </x-inputs.text>
        <x-inputs.text  name="custom" id="custom">
            <x-slot name="label" >@lang('custom Permission') </x-slot>
            <x-slot name="value" >{{ old('custom') ?? '' }}</x-slot>
            <x-slot name="placeholder" >@lang('custom Name EX:post_custom') </x-slot>
        </x-inputs.text>


    <div class="p-5 col-xs-12 col-sm-12 col-md-12 text-center">
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
                modal.find('input[name=name_show]').val(data.name_show);
                modal.find('input[name=custom]').val(data.custom);

            });
        </script>
    @endif
@endpush
