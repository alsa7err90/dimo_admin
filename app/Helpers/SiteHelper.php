<?php 

use App\Constants\Status;
use Modules\Setting\Entities\Setting;
use Illuminate\Support\Facades\Cache;

function settings()
{
    return   Cache::remember('categories_array', Status::CACHE, function () {
        return Setting::select('id', 'key', 'value', 'desc', 'category')->get();
    });
}

function settingItem($item, $default = '', $isArray = false)
{

    $res = Setting::where('key', $item)->first()->value ?? $default;
    if ($isArray && !is_array($res)) {
        $res = (array) json_decode($res, true);
    }
    return $res;
}
