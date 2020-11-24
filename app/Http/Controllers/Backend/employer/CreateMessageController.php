<?php

namespace App\Http\Controllers\Backend\employer;
use App\User;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CreateMessageController extends Controller
{
    public function createMessage(Request $request){
        //return $request;
        $sender = auth()->user()->id;
        //return $sender;
        $codUser = $request->input('codUser');
        //return $codUser;
        $contact = Contact::create([
            'subject'         => $request['subject'],
            'message'         => $request['message'],
            'sender'          => $sender,
            'codUserContact'  => $codUser,                  
        ]);
        return redirect('viewFindSkills')->with('status', 'Enviado con exito');

    }
    public function viewMessage(){
        $id =auth()->user()->id;
        $sql = "SELECT users.id,users.name,
       users.lastName,users.phoneNumber,users.email,
       contacts.id,contacts.subject,contacts.message,
       contacts.sender,contacts.codUserContact
       FROM users INNER JOIN contacts WHERE contacts.sender=$id 
       AND  users.id=contacts.codUserContact
      ";
       $messages = DB::select($sql);
       // return $messages;
        return view('Employer.messages',compact('messages'));
    }
    
}
