<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ticketController extends Controller
{
    public function index(){
        $contacts = Contact::latest()->get();
        return view('admin.adminHome', compact('contacts'));
    }
}
