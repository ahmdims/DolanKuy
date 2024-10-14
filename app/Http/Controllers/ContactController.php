<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('app.contact.index', compact('contact'));
    }

    public function adminIndex()
    {
        $contact = Contact::all();
        return view('admin.contact.index', compact('contact'));
    }
}