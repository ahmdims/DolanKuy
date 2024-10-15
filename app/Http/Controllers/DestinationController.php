<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function admin()
    {
        $destination = Destination::all();
        return view('admin.destination.index', compact('destination'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_time' => 'required|string|max:255',
            'closing_time' => 'required|string|max:255',
            'ticket_price' => 'required|numeric',
            'facilities' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric',
        ]);

        $slug = Str::slug($request->name);
        Destination::create(array_merge($request->all(), ['slug' => $slug]));

        return redirect()->route('admin.destination.index')->with('success', 'Destination created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_time' => 'nullable|string|max:255',
            'closing_time' => 'nullable|string|max:255',
            'ticket_price' => 'nullable|numeric',
            'facilities' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
        ]);

        $destination = Destination::findOrFail($id);
        if ($request->has('name') && !empty($request->name)) {
            $destination->slug = Str::slug($request->name);
        }

        $destination->update($request->all());
        $destination->save();

        return redirect()->route('admin.destination.index')->with('success', 'Destination updated successfully.');
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->route('admin.destination.index')->with('success', 'Destination deleted successfully.');
    }
}
