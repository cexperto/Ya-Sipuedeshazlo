<?php

namespace App\Http\Controllers\Backend\employer;
use App\User;
use App\Service;
use App\TypeOfService;
use App\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use Illuminate\Http\Request;
use DB;

class OfferController extends Controller
{
    public function index(){
        $userId = auth()->user()->id;
        $services = Service::where('codUserServices','=',$userId)
                             ->where('state','=','OfertaDisponible')->get();
        return view('Employer/offer.index',compact('services'));
        //return view('employer/offer.create');
    }
    public function create(){
        return view('Employer/offer.create');
    }
    public function store(OfferRequest $request){
        //return $request;
        $name          = $request->input('names');        
        $hours         = $request->input('hours');
        $disponibility = $request->input('disponibility');
        $days          = $request->input('days');
        $userId = auth()->user()->id;
        
        $service = Service::create([
            'names'           => $name,                      
            'description'     => $request['description'],            
            'cost'            => $request['cost'],
            'latbox'          => $request['latbox'],
            'longbox'         => $request['longbox'],
            'state'           => 'OfertaDisponible',
            'codUserServices' => $userId,
        ]);
        $codServices = Service::latest('id')->first()->id;
        if($hours){            
            $type = TypeOfService::create([                
                'name'              => 'horas',
                'quantity'          => $hours,
                'codServicesType'   => $codServices,
            ]);
        }if($disponibility=='servicios'){
            $type = TypeOfService::create([                
                'name'              => $disponibility,
                'quantity'          => '',
                'codServicesType'   => $codServices,
            ]);
        }if($disponibility=='weekend'){
            $type = TypeOfService::create([                
                'name'              => $disponibility,
                'quantity'          => $days,
                'codServicesType'   => $codServices,
            ]);
            }
            if($disponibility=='nocturnos'){
                $type = TypeOfService::create([                    
                    'name'              => $disponibility,
                    'quantity'          => $days,
                    'codServicesType'   => $codServices,
                ]);
                }
                if($disponibility=='convenir'){
                    $type = TypeOfService::create([                    
                        'name'              => $disponibility,
                        'quantity'          => '',
                        'codServicesType'   => $codServices,
                    ]);
                }        
        //retornar
        return redirect('offer')->with('status', 'Oferta publicada con exito');
    }
    public function edit(Request $request){
        $serviceId = $request->input('id');
        $services = Service::where('id','=',$serviceId)->get();

        return view('Employer/offer.edit', compact('services'));

    }
    public function update(Request $request){
        //return $request;
        $userId = auth()->user()->id;
        $idService = $request->input('id');        
        
        $service = DB::table('services')
            ->where('id', $idService)
            ->update([                
                'names'            => $request['names'],
                'description'      => $request['description'],
                'cost'             => $request['cost'],
            ]);
        
        return redirect('offer')->with('status', 'Actualizado con exito');
    }
    public function destroy(Request $request){
        $idService = $request->input('id');        
        $service = DB::table('services')
        ->where('id', $idService)
        ->delete();
        return redirect('offer')->with('status', 'Elimanado con exito');

    }
    public function showApply(Request $request){
        $idService = $request->input('id');        

        $users = DB::table('users')
                    ->join('applications','applications.userId','=','users.id')
                    ->join('services','services.id','=','codServices')
                    ->where('codServices','=',$idService)->get();
        
        //$users = DB::select($sql);
        //return $users;        
        return view('Employer/offer.application', compact('users'));
    }    
    public function finishOffer(Request $request){
        //return $request;
        $userId = auth()->user()->id;
        $idService = $request->input('id');        
        
        $service = DB::table('services')
            ->where('id', $idService)
            ->update([                
                'state'            => 'OfertaTerminada',
            ]);
        return redirect('offer')->with('status', 'Oferta terminada');
    }
    public function offerHistory(){
        $userId = auth()->user()->id;
        $services = Service::where('codUserServices','=',$userId)
                        ->where('state','=','OfertaTerminada')->get();

    return view('Employer/offer.history', compact('services'));
        
    }
}
/* 
SELECT * FROM users INNER JOIN services 
INNER JOIN applications WHERE applications.userId=users.id 
AND services.id=applications.codServices AND codServices=9
 */