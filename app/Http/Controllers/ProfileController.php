<?php
use Illuminate\Support\MessageBag;
namespace App\Http\Controllers;//
use App\User;//
use App\Http\Controllers\Controller;//
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class ProfileController extends Controller
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
        $idU = auth()->user()->id;
        $users = User::where('id','=',$idU)->get();
        if($users->isEmpty()){
            //return
        }else{
            return view('profile.index',compact('users'));
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        //dd($user->all());
        //$idU = auth()->user()->id;
        //$users = User::where('id','=',$idU)->get();
        return view('profile.edit', compact('user'));
         //$user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userUpdate(ProfileRequest $request)
    {
        
        $userUpdate =[
            'address'     => $request->input('address'),
            'phoneNumber' => $request->input('phoneNumber'),
        ];
        if($request->file('file')){
            Storage::disk('public')->delete($request->image);
            $request->image = $request->file('file')->store('users', 'public');
        }
        //return dd($userUpdate);
        $idU = auth()->user()->id;
        DB::table('users')->where('id','=',$idU)->update($userUpdate);
        return back()->with('status', 'Actualizado con exito');
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
