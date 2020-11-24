<?php

namespace App\Http\Controllers\Backend\student;
use App\Service;
use App\TypeOfService;
use App\User;
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
        $services= Service::where('codUserServices','=',$idU)
                            ->where('state','=','Adquirido')->get();
        $count = count($services);
        //return $count;
        //$details = DB::select($sql);
        // $coleccion =['nombrex'=>$services];
        //return $services;
        //return view('student.running', compact('services'));
        //return $services;
        //return 'hola';
        if($count==0){
            //return 'vasio';
            return redirect('services')->with('status','Ningun empleador a adquirido tus servicios');
        }else{
            //return 'no vasio';
        return view('Student.running',compact('services'));
        }
    }
    public function runningDetaill(Request $request){
        $id = $request->input('id');
        $employerId = $request->input('employerId');
        $users = User::where('id','=',$employerId)->get();
        $types = TypeOfService::where('codServicesType','=',$id)->get();
        $services = Service::where('id','=',$id)->get();
        //return $types;
        return view('student.runningDetaill',compact('users','services','types'));
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