<?php

namespace App\Http\Controllers;

use App\Models\ImagemMoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagemMotoController extends Controller
{
    public $imagem;

    public function __construct(ImagemMoto $imagens){
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
        $img1 = $request->file('img1');
        if($img1){
            $urn1 = $img1->store('imagens', 'public');
        }else{
            $urn1 = null;
        }

        $img2 = $request->file('img2');
        if($img2){
            $urn2 = $img2->store('imagens', 'public');
        }else{
            $urn2 = null;
        }

        $img3 = $request->file('img3');
        if($img3){
            $urn3 = $img3->store('imagens', 'public');
        }else{
            $urn3 = null;
        }

        $response = $this->imagem->create([
            'img1' => $urn1,
            'img2' => $urn2,
            'img3' => $urn3
        ]);

        if($response == NULL){
            return response()->json(['erro' => 'Dados nao encontrados!'], 404);
        }


        return response()->json($request, 200);
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
            return response()->json(['erro' => 'Dados nao encontrados'], 404);
        }
        $img1 = $response->img1;
        $img2 = $response->img2;
        $img3 = $response->img3;

        $imagem1 = $request->file('img1');
        $imagem2 = $request->file('img2');
        $imagem3 = $request->file('img3');

        if($imagem1){
            Storage::disk('public')->delete($img1);
            $imagem_urn = $imagem1->store('imagens', 'public');
            $response->update([
                'img1' => $imagem_urn
            ]);
        }else{
            Storage::disk('public')->delete($img1);
            $imagem_urn = null;
            $response->update([
                'img1' => $imagem_urn
            ]);
        }

        if($imagem2){
            Storage::disk('public')->delete($img2);
            $imagem_urn = $imagem2->store('imagens', 'public');
            $response->update([
                'img2' => $imagem_urn
            ]);
        }else{
            Storage::disk('public')->delete($img2);
            $imagem_urn = null;
            $response->update([
                'img2' => $imagem_urn
            ]);
        }

        if($imagem3){
            Storage::disk('public')->delete($img3);
            $imagem_urn = $imagem3->store('imagens', 'public');
            $response->update([
                'img3' => $imagem_urn
            ]);
        }else{
            Storage::disk('public')->delete($img3);
            $imagem_urn = null;
            $response->update([
                'img3' => $imagem_urn
            ]);
        }
        return response()->json($response, 200);

    }
}
