<?php

namespace Modules\Roles\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Roles\Services\PermissionService;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct(private  PermissionService $service)
    {
        // $this->middleware('permission:permissions_list-list|permissions_list-create|permissions_list-edit|permissions_list-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:permissions_list-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:permissions_list-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:permissions_list-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $permissions = $this->service->get();
        $rows =$this->service->getRowsTable($permissions) ;
        $pageTitle = __('Permission Management');
         return view('roles::permission.index',compact('permissions','pageTitle','rows'));
    }

    public function create()
    {
         return view('roles::permission.create');
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
     }



    public function edit(Permission $permission)
    {
        return view('roles::permission.edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        return $this->service->update($request,$permission);
     }

    public function destroy($id)
    {
        return $this->service->destroy($id);
     }


    public function delete_many_permission(Request $request)
    {
        $ids = $request->ids;
       Permission::whereIn('id',explode(",",$ids))->delete();

       $response = [
        'success' => true,
        'data'    => $ids,
        'message' => 'success delete all selected',
    ];
    return $this->sendResponse(true, 'You have successfully deleted a Permissions!');



    }
    // public function index()
    // {
    //     return view('roles::Permissions.index');
    // }
    // public function create()
    // {
    //     return view('roles::Permissions.create');
    // }
    // public function show($id)
    // {
    //     return view('roles::Permissions.show');
    // }
    // public function edit($id)
    // {
    //     return view('roles::Permissions.edit');
    // }

}
