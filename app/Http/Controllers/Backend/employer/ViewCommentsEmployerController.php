<?php

namespace App\Http\Controllers\Backend\employer;
use DB;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewCommentsEmployerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function viewCommnets(){
        $id = auth()->user()->id;
        $sql = "SELECT * FROM users INNER JOIN valorations 
        WHERE users.id=$id
        AND users.id=valorations.codeUserValoration";
        $valorations = DB::select($sql);
        
        //return $valoration;
        return view('employer.viewComment', compact('valorations'));
    }
}
