<?php

namespace App\Http\Controllers\Backend\student;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinishServicesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function finish(Request $request){
        $idService = $request->input('idServices');        
        
        $service = DB::table('services')
            ->where('id', $idService)
            ->update([                
                'state'      => 'Terminado'
            ]);
            return view('student.finish');

    }
}
