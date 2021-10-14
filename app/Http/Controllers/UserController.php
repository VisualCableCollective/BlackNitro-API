<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return User::all();
    }

    public function show($id) {
        return User::with("roles")->findorfail($id);
    }

    public function removeRole($userId, $roleId) {
        $user = User::findorfail($userId);

        $user->roles()->detach($roleId);

        return response("", 204);
    }

    public function addRole($userId, $roleId) {
        $user = User::findorfail($userId);

        $role = Role::findorfail($roleId);

        $user->roles()->attach($role);

        return response("", 201);
    }
}
