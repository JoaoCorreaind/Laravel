<?php

namespace App\Http\Controllers;

use App\Models\ProdutoModel;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        return ProdutoModel::with('categoria');
    }

    public function byId($id){
        return ProdutoModel::find($id);
    }

    public function store(Request $req){
        $produto = ProdutoModel::create($req->all());

        return response()->json(['message' => 'sucesso ao criar produto', 
                                'produto' => "$produto", 
                                'codigo' => "200"], 
                                200);
    }
    public function update(Request $req){
        $produto = ProdutoModel::find($req->id_produto);
        $produto->update($req->all());

        if ($produto->wasChanged()) {
            return response()->json(["message" => "sucesso ao inativar produto", 
                                 "produto" =>"$produto"],
                                200);
        }else{
            return response()->json(["message" => "Erro ao inativar produto", 
                                 ],
                                400);
        }
    }

    public function inative($id){
        $produto = ProdutoModel::find($id);
        $produto->isActive = 0;
        $produto->save();

        if ($produto->wasChanged()) {
            return response()->json(["message" => "sucesso ao inativar produto", 
                                 "categoria" =>"$produto"],
                                200);
        }else{
            return response()->json(["message" => "Erro ao inativar produto", 
                                 ],
                                400);
        }

    }
    public function destroy(Request $req){
        ProdutoModel::destroy($req->id_produto);
        
        return response('deu certo', 200);
    }
}
