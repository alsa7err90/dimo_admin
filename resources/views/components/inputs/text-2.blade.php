<div class="form-control w-full ">
    <label class="label">
      <span class="label-text">{{ $title }}</span>
      <span class="label-text-alt">{{ $topRight ?? '' }}</span>
    </label>
    <input type="text" placeholder="@lang('value here')" value="{{ $value ?? '' }}" name="{{ $name }}" id="{{ $id ?? '' }}" class="input input-bordered w-full max-w-xs" />
    <label class="label">
      <small class="label-text-alt">{{ $bottomLeft ?? '' }}</small>
      <small class="label-text-alt">{{ $bottomRight ?? '' }} </small>
    </label>
  </div>
