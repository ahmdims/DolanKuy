<?php

namespace App\Http\Controllers;

use App\Models\Msme;
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
        $msme = Msme::where('slug', $slug)->firstOrFail();

        $apiKey = env('WEATHER_API_KEY');
        $url = "http://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$msme->city}&aqi=no";

        $client = new Client();
        try {
            $response = $client->get($url);
            $weatherData = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            $weatherData = null;
        }

        return view('app.msme.detail', compact('msme', 'weatherData'));
    }

    public function admin()
    {
        $msme = Msme::all();
        return view('admin.msme.index', compact('msme'));
    }
}