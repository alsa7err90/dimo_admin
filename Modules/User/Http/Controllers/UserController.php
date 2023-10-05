<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('user::index');
    }


    public function myProfile()
    {
        $user = auth()->user();
        return view('user::my_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
        ]);
        #Match The Old Password
        if(isset($request->old_password) && !Hash::check($request->old_password, auth()->user()->password)){
            return back()->with('error', "Old Password Doesn't match!");

        }

        if ($request->file('image')) {
            $name_image = uploadImage($request->file('image'),'image');
            $request->request->add([ 'avatar' => $name_image  ]);
        }
        if($request->password){
            $request->request->add([ 'password' =>  Hash::make($request->new_password)  ]);
            User::whereId(auth()->user()->id)->update($request->except('image','old_password','new_password',"_token",'new_password_confirmation'));
        }
        else
         User::whereId(auth()->user()->id)->update($request->except('image','old_password','new_password','new_password_confirmation','password',"_token"));

        return back()->with('success', 'Success Update Profile');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
