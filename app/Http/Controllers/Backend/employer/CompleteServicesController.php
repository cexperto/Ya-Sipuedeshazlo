<?php

namespace App\Http\Controllers\Backend\employer;
use App\User;
use App\Service;
use App\ValorationServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CompleteServicesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function complete(){
        $idUser = auth()->user()->id;    
        $services = Service::where('employerId','=',$idUser)
        ->where('state','=','Terminado')->get();

        //$services = DB::select($sql);        
        //return $services;

        return view('employer.complete', compact('services'));        
    }
    public function detaillComplete(Request $request){
        $id = auth()->user()->id;
        //return 'llego';
        $userId = $request->input('userId');
        $serviceId = $request->input('id');
        $students = User::where('id','=',$userId)->get();
        $services = Service::where('id','=',$serviceId)->get();
        $valorations = ValorationServices::where('codServiceValoration','=',$serviceId)->get();
        //return $valorations;
        $results= count($valorations);
        //return $results;
        if($results==0){
            return view('employer.detaillCompleteForm', compact('students','services','valorations'));
        }
        else{            
            //return $valorations;
            return view('employer.detaillComplete', compact('students','services','valorations'));
        }
        //return $valorations;
    }
}
