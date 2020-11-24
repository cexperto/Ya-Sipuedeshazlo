<?php

namespace App\Http\Controllers\Backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class MessageController extends Controller
{
    public function viewMessage(){
        $id =auth()->user()->id;
        // $users = User::where('id','=',$id)->get();
        // $messages = Contact::where('codUserContact','=',$id)->get();
        //$contact = $messages['id'];
       $sql = "SELECT users.id,users.name,
       users.lastName,users.phoneNumber,users.email,
       contacts.id,contacts.subject,contacts.message,
       contacts.sender,contacts.codUserContact
       FROM users INNER JOIN contacts WHERE contacts.sender=users.id
       AND contacts.codUserContact=$id       
      ";
       $messages = DB::select($sql);
        //return $messages;
        return view('Student.messages',compact('messages'));
    }
}
