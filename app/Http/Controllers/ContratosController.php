<?php

namespace App\Http\Controllers;

use App\Models\contratos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContratosController extends Controller
{
    public $contrato;

    public function __construct(contratos $contratos)
    {
        $this->contrato = $contratos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->contrato->all();
        if ($response == null) {
            return response()->json(['Erro' => 'Dados não encontrados'], 404);
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
        $response = $this->contrato->create($request->all());
        if ($response == null) {
            return response()->json(['Erro' => 'Dados não cadastrados'], 404);
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
        $response = $this->contrato->find($id);
        if ($response == null) {
            return response()->json(['Erro' => 'Dados não encontrados'], 404);
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
        $response = $this->contrato->find($id);
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
        $response = $this->contrato->find($id);
        if ($response == NULL) {
            return response()->json(['erro' => 'Dados não encontrados!'], 404);
        }
        $response->delete();
        return response()->json(['msg' => 'Dados excluidos com sucesso!'], 200);
    }
}
