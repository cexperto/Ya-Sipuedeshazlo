<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request){
        //return $request;
        $contact = Contact::create([
            'subject'           => $request['subject'],
            'message'           => $request['message'],
            'sender'            => '0',
            'codUserContact '   => '1',
        ]);
        return redirect('contacto')->with('status', 'Mensaje enviado');

    }
}
