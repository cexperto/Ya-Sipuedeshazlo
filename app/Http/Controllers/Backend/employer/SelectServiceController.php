<?php

namespace App\Http\Controllers\Backend\employer;
use App\Service;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SelectServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function selectService(Request $request){
        //return $request;
        $idService = $request->input('id');

        $sql = "SELECT services.id,services.state,
        type_of_services.id,
        type_of_services.name,type_of_services.quantity,
        type_of_services.codServicesType
        FROM services INNER JOIN type_of_services
        WHERE services.id=$idService AND services.state='Disponible'
        AND services.id=type_of_services.codServicesType
        ";
        $types = DB::select($sql);
        //return $types;
        $services = Service::where('id','=',$idService)->get();
        return view('employer.edit',compact('services','types'));
    }
}
