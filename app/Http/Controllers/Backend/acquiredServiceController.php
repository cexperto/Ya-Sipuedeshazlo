<?php

namespace App\Http\Controllers\Backend;
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
        return view('employer.buyServices', compact('detailAcquireds'));
        /* $services = Service::where('employerId','=', auth()->user()->id)
                            ->where('status','=','Adquirido')
                            ->get(); */
    }
}
