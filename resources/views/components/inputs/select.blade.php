<div class="relative mb-3" >
    <label >{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $id }}" data-te-select-init>
        <option selected>choose</option>
        @if (isset($items))
            @foreach ($items as $item)
                <?php $dash = ''; ?>
                <option value="{{ $item[$op_value] }}">{{ $item[$op_label] }}</option>
            @endforeach
        @endif
    </select>
</div>
