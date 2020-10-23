<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class completeStudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function complete(){
        $idUser = auth()->user()->id;
        $sql = "SELECT users.id,users.name,
        users.lastName,users.phoneNumber,
        users.address,users.image as imageUsers ,
        users.documentNumber,users.state,
        users.phoneNumber,
        users.email, 
        services.id as idServices,services.names,
        services.description,
        services.cost,
        services.image as imageServices,services.state,
        services.longbox,services.latbox,
        services.employerId,services.codUserServices
        
        FROM users INNER JOIN services
        WHERE users.id=services.codUserServices AND services.codUserServices=$idUser
           ";
        $services = DB::select($sql);
        return view('student.complete', compact('services'));
        
    }
}
