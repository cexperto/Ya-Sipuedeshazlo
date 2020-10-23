<?php

namespace App\Http\Controllers\Backend;
use App\User;
use App\Service;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function detailService(Request $request){
        $idService = $request->input('id');
        //return $idService;         
        //$employerId= $request['employerId'];
        $sql = "SELECT users.id,users.name,users.lastName,users.phoneNumber,users.address,users.image, users.documentNumber,users.state,users.phoneNumber,users.address,users.email,

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

        ";
        //$sql2 ="SELECT * FROM users WHERE ";
        $details = DB::select($sql);
        // $coleccion =['nombrex'=>$services];
        //return $services;
        return view('Admin/services.detail', compact('details'));

        
        
        

    }
}
