<?php

namespace App\Http\Controllers\Backend\Student;
use App\Service;
use App\TypeOfService;
use App\ValorationServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStudentRequest;
use Illuminate\Support\Facades\Storage;
use DB;

class ServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idU = auth()->user()->id;
        $services = Service::where('codUserServices','=',$idU)
                            ->where('state','=','Disponible')
                            ->orderBy('id','DESC')
                            ->get();
        //return $services;
        if(empty($services)){
            //return 'vasio';
            return view('student.create');
        }else{
            //return 'no vasio';
        return view('student.index',compact('services'));

        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStudentRequest $request)
    {
        //se registran los servicios
        //dd($request->all());
        //return $request;
        $name         = $request->input('names');
        $hours         = $request->input('hours');
        $disponibility = $request->input('disponibility');
        $days          = $request->input('days');
        $userId = auth()->user()->id;
        if($name == 'otro'){
            //$name = $request->input('otro');
            $service = Service::create([
                'names'           => $name,
                'description'     => $request['description'],
                'cost'            => $request['cost'],
                'latbox'          => $request['latbox'],
                'longbox'         => $request['longbox'],
                'state'          => 'Disponible',
                'codUserServices' => $userId,
            ]);
        }else{
            //return $name;

            $service = Service::create([
                'names'           => $request['names'],
                'description'     => $request['description'],
                'cost'            => $request['cost'],
                'latbox'          => $request['latbox'],
                'longbox'         => $request['longbox'],
                'state'          => 'Disponible',
                'codUserServices' => auth()->user()->id,
            ]);
        }
        //]+$request->all());
        //imagen
        if($request->file('file')){
            $service->image = $request->file('file')->store('services', 'public');
            $service->save();
        }
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
        //retornar
        return back()->with('status', 'Felicidades, servicio publicado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //return $service->id;
        $userId = auth()->user()->id;
        $sql = "SELECT users.id,
        services.id,        
        services.codUserServices,
        type_of_services.name,
        type_of_services.quantity,
        type_of_services.codServicesType
        
        FROM users INNER JOIN services 
        INNER JOIN type_of_services
        WHERE users.id=$userId 
        AND services.id=$service->id 
        AND type_of_services.codServicesType=$service->id 
        AND services.state='Disponible' ORDER BY services.id DESC
        
        ";
        $types = DB::select($sql);
        //return $types;
        
        //return $service;
        return view('student.edit', compact('service','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceStudentRequest $request, Service $service)
    {
        //return $request;
        $service->update($request->all());
        if($request->file('file')){
            Storage::disk('public')->delete($service->image);
            $service->image = $request->file('file')->store('services', 'public');
            $service->save();
        }
        return back()->with('status', 'Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Storage::disk('public')->delete($service->image);
        $typo = TypeOfService::find($service->id);
        $valoration = ValorationServices::find($service->id);
        $valoration = ValorationServices::find($service->id);
        if($typo){
            TypeOfService::find($service->id)->delete();
        }
        if($valoration){
            ValorationServices::find($service->id)->delete();
        }
        //$service->typo()->delete();
        $service->delete();
        //return back()->with('status', 'Eliminado con exito');
        return redirect('services')->with('status','Eliminado con exito');
    }
}
