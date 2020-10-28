<?php

namespace App\Http\Controllers\Backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CancelServicesStudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function cancelServiceStudent(Request $request){
        $idService = $request->input('idServices');        
        
        $service = DB::table('services')
            ->where('id', $idService)
            ->update([                
                'state'      => 'Estudiante'
            ]);
            return redirect()->route('historyStudent');  
        
        /* if(auth()->user()->codUserRol ==2){
        }
        if(auth()->user()->codUserRol ==3){
            //return auth()->user()->id;
            $serviceUpdate = [
                'status' => 'Cancelado_por_empleador' 
            ];
            DB::table('services')->where('id','=',$serviceId)->update($serviceUpdate);
            return view('cancelServices');        
        } */
        
    }
}
