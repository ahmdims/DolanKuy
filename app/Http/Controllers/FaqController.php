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
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'Faq created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'nullable|string|max:255',
            'answer' => 'nullable|string',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'Faq updated successfully.');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'Faq deleted successfully.');
    }
}
