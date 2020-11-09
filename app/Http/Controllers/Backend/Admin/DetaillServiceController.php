<?php

namespace App\Http\Controllers\Backend\Admin;
use App\User;
use App\Service;
use App\TypeOfService;
use App\ValorationServices;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetaillServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function detaillService(Request $request){
        $idService = $request->input('id');
        $employerId = $request->input('employerId');
        $codUserServices = $request->input('codUserServices');
        
        /* $sql = "SELECT users.id,users.name,users.lastName,users.phoneNumber,users.address,users.image, users.documentNumber,users.state,users.phoneNumber,users.address,users.email,

		services.id as idServices,
		services.names,
        services.description,services.duration,
        services.cost,services.image as imageServices,
        services.state,
        services.longbox,services.latbox,
        services.employerId,services.codUserServices,
        vs.id,vs.valoration,
        vs.comments,vs.codServiceValoration 
        FROM users INNER JOIN services 
        INNER JOIN valoration_services as vs
        WHERE users.id=services.codUserServices 
        AND services.id=$idService
        AND services.id=vs.codServiceValoration

        "; */        
        //$details = DB::select($sql);
        $students = User::where('id','=',$codUserServices)->get();
        $services = Service::where('id','=',$idService)->get();
        $employers = User::where('id','=',$employerId)->get();
        $types = TypeOfService::where('codServicesType','=',$idService)->get();
        $valorations = ValorationServices::where('codServiceValoration','=',$idService)->get();
        //return $service;
        return view('Admin/services.detail', compact('students','services','employers','types','valorations'));

    }
}
