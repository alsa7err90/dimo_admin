<?php $data = json_decode($data); ?>
<div class="p-5">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $data->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $data->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>

            @foreach (getRolesById($data->id) as $v)
                <label class="{{ Style::BADGE_SUCCESS }} ">{{ $v }}</label>
            @endforeach

        </div>
    </div>
</div>
