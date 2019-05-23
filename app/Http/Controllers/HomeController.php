<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ingrediente;
use App\Plato;

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
        //$ingredientes = Plato::find(21)->ingredientes()->get();
        $ingredientes = Ingrediente::all()->take(4);
        $platos = Plato::all()->take(4);
        return view('home')
                  ->with('ingredientes', $ingredientes)
                  ->with('platos', $platos);
                  //->with('ingredientesPlato', $ingredientesPlato);
    }
}
