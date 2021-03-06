<?php

namespace App\Http\Controllers\Backend\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailEmployerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        $idService = $request->input('employerId');
        $users = User::where('id','=',$idService)->get();

        return view('Admin/services.detailEmployer', compact('users'));        
    }
}
