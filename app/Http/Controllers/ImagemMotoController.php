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
        $response = $this->imagem::latest('created_at')->first();
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

        $img4 = $request->file('img4');
        if($img4){
            $urn4 = $img4->store('imagens', 'public');
        }else{
            $urn4 = null;
        }

        $img5 = $request->file('img5');
        if($img5){
            $urn5 = $img5->store('imagens', 'public');
        }else{
            $urn5 = null;
        }

        $img6 = $request->file('img6');
        if($img6){
            $urn6 = $img6->store('imagens', 'public');
        }else{
            $urn6 = null;
        }

        $img7 = $request->file('img7');
        if($img7){
            $urn7 = $img7->store('imagens', 'public');
        }else{
            $urn7 = null;
        }

        $img8 = $request->file('img8');
        if($img8){
            $urn8 = $img8->store('imagens', 'public');
        }else{
            $urn8 = null;
        }

        $response = $this->imagem->create([
            'img1' => $urn1,
            'img2' => $urn2,
            'img3' => $urn3,
            'img4' => $urn4,
            'img5' => $urn5,
            'img6' => $urn6,
            'img7' => $urn7,
            'img8' => $urn8
        ]);

        if($response == NULL){
            return response()->json(['erro' => 'Dados nao encontrados!'], 404);
        }


        return response()->json($request, 200);
    }

    public function updateImgMoto(Request $request, $id){
        $response = $this->imagem->find($id);
        if($response == NULL){
            return response()->json(['erro' => 'Dados nao encontrados'], 404);
        }

        $img1 = $response->img1;
        $img2 = $response->img2;
        $img3 = $response->img3;
        $img4 = $response->img4;
        $img5 = $response->img5;
        $img6 = $response->img6;
        $img7 = $response->img7;
        $img8 = $response->img8;

        $imagem1 = $request->file('img1');
        $imagem2 = $request->file('img2');
        $imagem3 = $request->file('img3');
        $imagem4 = $request->file('img4');
        $imagem5 = $request->file('img5');
        $imagem6 = $request->file('img6');
        $imagem7 = $request->file('img7');
        $imagem8 = $request->file('img8');

        if($imagem1 != null){
            Storage::disk('public')->delete($img1);
            $imagem_urn = $imagem1->store('imagens', 'public');
            $response->update([
                'img1' => $imagem_urn
            ]);
        }


        if($imagem2 != null){
            Storage::disk('public')->delete($img2);
            $imagem_urn = $imagem2->store('imagens', 'public');
            $response->update([
                'img2' => $imagem_urn
            ]);
        }

        if($imagem3 != null){
            Storage::disk('public')->delete($img3);
            $imagem_urn = $imagem3->store('imagens', 'public');
            $response->update([
                'img3' => $imagem_urn
            ]);
        }
        
        if($imagem4 != null){
            Storage::disk('public')->delete($img4);
            $imagem_urn = $imagem4->store('imagens', 'public');
            $response->update([
                'img4' => $imagem_urn
            ]);
        }

        if($imagem5 != null){
            Storage::disk('public')->delete($img5);
            $imagem_urn = $imagem5->store('imagens', 'public');
            $response->update([
                'img5' => $imagem_urn
            ]);
        }

        if($imagem6 != null){
            Storage::disk('public')->delete($img6);
            $imagem_urn = $imagem6->store('imagens', 'public');
            $response->update([
                'img6' => $imagem_urn
            ]);
        }

        if($imagem7 != null){
            Storage::disk('public')->delete($img7);
            $imagem_urn = $imagem7->store('imagens', 'public');
            $response->update([
                'img7' => $imagem_urn
            ]);
        }

        if($imagem8 != null){
            Storage::disk('public')->delete($img8);
            $imagem_urn = $imagem8->store('imagens', 'public');
            $response->update([
                'img8' => $imagem_urn
            ]);
        }

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
        $response = $this->imagem->find($id);
        if($response == NULL){
            return response()->json(['erro' => 'Dados nao encontrados'], 404);
        }

        $response->delete();
        return response()->json(['msg' => 'Dados excluidos com sucesso!'], 200);
    }

    public function apagarImg(Request $request, $id){
        $response = $this->imagem->find($id);
        if($response == NULL){
            return response()->json(['erro' => 'Dados nao encontrados'], 404);
        }

        $img1 = $response->img1;
        $img2 = $response->img2;
        $img3 = $response->img3;
        $img4 = $response->img4;
        $img5 = $response->img5;
        $img6 = $response->img6;
        $img7 = $response->img7;
        $img8 = $response->img8;

        $imagem1 = $request->file('img1');
        $imagem2 = $request->file('img2');
        $imagem3 = $request->file('img3');
        $imagem4 = $request->file('img4');
        $imagem5 = $request->file('img5');
        $imagem6 = $request->file('img6');
        $imagem7 = $request->file('img7');
        $imagem8 = $request->file('img8');

        if($imagem1 == null){
            Storage::disk('public')->delete($img1);
            $imagem_urn = null;
            $response->update([
                'img1' => $imagem_urn
            ]);
        }


        if($imagem2 == null){
            Storage::disk('public')->delete($img2);
            $imagem_urn = null;
            $response->update([
                'img2' => $imagem_urn
            ]);
        }

        if($imagem3 == null){
            Storage::disk('public')->delete($img3);
            $imagem_urn = null;
            $response->update([
                'img3' => $imagem_urn
            ]);
        }
        
        if($imagem4 == null){
            Storage::disk('public')->delete($img4);
            $imagem_urn = null;
            $response->update([
                'img4' => $imagem_urn
            ]);
        }

        if($imagem5 == null){
            Storage::disk('public')->delete($img5);
            $imagem_urn = null;
            $response->update([
                'img5' => $imagem_urn
            ]);
        }

        if($imagem6 == null){
            Storage::disk('public')->delete($img6);
            $imagem_urn = null;
            $response->update([
                'img6' => $imagem_urn
            ]);
        }

        if($imagem7 == null){
            Storage::disk('public')->delete($img7);
            $imagem_urn = null;
            $response->update([
                'img7' => $imagem_urn
            ]);
        }

        if($imagem8 == null){
            Storage::disk('public')->delete($img8);
            $imagem_urn = null;
            $response->update([
                'img8' => $imagem_urn
            ]);
        }

        return response()->json($response, 200);
    }   
}
