<?php

namespace App\Http\Controllers\Backend\student;
use App\Service;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HistoryStudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function history(){
        $idUser = auth()->user()->id;
        $sql = "SELECT * FROM services WHERE codUserServices=$idUser
        AND state='Empleador' OR state='Estudiante' OR state='Terminado' 
        ";
        $services = DB::select($sql);
        //return $services;
        return view('Student.history',compact('services'));
    }
    public function historyDetaill(Request $request){
        $serviceId = $request->input('serviceId');
        $employerId = $request->input('employerId');
        $employers = User::where('id','=',$employerId)->get();
        $services = Service::where('id','=',$serviceId)->get();
        return view('Student.historyDetaill', compact('employers','services'));
        //return $request;
    }
}




/* 
$sql = "SELECT users.id,users.name,
        users.lastName,users.phoneNumber,
        users.address,users.image,
        users.documentNumber,users.state,
        users.phoneNumber,users.address,
        users.email, 
        services.id as idServices,services.names,
        services.description,services.duration,
        services.cost,services.image as imageServices,
        services.state as stateServices,
        services.longbox,services.latbox,
        services.employerId,services.codUserServices
        
        FROM users INNER JOIN services
        WHERE users.id=$idUser  
        AND services.state='Terminado' 
        or services.state='Empleador' or services.state='Estudiante'
        AND users.id=services.codUserServices 
        AND services.codUserServices=$idUser
        ";
        
        $services = DB::select($sql);
        //return $services;
        if(empty($servicios)){
            //return $services;            
            return view('student.history',compact('services'));    
        }else{
            return view('student.create');
        } 

*/