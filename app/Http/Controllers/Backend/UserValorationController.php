<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Valoration;
class UserValorationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        //return 
        $valoration=$request->input('estrellas');
        $comments=$request->input('comment');
        $codeUserValoration=$request->input('id');
        //return $request;
        $userId = auth()->user()->id;
        if(empty($valorationService)){
            $valoration = Valoration::create([
                'valoration'            =>$valoration,
                'comments'              =>$comments,
                'codeUserValoration'    =>$userId,
            ]);
            return back()->with('status', 'Gracias por valorar el servicio');
            //return $valorationService;
        }else{
            return back();
        }
    }
}
