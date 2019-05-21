<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingrediente;

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
        $ingredientes = Ingrediente::all()->take(4);
        return view('home')->with('ingredientes', $ingredientes);
    }
}
