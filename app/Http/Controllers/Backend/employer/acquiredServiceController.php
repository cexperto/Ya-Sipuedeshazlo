<?php

namespace App\Http\Controllers\Backend\employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class acquiredServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function acquired(){
        
        $idUser=auth()->user()->id;
        $sql = "SELECT 
        users.id,users.name,
        users.lastName,users.phoneNumber,
        users.address,users.image,
        users.documentNumber,users.state,
        users.phoneNumber,users.address,
        users.email, 
        services.id as idServices,
        services.names,services.description,
        services.duration,services.cost,        
        services.image as imageServices,
        services.state,
        services.longbox,services.latbox,
        services.employerId,services.codUserServices
        
        FROM users INNER JOIN services
        WHERE services.employerId=$idUser 
        AND users.id=services.codUserServices AND services.state='Adquirido'";
        $detailAcquireds =  DB::select($sql);
        //return $services;
        $sqlType = "SELECT services.id,services.state,
        type_of_services.id,services.employerId,
        type_of_services.name,type_of_services.quantity,
        type_of_services.codServicesType
        FROM services INNER JOIN type_of_services
        WHERE services.employerId=$idUser AND services.state='Adquirido'
        AND services.id=type_of_services.codServicesType
        ";
        $types = DB::select($sqlType);
        return view('employer.buyServices', compact('detailAcquireds','types'));
        /* $services = Service::where('employerId','=', auth()->user()->id)
                            ->where('status','=','Adquirido')
                            ->get(); */
    }
}
