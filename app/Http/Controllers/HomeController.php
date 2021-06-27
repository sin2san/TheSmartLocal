<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = new Client();
        $url = "https://api.github.com/gists/public";

        $response = $client->request('GET', $url);

        $responseBody = (array) json_decode($response->getBody());
        return view('home', compact('responseBody'));
    }

    public function userGists($login)
    {
        $userName = $login;
        $client = new Client();
        $url = "https://api.github.com/users/".$login."/gists";

        $response = $client->request('GET', $url);

        $responseBody = (array) json_decode($response->getBody());
        return view('home', compact('responseBody', 'userName'));
    }

    public function favourite(){
        return view('favourite');
    }
}
