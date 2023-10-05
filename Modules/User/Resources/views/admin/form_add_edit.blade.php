<form method="post" id="{{ $id_form }}" action="{{ $action }}" data-action="{{ $action }}">
    @csrf
    @method($method)
    <div data-te-modal-body-ref class="relative p-4">


        <x-inputs.text name="name" id="name_{{ $id_btn }}">
            <x-slot name="label">@lang('User Name') </x-slot>
            <x-slot name="value">{{ old('name') ?? '' }}</x-slot>
            <x-slot name="placeholder">@lang('Ali') </x-slot>
        </x-inputs.text>


        <div class="relative mb-3">
            <select data-te-select-init data-te-select-placeholder="choose role" name="roles[]" multiple>
                @foreach ($var_1 as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach

            </select>
        </div>

        <x-inputs.email name="email" id="email_{{ $id_btn }}">
            <x-slot name="label">@lang('Email')</x-slot>
            <x-slot name="value">{{ old('email') ?? '' }}</x-slot>
        </x-inputs.email>


        <x-inputs.password name="password" id="password_{{ $id_btn }}">
            <x-slot name="label">@lang('password')</x-slot>
        </x-inputs.password>


        <x-inputs.password name="confirm-password" id="confirm-password_{{ $id_btn }}">
            <x-slot name="label">@lang('Confirm Password')</x-slot>
        </x-inputs.password>


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
                modal.find("select option[selected=selected]").removeAttr("selected") ;
                $.each(data.roles, function (key, value) {
                    console.log(value.id);
                         $("select option[value='"+value.name +"']").attr('selected', 'selected');
                 });

            });
        </script>
    @endif
@endpush
