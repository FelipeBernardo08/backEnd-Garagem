<?php

namespace App\Http\Controllers;

use App\Models\ContratoPreenchido;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContratoPreenchidoController extends Controller
{
    public $contratoPreenchido;

    public function __construct(ContratoPreenchido $contrato)
    {
        $this->contratoPreenchido = $contrato;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->contratoPreenchido->create($request->all());
        if ($response == null) {
            return response()->json(['erro' => 'Dados nao criados'], 404);
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
        $response = $this->contratoPreenchido->with('venda')->find($id);
        if ($response == null) {
            return response()->json(['erro' => 'Dados nao encontrados'], 404);
        }
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContratoPreenchido  $contratoPreenchido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContratoPreenchido $contratoPreenchido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContratoPreenchido  $contratoPreenchido
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContratoPreenchido $contratoPreenchido)
    {
        //
    }
}
