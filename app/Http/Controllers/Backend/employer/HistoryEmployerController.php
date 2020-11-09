<?php

namespace App\Http\Controllers\Backend\employer;
use App\User;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HistoryEmployerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function history(){
        $idUser = auth()->user()->id;
        
        $sql = "SELECT * FROM services WHERE employerId=$idUser
        AND state='Empleador' OR state='Estudiante' 
        OR state='Terminado' ";        
        $services = DB::select($sql);
        
        return view('employer.history', compact('services'));
    }
    public function historyDetaill(Request $request){
        $serviceId = $request->input('serviceId');
        $studentId = $request->input('studentId');
        $students = User::where('id','=',$studentId)->get();
        $services = Service::where('id','=',$serviceId)->get();
        //$offers = Service::where('id','=',$serviceId)->get();
        return view('employer.historyDetaill', compact('students','services'));
    }
}
/* 

 */