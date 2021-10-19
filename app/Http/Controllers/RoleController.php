<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        return Role::with('creator')->get();
    }

    public function show($id) {
        return Role::with('creator')->findorfail($id);
    }

    public function delete($id) {
        $foundRole = Role::findorfail($id);
        $foundRole->delete();

        return response("", 204);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required',
        ]);

        auth()->user()->createdRoles()->create([
            "name" => $data["name"]
        ]);

        return response("", 201);
    }
}
