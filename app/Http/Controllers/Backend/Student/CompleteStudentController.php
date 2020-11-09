<?php

namespace App\Http\Controllers\Backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Valoration;
use App\Service;
class completeStudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function complete(){
        $idUser = auth()->user()->id;
        //return $idUser;        
        $services = Service::where('codUserServices','=',$idUser)
                            ->where('state','=','Terminado')->get();
        return view('student.complete', compact('services'));        
        
    }
    public function completeDetaill(Request $request){
        //return $request;
        $employerId = $request->input('employerId');
        $id = $request->input('id');
        $users = User::where('id','=',$employerId)->get();
        $services = Service::where('id','=',$id)->get();
        //$valorations = Valoration::where('codeUserValoration','=',$employerId)->get();
        //return $valorations;
        //$count = count($valorations);
        return view('student.completeDetaillForm', compact('users','services'));        
        /* if($count==0){
           // return $count;
            
        }else{
            //return $count;
            return view('student.completeDetaill', compact('users','services','valorations'));        
        } */
        
        //return $valorations;

    }
}
