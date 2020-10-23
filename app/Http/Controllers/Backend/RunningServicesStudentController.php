<?php

namespace App\Http\Controllers\Backend;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RunningServicesStudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function runningServices(){
        $idU = auth()->user()->id;
        $sql = "SELECT users.id,users.name,
        users.lastName,users.phoneNumber,
        users.image,users.documentNumber,
        users.phoneNumber,users.email, 
        services.id as idServices,
        services.names,services.description,
        services.duration,services.cost,
        services.state,
        services.image as imageServices,
        services.longbox,services.latbox,
        services.employerId,services.codUserServices
        
        FROM users INNER JOIN services
        WHERE services.employerId=users.id AND services.codUserServices=$idU 
        AND services.state='Adquirido'";
        //$sql2 ="SELECT * FROM users WHERE ";
        $details = DB::select($sql);
        // $coleccion =['nombrex'=>$services];
        //return $services;
        return view('student.running', compact('details'));
        //return $services;
        if($services->isEmpty()){
            //return 'vasio';
            return view('student.create');
        }else{
            //return 'no vasio';
        return view('student.running',compact('services'));

        }
    }
}
/* 
users.id,users.name,
        users.lastName,users.phoneNumber,
        users.image,users,documentNumber,
        users.phoneNumber,users.email, 
        services.id as idServices,
        services.names,services.description,
        services.duration,services.cost,
        services.image as imageServices,
        services.longbox,
        services.latbox,services.employerId,services.codUserServices
 */