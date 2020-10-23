<?php

namespace App\Http\Controllers\Backend;
use App\Service;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function selectService(Request $request){
        $idService = $request->input('id');
        $services = Service::where('id','=',$idService)->get();
        return view('employer.edit',compact('services'));
    }
}
