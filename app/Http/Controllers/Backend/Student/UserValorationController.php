<?php

namespace App\Http\Controllers\Backend\student;

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
        //return $request;
        $v=$request->input('estrellas');
        
        //return $valoration2;
        $comments=$request->input('comment');
        $codeUserValoration=$request->input('id');
        //return $request;muy buena persona doña nelcy
        $userId = auth()->user()->id;
                
        //return $count;        
        $valoration = Valoration::create([
            'valoration'            =>$v,
            'comments'              =>$comments,
            'evaluator'             =>$userId,
            'codeUserValoration'    =>$codeUserValoration,
            
        ]);
    return redirect('completeStudent')->with('status', 'Valoracion exitosa');
    


        
    }
}
