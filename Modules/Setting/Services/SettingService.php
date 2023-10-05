<?php

namespace Modules\Setting\Services;

use Illuminate\Support\Facades\Cache;
use Modules\Setting\Entities\Setting;

class SettingService
{
    public function __construct()
    {
        //
    }

    public function get()
    {
        return  Setting::orderBy('id','DESC')->simplePaginate(getPaginate())->groupBy(function($data) {
            return $data->category;
        });
    }

    public function store($request)
    {

        $data = Setting::create($request->only('key','value','desc','category'));
        if ($data) {
            Cache::forget('Setting');
            return ['success', 'You have successfully created a Setting!' ];
        } else {
            return ['error', 'Failed Store', null];
        }
    }

    public function update($request, $id)
    {
        $data = Setting::find($id);
        if ($data) {
            $data->update($request->all());
            return ['success', 'You have successfully updated a Setting!' ,$data];
        } else {
            return ['error', 'Not Found'];
        }
    }
    public function destroy($id)
    {
        $data = Setting::find($id);
        if (!$data) {
            return ['error', __('Not Found')];
        }
        if ($data->delete()) {
            return ['success', __('You have successfully deleted a Setting!')];
        }
        else{
            return ['error', __('Failed Delete')];
        }
    }
}
