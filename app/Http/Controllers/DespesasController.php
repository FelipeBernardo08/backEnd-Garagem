<?php

namespace App\Http\Controllers;

use App\Models\despesas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DespesasController extends Controller
{
    public $despesas;

    public function __construct(despesas $despesa)
    {
        $this->despesas = $despesa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->despesas->all();
        if ($response == null) {
            return response()->json(['Erro' => 'Dados não encontrados"'], 404);
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
        $response = $this->despesas->create($request->all());
        if ($response == null) {
            return response()->json(['Erro' => 'Dados não encontrados"'], 404);
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
        $response = $this->despesas->find($id);
        if ($response == null) {
            return response()->json(['Erro' => 'Dados não encontrados!'], 404);
        }
        return response()->json($response, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = $this->despesas->find($id);
        if ($response == null) {
            return response()->json(['Erro' => 'Dados não encontrados!'], 404);
        }
        $response->update($request->all());
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->despesas->find($id);
        if ($response == null) {
            return response()->json(['Erro' => 'Dados não encontrados!'], 404);
        }
        $response->delete();
        return response()->json(['MSG' => 'Dados excluidos com sucesso!'], 200);
    }
}
