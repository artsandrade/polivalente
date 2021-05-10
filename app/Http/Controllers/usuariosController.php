<?php

namespace App\Http\Controllers;

use App\Models\usuariosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class usuariosController extends Controller
{
    public function alterar(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'id_usuario' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'situacao' => 'required',
            'tipo' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'Por favor, preencha os campos obrigatórios!'
            ]);
        } else {
            $usuario = new usuariosModel();
            $usuario->setId_usuario($request->id_usuario);
            $usuario->setNome($request->nome);
            $usuario->setEmail($request->email);
            !empty($request->senha) ? $usuario->setSenha(password_hash($request->senha, PASSWORD_DEFAULT)) : $usuario->setSenha(null);
            $usuario->setSituacao($request->situacao);
            $usuario->setTipo($request->tipo);
            $usuario->setFoto($_FILES['foto']);
            $usuario->alterar();
            return Response()->json([
                'status' => $usuario->getResposta_status(),
                'mensagem' => $usuario->getResposta_mensagem()
            ]);
        }
    }

    public function alterar_senha(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'id_usuario' => 'required',
            'senha_antiga' => 'required',
            'senha_nova' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'Por favor, preencha os campos obrigatórios!'
            ]);
        } else {
            $usuario = new usuariosModel();
            $usuario->setId_usuario($request->id_usuario);
            $usuario->setEmail($request->senha_antiga);
            $usuario->setSenha(password_hash($request->senha_nova, PASSWORD_DEFAULT));
            $usuario->alterar_senha();
            return Response()->json([
                'status' => $usuario->getResposta_status(),
                'mensagem' => $usuario->getResposta_mensagem()
            ]);
        }
    }

    public function cadastrar(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'situacao' => 'required',
            'tipo' => 'required',
            'foto' => 'required'
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'Por favor, preencha os campos obrigatórios!'
            ]);
        } else {
            $usuario = new usuariosModel();
            $usuario->setNome($request->nome);
            $usuario->setEmail($request->email);
            $usuario->setSenha(password_hash($request->senha, PASSWORD_DEFAULT));
            $usuario->setSituacao($request->situacao);
            $usuario->setTipo($request->tipo);
            $usuario->setFoto(file_get_contents($_FILES['foto']['tmp_name']));
            $usuario->cadastrar();
            return Response()->json([
                'status' => $usuario->getResposta_status(),
                'mensagem' => $usuario->getResposta_mensagem()
            ]);
        }
    }

    public function login(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'email' => 'required',
            'senha' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'Por favor, preencha os campos obrigatórios!'
            ]);
        } else {
            $usuario = new usuariosModel();
            $usuario->setEmail($request->email);
            $usuario->setSenha($request->senha);
            $usuario->login();
            return Response()->json([
                'status' => $usuario->getResposta_status(),
                'mensagem' => $usuario->getResposta_mensagem()
            ]);
        }
    }

    public function logout(Request $request)
    {
        if ($request->session()->exists('usuario_id')) {
            Session::flush();
            return redirect()->route('login');
        }
    }

    public function redefinir_senha1(Request $request){
        $validacao = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'Por favor, preencha os campos obrigatórios!'
            ]);
        } else {
            $usuario = new usuariosModel();
            $usuario->setEmail($request->email);
            $usuario->redefinir_senha1();
            return Response()->json([
                'status' => $usuario->getResposta_status(),
                'mensagem' => $usuario->getResposta_mensagem()
            ]);
        }
    }

    public function redefinir_senha2(Request $request){
        $validacao = Validator::make($request->all(), [
            'id_codigo' => 'required',
            'codigo' => 'required',
            'email' => 'required',
            'senha' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'Por favor, preencha os campos obrigatórios!'
            ]);
        } else {
            $usuario = new usuariosModel();
            $usuario->setId_usuario($request->id_codigo);
            $usuario->setNome($request->codigo);
            $usuario->setEmail($request->email);
            $usuario->setSenha($request->senha);
            $usuario->redefinir_senha2();
            return Response()->json([
                'status' => $usuario->getResposta_status(),
                'mensagem' => $usuario->getResposta_mensagem()
            ]);
        }
    }

    public function remover(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'id_usuario' => 'required',
        ]);
        if ($validacao->fails()) {
            return Response()->json([
                'status' => false,
                'mensagem' => 'É necessário selecionar um usuário para realizar tal ação!'
            ]);
        } else {
            $usuario = new usuariosModel();
            $usuario->setId_usuario($request->id_usuario);
            $usuario->remover();
            return Response()->json([
                'status' => $usuario->getResposta_status(),
                'mensagem' => $usuario->getResposta_mensagem()
            ]);
        }
    }
}
