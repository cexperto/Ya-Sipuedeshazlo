<?php

namespace App\Http\Controllers\Backend\student;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $contacts = Contact::where('sender','=',$id)
                            ->where('subject','=','ticket')
                            ->where('codUserContact','=',1)->latest()->get();
        return view('Student/support.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Student/support.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
        $id = auth()->user()->id;
        $contact = Contact::create([
            'subject'                  => 'ticket',
            'message'                  => $request['message'],
            'sender'                   => $id,
            'codUserContact'           => 1,
            
        ]);        
        return redirect('supportStudent')->with('status', 'Ticket enviado exitosamente');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //return $contact;
        $id = $request->input('id');
        $contact = Contact::where('id','=',$id)->delete();        
        return back()->with('status', 'Eliminado con exito');
    }
}
