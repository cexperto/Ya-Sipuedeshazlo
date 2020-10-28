<?php

namespace App\Http\Controllers\Backend;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CancelServiceController extends Controller
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
            return view('cancelServices');  
        
    }
}
