<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\ValorationServices;
use Illuminate\Http\Request;

class ValorationServiceController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;
        $valoration=$request->input('estrellas');
        $comments=$request->input('comment');
        $codServiceValoration=$request->input('id');

        //$valorationService = ValorationServices::where('id','=',$codeUserValoration);
        $valoration = ValorationServices::create([
            'valoration'            =>$valoration,
            'comments'              =>$comments,
            'codServiceValoration'  =>$codServiceValoration,
        ]);
        return redirect('complete')->with('status','Gracias por comentar');
        /* if(empty($valorationService)){
            //return $valorationService;
        }else{
            return back();
        } */


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Valoration  $valoration
     * @return \Illuminate\Http\Response
     */
    public function show(Valoration $valoration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Valoration  $valoration
     * @return \Illuminate\Http\Response
     */
    public function edit(Valoration $valoration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Valoration  $valoration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valoration $valoration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Valoration  $valoration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valoration $valoration)
    {
        //
    }
}
