<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Plato;
use App\Ingrediente;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::paginate(5);
        return view('platos.index')->with('platos', $platos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('platos.create');
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
        'valor' => 'required'
      ]);
      
      $plato = new Plato;
      $plato->nombre = $request->input('nombre');
      $plato->valor = $request->input('valor');
      $plato->save();
      
      return redirect()->action(
        'PlatoController@show', ['codigo' => $plato->codigo]
      )->with('success', 'Plato agredado! Añádele los ingredientes que desees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $plato = Plato::find($id);
      $ingredientesAdded = $plato->ingredientes()->select('id', 'nombre', 'cantidad')->get();
      
      $ingredientes = Ingrediente::whereNotIn('codigo',function($q) use ($id) {
         $q->select('codingrediente')->from('plato_ingrediente')->where('codplato', $id);
      })->get();
      
      return view('platos.show')
                  ->with('plato', $plato)
                  ->with('ingredientes', $ingredientes)
                  ->with('ingredientesAdded', $ingredientesAdded);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
  
    public function relate(Request $request, $id)
    {
      $plato = Plato::find($id);
      if($request->cantidad != null){
        $plato->ingredientes()->attach($request->ingrediente, array('cantidad' => $request->cantidad));
      }
      return redirect()->action(
        'PlatoController@show', ['codigo' => $plato->codigo]
      )->with('success', 'Ingrediente agregado al plato con éxito.');
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
        'valor' => 'required'
      ]);

      $plato = Plato::find($id);

      $plato->nombre = $request->input('nombre');
      $plato->valor = $request->input('valor');
      $plato->save();

      if($request->ingsToDelete != null){
        $arr = explode(",",$request->ingsToDelete);
        foreach ($arr as $i){
          DB::delete('delete from plato_ingrediente where id = ?', [$i]);
        }
      }
      return redirect()->action(
        'PlatoController@show', ['codigo' => $plato->codigo]
      )->with('success', 'Plato actualizado con éxito.');
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
