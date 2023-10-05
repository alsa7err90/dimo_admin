<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
@if(session()->has('notify'))

    @foreach(session('notify') as $msg)
        <script>
            "use strict";
            console.log("{{ session('notify')[0] }}","{{ session('notify')[1] }}")
            iziToast.{{ $msg[0] }}({message:"{{ __($msg[1]) }}", position: "topRight"});
        </script>
    @endforeach
@endif

@if (isset($errors) && $errors->any())
    @php
        $collection = collect($errors->all());
        $errors = $collection->unique();
    @endphp

    <script>
        "use strict";
        console.log('{{ $errors }}');
        @foreach ($errors as $error)
        iziToast.error({
            message: '{{ __($error) }}',
            position: "topRight"
        });
        @endforeach
    </script>

@endif
<script>
    "use strict";
    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
</script>

