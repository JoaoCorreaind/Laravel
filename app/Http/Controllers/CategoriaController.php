<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index(){
        return CategoriaModel::all();
    }
    
    public function byId($id){
        return CategoriaModel::find($id);
    }

    public function store(Request $req){
        
        $categoria = CategoriaModel::create($req->all());

        return response()->json(["message" => "sucesso ao criar categoria", 
                                 "categoria" =>"$categoria"],
                                200);

    }
    public function update(Request $req){
        $categoria = CategoriaModel::find($req->id_categoria);

        $categoria->update([
            'nome' => $req->nome
        ]);
        $categoria->save();

        if ($categoria->wasChanged()) {
            return response()->json(["message" => "sucesso ao alterar categoria", 
                                 "categoria" =>"$categoria"],
                                200);
        }else{
            return response()->json(["message" => "Erro ao alterar categoria", 
                                 ],
                                400);
        }
    }
    public function inative($id){
        $categoria = CategoriaModel::find($id);
        $categoria->isActive = 0;
        $categoria->save();

        if ($categoria->wasChanged()) {
            return response()->json(["message" => "sucesso ao inativar categoria", 
                                 "categoria" =>"$categoria"],
                                200);
        }else{
            return response()->json(["message" => "Erro ao inativar categoria", 
                                 ],
                                400);
        }

    }
    public function destroy(Request $req){
        CategoriaModel::destroy($req->id_categoria);
        
        return response('deu certo', 200);
    }
}
