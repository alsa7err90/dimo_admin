<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

function GeneralSetting()
{
    $general = Cache::get('GeneralSetting');
    if (!$general) {
        // $general = GeneralSetting::first();
        // Cache::put('GeneralSetting', $general);
        $general = [];
    }
    return $general;
}

function removeElement($array, $value)
{
    return array_diff($array, (is_array($value) ? $value : array($value)));
}

function getPaginate($paginate = 10)
{
    return $paginate;
}

function paginateLinks($data)
{
    return $data->appends(request()->all())->links();
}

function showDateTime($date, $format = 'Y-m-d')
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}

function getLang($lang)
{
    // return   Language::where('code', $lang)->first()->name;
}


