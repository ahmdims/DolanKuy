<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faq = Faq::orderBy('created_at', 'desc')->get();
        return view('app.faq.index', compact('faq'));
    }

    public function admin()
    {
        $faq = Faq::all();
        return view('admin.faq.index', compact('faq'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
    ]);

    $faq = Faq::findOrFail($id);
    $faq->update($request->only(['question', 'answer'])); // Hanya ambil yang diperlukan

    return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil diperbarui!');
}


    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'Faq deleted successfully.');
    }
}
