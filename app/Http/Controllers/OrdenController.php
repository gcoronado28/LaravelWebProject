<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Orden;
use App\Plato;

class OrdenController extends Controller
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
        return "";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ordenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 'nummesa' => 'required' ]);
        $numMesa = $request->input('nummesa');
        $mesas = Orden::where(['nummesa' => $numMesa, 'estado' => 'N'])->get();

        if(count($mesas) == 0){
          $orden = new Orden;
          $orden->fecha = date("Y-m-d");
          $orden->nummesa = $numMesa;
          $orden->estado = 'N';
          $orden->save();

          return redirect()->action(
            'OrdenController@show', ['numero' => $orden->numero]
          )->with('success', 'Orden abierta! Añádele los platos que desees.');
        }
        return redirect()->action(
          'OrdenController@create'
        )->with('error', 'Ya existe una órden abierta en la mesa '.$numMesa.'.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($orden = Orden::find($id)){
          $platosAdded = $orden->platos()->get();

          $platos = Plato::whereNotIn('codigo',function($q) use ($id) {
             $q->select('codplato')->from('orden_plato')->where('numorden', $id);
          })->get();

          $orden = Orden::find($id);
          return view('ordenes.show')
                 ->with('orden', $orden)
                 ->with('platos', $platos)
                 ->with('platosAdded', $platosAdded);
        }
        return abort(404);
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
      $orden = Orden::find($id);
      if($request->cantidad != null){
        $plato = Plato::find($request->plato);
        $valor = $request->cantidad * $plato->valor;
        $orden->platos()->attach($request->plato, array( 'cantidad' => $request->cantidad, 'valor' => $valor ));
      }
      return redirect()->action(
        'OrdenController@show', ['numero' => $orden->numero]
      )->with('success', 'Plato agregado a la órden con éxito.');
    }
  
  
    public function unrelate(Request $request)
    {
      $orden = Orden::find($request->input('orden'));
      $ordenPlato = $request->input('ordenPlato');
      if($ordenPlato != null){
        DB::delete('delete from orden_plato where id = ?', [$ordenPlato]);
      }
      return redirect()->action(
        'OrdenController@show', ['numero' => $orden->numero]
      )->with('success', 'Plato eliminado de la órden con éxito.');
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
        //
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
