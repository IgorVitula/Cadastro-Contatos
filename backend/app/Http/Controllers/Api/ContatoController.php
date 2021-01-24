<?php

namespace App\Http\Controllers\Api;

use App\Models\Contato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function __construct(Contato $contato){
        $this->contato = $contato;
    }

    public function index(){
        $contatos = $this->contato->all();
        return  response()->json($contatos);
    }

    public function show($id){
        $contato = $this->contato->find($id);
        return  response()->json($contato);
    }

    public function save(Request $request){

        $data = $request -> all();
        $contato = $this->contato->create($data);

        return response()->json($contato);
    }

    public function update(Request $request,$id){
        $data = $request->all();
        try{
            $contato = $this->contato->findOrFail($id);
            $contato->update($data);
            return response()->json(['data' =>['msg' => 'Atualizado'], 200]);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
    } 

    public function delete($id){
        try{
            $contato = $this->produto->findOrFail($id); //Encontrar ou não
            $contato->delete();
            return response()->json(['data' =>['msg' => 'Removido com sucesso'], 200]);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }}


}
