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
        $valoration = Valoration::where('evaluator','=',$userId)->get();
        $count=count($valoration);
        //return $count;        
    
        if($count!=0){          
            return back()->with('status', 'Ya valoraste este usuario');
        }else{
            $valoration = Valoration::create([
                'valoration'            =>$v,
                'comments'              =>$comments,
                'evaluator'             =>$userId,
                'codeUserValoration'    =>$codeUserValoration,
                
            ]);
        return back()->with('status', 'Gracias por valorar el empleador');
        } 

        
    }
}
