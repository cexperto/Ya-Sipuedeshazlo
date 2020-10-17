<?php

namespace App\Http\Controllers\Backend;
use App\User;
use App\Service;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailServiceController extends Controller
{
    
    public function detailService(Request $request){
        $idService = $request->input('id');
        //return $idService;         
        //$employerId= $request['employerId'];
        $sql = "SELECT users.id,users.name,users.lastName,users.phoneNumber,
        users.address,users.image,users.numberDocument,users.state,
        users.phoneNumber,users.address,users.valoration,users.email, 
        services.id as idServices,services.names,services.description,
        services.duration,services.cost,services.valoration,services.image as imageServices,
        services.status,services.address,services.longbox,
        services.latbox,services.employerId,services.codUserServices
        
        FROM users INNER JOIN services
        WHERE services.id=$idService AND users.id=services.codUserServices
        ";
        //$sql2 ="SELECT * FROM users WHERE ";
        $details = DB::select($sql);
        // $coleccion =['nombrex'=>$services];
        //return $services;
        return view('Admin/services.detail', compact('details'));

        
        
        

    }
}
