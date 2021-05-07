<?php

namespace App\Http\Controllers;

use App\Models\alunosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class alunosController extends Controller
{
    public function alterar(Request $request){

    }

    public function cadastrar(Request $request){
        $validacao = Validator::make($request->all(), [
            'nome' => 'required',
            'codigo_simade' => 'required',
            'data_nascimento' => 'required',
            'numero_arquivo' => 'required',
            'armario' => 'required',
            'gaveta' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'Por favor, preencha os campos obrigatórios!'
            ]);
        }
    }

    public function remover(Request $request){
        $validacao = Validator::make($request->all(), [
            'id_aluno' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'É necessário selecionar um aluno para realizar tal ação!'
            ]);
        } else {
            $aluno = new alunosModel();
            $aluno->setId_aluno($request->id_aluno);
            $aluno->remover();
            return Response()->json([
                'status' => $aluno->getResposta_status(),
                'mensagem' => $aluno->getResposta_mensagem()
            ]);
        }
    }
}
