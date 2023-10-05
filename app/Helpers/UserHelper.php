<?php
use App\Constants\Roles;
use App\Models\User;

function getRolesById($id)
{
    return User::find($id)->getRoleNames();
}

function isUserAdmin(){
    $user = User::find(auth()->user()->id);

   return $user->hasAnyRole([Roles::Admin, Roles::Editor]);
}
