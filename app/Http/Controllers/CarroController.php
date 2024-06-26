<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public $carro;

    public function __construct(Carro $carros)
    {
        //commit
        $this->carro = $carros;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->carro->with('fotos')->get();
        if ($response == NULL) {
            return response()->json(['erro' => 'Dados não encontrados!'], 404);
        }
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->carro->create($request->all());
        if ($response == NULL) {
            return response()->json(['erro' => 'Dados não encontrados!'], 404);
        }
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = $this->carro->with('fotos')->find($id);
        if ($response == NULL) {
            return response()->json(['erro' => 'Dados não encontrados!'], 404);
        }
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $response = $this->carro->find($id);
        if ($response == NULL) {
            return response()->json(['erro' => 'Dados não encontrados!'], 404);
        }
        $response->update($request->all());
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->carro->find($id);
        if ($response == NULL) {
            return response()->json(['erro' => 'Dados não encontrados!'], 404);
        }
        $response->delete();
        return response()->json(['msg' => 'Dados excluidos com sucesso!'], 200);
    }
}
