<?php
namespace App\Http\Controllers\Backend;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
USE DB;

class BuyServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function buyService(Request $request){
        $idService = $request->input('id');        
        //return $idService;
        $service = DB::table('services')
            ->where('id', $idService)
            ->update([
                'employerId' => auth()->user()->id,
                'status'      => 'Adquirido'
            ]);
            //$service->save();
            return view('employer.succesBuyServices');
    }
    
}
