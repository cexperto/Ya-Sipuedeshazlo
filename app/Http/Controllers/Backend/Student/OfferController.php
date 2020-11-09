<?php

namespace App\Http\Controllers\Backend\student;

use App\Application;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('state','=','OfertaDisponible')->get();
        return view('student/offer.index', compact('services'));
    }
    public function apply(Request $request){
        $codServices = $request->input('id');
        $idUser = auth()->user()->id;
        //return $request;
        $sql = Application::where('codServices','=',$codServices)
                            ->where('userId','=',$idUser)->get();
        $count = count($sql);
        //return $count;
        if($count!=0){
            return redirect('offerStudent')->with('status', 'Usted ya aplico a esta oferta');
        }else{
            $application = Application::create([                    
                'userId'        => $idUser,            
                'codServices'   => $codServices,
            ]);
            return redirect('offerStudent')->with('status', 'Aplico con exito');
        }
    }
    public function myAply(){
        $idUser = auth()->user()->id;        
        $services = DB::table('services')
                    ->join('applications','services.id','=','codServices')
                    ->where('userId','=',$idUser)
                    ->get();
        //return $services;
        return view('student/offer.edit',compact('services'));
    }
    public function destroyApply(Request $request){
        $idUser = auth()->user()->id;        
        $codServices= $request->input('codServices');
        $applications = Application::where('codServices','=',$codServices)
                                    ->where('userId','=',$idUser)
                                    ->delete();
        return redirect('offerStudent')->with('status','Postulacion eliminado con exito');
        
    }
    
}
