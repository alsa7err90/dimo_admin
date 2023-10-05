<div class="p-5">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            <?php
            $permissins = json_decode($data)->permissions;
            ?>
            @if(!empty( $permissins))
                @foreach( $permissins as $v)
                    <label class="label label-success">{{ $v->name }} - {{ $v->name_show }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
