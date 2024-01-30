<?php

namespace App\Http\Controllers;

use App\Models\ImagemCarro;
use Illuminate\Suport\Facades\Storage;
use Illuminate\Http\Request;

class ImagemCarroController extends Controller
{
    public $imagem;

    public function __construct(ImagemCarro $imagens){
        $this->imagem = $imagens;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->imagem->all();
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
        $imagem1 = $request->file('img1');
        $imagem2 = $request->file('img2');
        $imagem3 = $request->file('img3');

        if($imagem1){
            $imagem1_urn = $imagem1->store('imagens', 'public');
            $response = $this->imagem->create([
                'img1' => $imagem1_urn
            ]);

        }else if($imagem2){
            $imagem2_urn = $imagem2->store('imagens', 'public');
            $response = $this->imagem->create([
                'img2' => $imagem2_urn
            ]);

        }else if($imagem3){
            $imagem3_urn = $imagem3->store('imagens', 'public');
            $response = $this->imagem->create([
                'img3' => $imagem3_urn
            ]);
        }
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
        $response = $this->imagem->find($id);
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
        $response = $this->imagem->find($id);
        if($response == NULL){
            return response()->json(['erro' => 'Dados não encontrados!'], 404);
        }
        $imagem1 = $request->file('img1');
        $imagem2 = $request->file('img2');
        $imagem3 = $request->file('img3');

        if($imagem1){
            Storage::disk('public')->delete($imagem->img1);
            $imagem1_urn = $imagem1->store('imagens', 'public');
            $response = $this->imagem->update([
                'img1' => $imagem1_urn
            ]);

        }else if($imagem2){
            Storage::disk('public')->delete($imagem->img2);
            $imagem2_urn = $imagem2->store('imagens', 'public');
            $response = $this->imagem->update([
                'img2' => $imagem2_urn
            ]);

        }else if($imagem3){
            Storage::disk('public')->delete($imagem->img3);
            $imagem3_urn = $imagem3->store('imagens', 'public');
            $response = $this->imagem->update([
                'img3' => $imagem3_urn
            ]);
        }

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->imagem->find($id);
        if($response == NULL){
            return response()->json(['erro' => 'Dados não encontrados!'], 404);
        }
        Storage::disk('public')->delete($imagem->img1);
        // Storage::disk('public')->delete($imagem->img2);
        // Storage::disk('public')->delete($imagem->img3);
        // $response->delete();
        return response()->json(['msg' => 'Dados excluidos com sucesso!'], 200);
    }
}
