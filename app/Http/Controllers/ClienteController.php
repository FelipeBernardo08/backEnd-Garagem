<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public $cliente;

    public function __construct(Cliente $clientes){
        $this->cliente = $clientes;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->cliente->all();
        if($response == NULL){
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
        $response = $this->cliente->create($request->all());
        if($response == NULL){
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
        $response = $this->cliente->find($id);
        if($response == NULL){
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
        $response = $this->cliente->find($id);
        if($response == NULL){
            return response()->json(['erro' => 'Dados não encontrados!'], 404);
        }
        $response->update($request->all());
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->cliente->find($id);
        if($response == NULL){
            return response()->json(['erro' => 'Dados não encontrados!'], 404);
        }
        $response->delete();
        return response()->json(['msg' => 'Dados excluidos com sucesso!'], 200);
    }
}
