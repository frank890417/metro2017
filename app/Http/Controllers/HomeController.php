<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Station;
use App;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        return view('welcome')
                ->with('stations',$stations);;
    }

    public function index_eng()
    {
        App::setLocale("en");
        $stations = Station::all();
        return view('welcome')
                ->with('stations',$stations);;
    }

    public function lang($lang,$name){
        App::setLocale($lang);
        return Lang::get($name);
    }
}
