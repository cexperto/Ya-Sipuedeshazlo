<?php

namespace App\Http\Controllers\Backend;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailEmployerController extends Controller
{
    public function index(Request $request){
        $idService = $request->input('employerId');
        $users = User::where('id','=',$idService)->get();

        return view('Admin/services.detailEmployer', compact('users'));        
    }
}
