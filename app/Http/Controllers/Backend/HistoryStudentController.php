<?php

namespace App\Http\Controllers\Backend;
use App\Service;
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
        WHERE services.codUserServices=$idUser AND users.id=services.codUserServices
        ";
        //$sql2 ="SELECT * FROM users WHERE ";
        $services = DB::select($sql);
        //return $services;
        if(empty($servicios)){
            //return $services;            
            return view('student.history',compact('services'));    
        }else{
            return view('student.create');
        } 
        
        /*  */        
            
    }
}
