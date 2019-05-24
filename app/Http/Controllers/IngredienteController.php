<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingrediente;

class IngredienteController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientes = Ingrediente::paginate(5);
        return view('ingredientes.index')->with('ingredientes', $ingredientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'nombre' => 'required',
        'proveedor' => 'required'
      ]);
      
      $ingrediente = new Ingrediente;
      $ingrediente->nombre = $request->input('nombre');
      $ingrediente->proveedor = $request->input('proveedor');
      $ingrediente->save();
      
      return redirect('/ingredientes')->with('success', 'Ingrediente agredado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingrediente = Ingrediente::find($id);
        return view('ingredientes.edit')->with('ingrediente', $ingrediente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'nombre' => 'required',
        'proveedor' => 'required'
      ]);
      
      $ingrediente = Ingrediente::find($id);
      $ingrediente->nombre = $request->input('nombre');
      $ingrediente->proveedor = $request->input('proveedor');
      $ingrediente->save();
      
      return redirect('/ingredientes')->with('success', 'Ingrediente actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
