<?php

namespace App\Http\Controllers;

use App\Models\alunosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class alunosController extends Controller
{
    public function alterar(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'id_aluno' => 'required',
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
        } else {
            $aluno = new alunosModel();
            $aluno->setId_aluno($request->id_aluno);
            $aluno->setNome($request->nome);
            $aluno->setCodigo_simade($request->codigo_simade);
            $aluno->setCpf($request->cpf);
            $aluno->setData_nascimento($request->data_nascimento);
            $aluno->setSexo($request->sexo);
            $aluno->setRg($request->rg);
            $aluno->setEstado_emissor($request->estado_emissor);
            $aluno->setOrgao_emissor($request->orgao_emissor);
            $aluno->setData_expedicao($request->data_expedicao);
            $aluno->setEstado_nascimento($request->estado_nascimento);
            $aluno->setCidade_nascimento($request->cidade_nascimento);
            $aluno->setTelefone($request->telefone);
            $aluno->setCelular($request->celular);
            $aluno->setTelefone_adicional($request->telefone_adicional);
            $aluno->setEmail($request->email);
            $aluno->setNumero_arquivo($request->numero_arquivo);
            $aluno->setArmario($request->armario);
            $aluno->setGaveta($request->gaveta);
            $aluno->setObservacoes($request->observacoes);

            $aluno->setArquivo($_FILES['arquivos']);
            date_default_timezone_set('America/Sao_Paulo');
            $aluno->setData_modificacao(date('Y-m-d H:i:s'));
            $aluno->setUsuario_modificacao(session('usuario_id'));
            $aluno->alterar();
            return Response()->json([
                'status' => $aluno->getResposta_status(),
                'mensagem' => $aluno->getResposta_mensagem()
            ]);
        }
    }

    public function baixar_arquivo(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'caminho' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'É necessário selecionar um arquivo para realizar tal ação!'
            ]);
        } else {
            File::copy(storage_path('arquivos/' . $request->caminho), public_path('tmp/' . $request->caminho));
            return Response()->json([
                'status' => true,
                'mensagem' => 'O download do arquivo foi efetuado com sucesso!'
            ]);
        }
    }

    public function cadastrar(Request $request)
    {
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
        } else {
            $aluno = new alunosModel();
            $aluno->setNome($request->nome);
            $aluno->setCodigo_simade($request->codigo_simade);
            $aluno->setCpf($request->cpf);
            $aluno->setData_nascimento($request->data_nascimento);
            $aluno->setSexo($request->sexo);
            $aluno->setRg($request->rg);
            $aluno->setEstado_emissor($request->estado_emissor);
            $aluno->setOrgao_emissor($request->orgao_emissor);
            $aluno->setData_expedicao($request->data_expedicao);
            $aluno->setEstado_nascimento($request->estado_nascimento);
            $aluno->setCidade_nascimento($request->cidade_nascimento);
            $aluno->setTelefone($request->telefone);
            $aluno->setCelular($request->celular);
            $aluno->setTelefone_adicional($request->telefone_adicional);
            $aluno->setEmail($request->email);
            $aluno->setNumero_arquivo($request->numero_arquivo);
            $aluno->setArmario($request->armario);
            $aluno->setGaveta($request->gaveta);
            $aluno->setObservacoes($request->observacoes);

            $aluno->setArquivo($_FILES['arquivos']);
            date_default_timezone_set('America/Sao_Paulo');
            $aluno->setData_criacao(date('Y-m-d H:i:s'));
            $aluno->setUsuario_criacao(session('usuario_id'));
            $aluno->cadastrar();
            return Response()->json([
                'status' => $aluno->getResposta_status(),
                'mensagem' => $aluno->getResposta_mensagem()
            ]);
        }
    }

    public function remover(Request $request)
    {
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

    public function remover_arquivo(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'id_arquivo' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'É necessário selecionar um arquivo para realizar tal ação!'
            ]);
        } else {
            $aluno = new alunosModel();
            $aluno->setId_arquivo($request->id_arquivo);
            $aluno->remover_arquivo();
            return Response()->json([
                'status' => $aluno->getResposta_status(),
                'mensagem' => $aluno->getResposta_mensagem()
            ]);
        }
    }

    public function remover_arquivo2(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'caminho' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'É necessário selecionar um arquivo para realizar tal ação!'
            ]);
        } else {
            return Response()->download(public_path('tmp/' . $request->caminho))->deleteFileAfterSend();
        }
    }
}
