<?php

namespace App\Http\Controllers\Backend\Student;
use App\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStudentRequest;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('student/services.index',compact('$services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentCreate');
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
        $service = Service::create([
            'name'            => $request['name'],
            'description'     => $request['description'],
            'cost'           => $request['cost'],
            'latbox'          => $request['latbox'],
            'longbox'         => $request['longbox'],
            'status'          => 'Disponible',
            'codUserRol'      => auth()->user()->id,
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
