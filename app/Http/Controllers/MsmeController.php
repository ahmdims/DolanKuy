<?php

namespace App\Http\Controllers;

use App\Models\Msme;
use App\Models\Like;
use App\Models\History;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MsmeController extends Controller
{
    public function index()
    {
        $msme = Msme::all();
        return view('app.msme.index', compact('msme'));
    }

    public function show($slug)
    {
        // $detail = MSME::with('images')->find($id);

        $detail = Msme::where('slug', $slug)->firstOrFail();

        $detail->increment('view_count');

        $apiKey = env('WEATHER_API_KEY');
        $url = "http://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$detail->city}&aqi=no";

        $client = new Client();
        try {
            $response = $client->get($url);
            $weatherData = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            $weatherData = null;
        }

        return view('app.msme.detail', compact('detail', 'weatherData'));
    }

    public function like($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $msme = Msme::where('slug', $slug)->firstOrFail();

        $likeExists = Like::where('user_id', auth()->id())
            ->where('entity_id', $msme->id)
            ->where('entity_type', 'msme')
            ->exists();

        if (!$likeExists) {
            Like::create([
                'user_id' => auth()->id(),
                'entity_id' => $msme->id,
                'entity_type' => 'msme',
            ]);

            $msme->likes_count = $msme->likes()->count(); // Hitung jumlah likes
        } else {
            Like::where('user_id', auth()->id())
                ->where('entity_id', $msme->id)
                ->where('entity_type', 'msme')
                ->delete();

            $msme->likes_count = $msme->likes()->count(); // Hitung ulang jumlah likes setelah penghapusan
        }

        $msme->save();
        return back();
    }

    public function history($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $msme = Msme::where('slug', $slug)->firstOrFail();

        $historyExists = History::where('user_id', auth()->id())
            ->where('entity_id', $msme->id)
            ->where('entity_type', 'msme')
            ->exists();

        if (!$historyExists) {
            History::create([
                'user_id' => auth()->id(),
                'entity_id' => $msme->id,
                'entity_type' => 'msme',
            ]);

            $msme->histories_count = $msme->histories()->count(); // Hitung jumlah histories
        } else {
            History::where('user_id', auth()->id())
                ->where('entity_id', $msme->id)
                ->where('entity_type', 'msme')
                ->delete();

            $msme->histories_count = $msme->histories()->count(); // Hitung ulang jumlah histories setelah penghapusan
        }

        $msme->save();
        return back();
    }

    public function admin()
    {
        $msme = Msme::all();
        return view('admin.msme.index', compact('msme'));
    }
}