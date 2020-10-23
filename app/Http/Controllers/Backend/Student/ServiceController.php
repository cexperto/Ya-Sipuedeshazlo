<?php

namespace App\Http\Controllers\Backend\Student;
use App\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStudentRequest;
use Illuminate\Support\Facades\Storage;

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
        if($services->isEmpty()){
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
        $service = Service::create([
            'names'            => $request['names'],
            'description'     => $request['description'],
            'cost'           => $request['cost'],
            'latbox'          => $request['latbox'],
            'longbox'         => $request['longbox'],
            'state'          => 'Disponible',
            'codUserServices' => auth()->user()->id,
        ]);
        //]+$request->all());
        //imagen
        if($request->file('file')){
            $service->image = $request->file('file')->store('services', 'public');
            $service->save();
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
        //return $service;
        return view('student.edit', compact('service'));
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
        $service->delete();
        return back()->with('status', 'Eliminado con exito');
    }
}
