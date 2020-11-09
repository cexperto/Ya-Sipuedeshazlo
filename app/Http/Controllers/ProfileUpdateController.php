<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use DB;
class ProfileUpdateController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function userUpdate(ProfileRequest $request)
    {
        
        $idU = auth()->user()->id;
        $userUpdate= [
            'address'     => $request->input('address'),
            'phoneNumber' => $request->input('phoneNumber'),
        ];
        $user= DB::table('users')->where('id','=',$idU)->update($userUpdate);
        if($request->file('file')){
            //return $request;
            //Storage::disk('public')->delete($post->image);
            $imageUrl =$request->file('file')->store('users/'.$idU, 'public');
            $user= DB::table('users')->where('id','=',$idU)->update([
                'image' => $imageUrl
            ]);            
        }
        //return dd($userUpdate);
        return back()->with('status', 'Actualizado con exito');
    }

}
