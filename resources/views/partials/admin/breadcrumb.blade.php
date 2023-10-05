<div class="d-flex mb-30 flex-wrap  justify-content-between align-items-center">
    <div class="flex items-center justify-between p-4 mb-8 text-sm  rounded-lg  focus:outline-none  ">
        <div class="flex items-center"> <h2>{{ $pageTitle ?? env('APP_NAME') }} </h2> </div>
        <div>
            @stack('button')
        </div>

    </div>
    <div class="d-flex flex-wrap justify-content-end gap-2 align-items-center breadcrumb-plugins">
        @stack('breadcrumb-plugins')
    </div>
</div>
