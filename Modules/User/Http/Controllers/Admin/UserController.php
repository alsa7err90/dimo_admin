<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Modules\User\Services\UserService;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
    }

    public function index(Request $request)
    {

        $pageTitle = __('User Management');
        $data = $this->service->get();
        $rows =$this->service->getRowsTable($data) ;
        $roles = Role::select('id','name')->get();
        return view('user::admin.index',compact('data','roles','pageTitle','rows')) ;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
         return $this->service->store($request);
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('user::admin.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('user::admin.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }


    // public function index()
    // {
    //     return view('user::index');
    // }

    // public function create()
    // {
    //     return view('user::create');
    // }
    // public function show($id)
    // {
    //     return view('user::show');
    // }

    // public function edit($id)
    // {
    //     return view('user::edit');
    // }

}
