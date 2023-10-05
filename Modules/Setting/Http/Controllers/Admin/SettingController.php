<?php

namespace Modules\Setting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
 use Modules\Setting\Entities\Setting;
 use Modules\Setting\Services\SettingService;

class SettingController extends Controller
{
    public function __construct(private SettingService $service)
    {
    }
    public function index(Request $request)
    {
        $pageTitle = __('Setting Page');
        $all_items = $this->service->get();
        return view('setting::admin.index',compact('all_items' ,'pageTitle' ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
         $notify =  $this->service->store($request);
        return redirect()->back()->withNotify( $notify);

    }
    public function updateAll(Request $request)
    {
        foreach ($request->except('_token') as  $key=>$value){
                Setting::where('key', $key)->update(['value'=>$value]);
         }

        return redirect()->back()->withNotify(['success', __("Success Update")]);

    }

}
