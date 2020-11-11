<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Role;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticated($request , $user){
        /* $image=$user->image;
        $documentType=$user->documentType;
        $documentNumber=$user->documentNumber;
         */
        if($user->codUserRol==1){            
            return redirect()->route('ticket');
        }if($user->codUserRol==2 && $user->state=='Activo'){
            return redirect()->route('services.create');
        }if($user->codUserRol==3 && $user->state=='Activo'){
            //if(empty($image) || empty($image) ){return 'imagen vasia';}
            return redirect()->route('employer.create');
        }else{
            return redirect()->back();
            
        }
        
    }
}
