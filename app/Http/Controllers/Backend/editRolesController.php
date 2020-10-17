<?php

namespace App\Http\Controllers\Backend;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class editRolesController extends Controller
{
    public function edit(Request $request){
        $rolId = $request->input('id');
        $roles = Role::where('id','=',$rolId)->get();
        return view('admin/roles.edit',compact('roles'));
    }
}
