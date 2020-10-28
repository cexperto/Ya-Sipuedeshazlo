<?php

namespace App\Http\Controllers\Backend\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CancelServiceEmployerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function cancelServiceEmployer(Request $request){
        $idService = $request->input('id');        
        //return $idService;
        $service = DB::table('services')
            ->where('id', $idService)
            ->update([                
                'state'      => 'Empleador'
            ]);
            return redirect('historyEmployer')->with('status','Cancelado');  
        
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
