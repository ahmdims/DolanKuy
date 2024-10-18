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

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
        ]);

        // Ambil entri contact pertama
        $contact = Contact::first();

        if ($contact) {
            // Perbarui data contact yang sudah ada
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->address = $request->address;
            $contact->save();

            return redirect()->route('admin.contact.index')->with('success', 'Kontak berhasil diperbarui!');
        } else {
            return back()->with('error', 'Tidak ada data kontak yang ditemukan untuk diperbarui.');
        }
    }

    public function admin()
{
    // Get the first contact entry
    $contact = Contact::first(); // This returns a single instance, not a collection
    return view('admin.contact.index', compact('contact'));
}

}
