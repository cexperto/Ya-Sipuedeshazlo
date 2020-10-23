<?php

namespace App\Http\Controllers\Backend\employer;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class updateService extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function selectService(Request $request, Service $service){
        $serviceUpdate =[
            'employerId'    => $request->input('employerId'),
        ];
        $serviceId = $request->input('serviceId');
        $employerId = $request->input('employerId');
        //return dd($request);
        //$service->update();
        DB::table('services')->where('id','=',$serviceId)->update($serviceUpdate);
        return back()->with('status', 'Servicio adquirido con exito');
    }
    
} 
