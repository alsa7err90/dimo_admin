<?php

namespace Modules\Roles\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use Modules\Roles\Services\RoleService;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RolesController extends Controller
{
    function __construct(private RoleService $service)
    {
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {

        $pageTitle = __('Role Management');
        $roles = $this->service->get();
        $rows =$this->service->getRowsTable($roles) ;
        $permission = Permission::get();
        return view('roles::roles.index', compact('roles', 'pageTitle','permission','rows'));

    }

    public function create()
    {
        $permission = Permission::get();
        return view('roles::roles.create',compact('permission'));
    }

    public function store(Request $request)
    {
       $validation =  $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        return   $this->service->store( $request);

    }
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('roles::roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('roles::roles.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);
        return   $this->service->update( $request, $id);

    }
    public function destroy($id)
    {
        return   $this->service->destroy( $id);
    }

    // public function index()
    // {
    //     return view('roles::index');
    // }
    // public function create()
    // {
    //     return view('roles::create');
    // }
    // public function show($id)
    // {
    //     return view('roles::show');
    // }
    // public function edit($id)
    // {
    //     return view('roles::edit');
    // }
}
