<?php

namespace App\Http\Controllers\Backend\student;
use App\Valoration;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewCommentsStudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function viewCommnets(){
        $id = auth()->user()->id;
        $sql = "SELECT * FROM services INNER JOIN valoration_services 
        WHERE services.codUserServices=$id  
        AND services.id=valoration_services.codServiceValoration ";
        $valorations = DB::select($sql);
        
        //return $valoration;
        return view('student.viewComment', compact('valorations'));
    }
}
