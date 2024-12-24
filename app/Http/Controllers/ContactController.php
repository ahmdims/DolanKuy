<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Website::first();
        return view('app.contact.index', compact('contact'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        try {
            Mail::raw("Nama: {$data['name']}\nEmail: {$data['email']}\nPesan: {$data['message']}", function ($message) use ($data) {
                $message->to(env('MAIL_FROM_ADDRESS'))
                    ->subject($data['subject']);
            });

            return back()->with('success', 'Pesan Anda telah terkirim!');
        } catch (\Exception $e) {
            \Log::error("Gagal mengirim email: " . $e->getMessage());
            return back()->with('error', 'Gagal mengirim pesan. Silakan coba lagi nanti.');
        }
    }
}
