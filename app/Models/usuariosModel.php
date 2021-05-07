<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class usuariosModel extends Model
{
    use HasFactory;
    private $id_usuario;
    private $nome;
    private $email;
    private $senha;
    private $tipo;
    private $foto;
    private $situacao;
    private $resposta_status;
    private $resposta_mensagem;

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

        return $this;
    }

    public function getResposta_status()
    {
        return $this->resposta_status;
    }

    public function setResposta_status($resposta_status)
    {
        $this->resposta_status = $resposta_status;

        return $this;
    }

    public function getResposta_mensagem()
    {
        return $this->resposta_mensagem;
    }

    public function setResposta_mensagem($resposta_mensagem)
    {
        $this->resposta_mensagem = $resposta_mensagem;

        return $this;
    }

    public function alterar()
    {
        $validacao_email = DB::table('usuarios')->where('email', $this->getEmail());
        if ($validacao_email->get()->contains('id_usuario', $this->getId_usuario()) || $validacao_email->count() == 0) {
            DB::table('usuarios')->where('id_usuario', $this->getId_usuario())->update([
                'nome' => $this->getNome(),
                'email' => $this->getEmail(),
                'tipo' => $this->getTipo(),
                'situacao' => $this->getSituacao(),
            ]);
            if ($this->getFoto()['error'] != 4) {
                DB::table('usuarios')->where('id_usuario', $this->getId_usuario())->update([
                    'foto' => file_get_contents($this->getFoto()['tmp_name']),
                ]);
            }
            if ($this->getSenha() != null) {
                DB::table('usuarios')->where('id_usuario', $this->getId_usuario())->update([
                    'senha' => $this->getSenha(),
                ]);
            }
            $this->setResposta_status(true);
            $this->setResposta_mensagem('Usuário alterado com sucesso!');
        } else {
            $this->setResposta_status(false);
            $this->setResposta_mensagem('Desculpe, mas já existe um usuário cadastrado com esse e-mail!');
        }
    }

    public function alterar_senha()
    {
        $valida_senha = DB::table('usuarios')->where('id_usuario', $this->getId_usuario())->first();
        if (password_verify($this->getEmail(), $valida_senha->senha)) {
            DB::table('usuarios')->where('id_usuario', $this->getId_usuario())->update([
                'senha' => $this->getSenha(),
            ]);
            $this->setResposta_status(true);
            $this->setResposta_mensagem('Senha alterada com sucesso!');
        } else {
            $this->setResposta_status(false);
            $this->setResposta_mensagem('Verifique se a senha antiga foi digitada corretamente!');
        }
    }

    public function cadastrar()
    {
        $validacao_email = DB::table('usuarios')->where('email', $this->getEmail())->count();
        if ($validacao_email <= 0) {
            DB::table('usuarios')->insert([
                'nome' => $this->getNome(),
                'email' => $this->getEmail(),
                'senha' => $this->getSenha(),
                'tipo' => $this->getTipo(),
                'foto' => $this->getFoto(),
                'situacao' => $this->getSituacao(),
            ]);
            $this->setResposta_status(true);
            $this->setResposta_mensagem('Usuário cadastrado com sucesso!');
        } else {
            $this->setResposta_status(false);
            $this->setResposta_mensagem('Desculpe, mas já existe um usuário cadastrado com esse e-mail!');
        }
    }

    public function login()
    {
        $email = DB::table('usuarios')->where('email', '=', $this->getEmail())->count();
        if ($email > 0) {
            $usuario = DB::table('usuarios')->where('email', '=', $this->getEmail())->first();
            if (password_verify($this->getSenha(), $usuario->senha)) {
                if ($usuario->situacao == '1') {
                    session([
                        'usuario_id' => $usuario->id_usuario,
                        'usuario_nome' => $usuario->nome,
                        'usuario_email' => $usuario->email,
                        'usuario_tipo' => $usuario->tipo,
                        'usuario_foto' => $usuario->foto,
                        'usuario_situacao' => $usuario->situacao,
                    ]);
                    $this->setResposta_status(true);
                } else {
                    $this->setResposta_status(false);
                    $this->setResposta_mensagem('Por favor, verifique com o administrador a liberação do seu acesso ao sistema!');
                }
            } else {
                $this->setResposta_status(false);
                $this->setResposta_mensagem('Por favor, verifique se o e-mail e/ou senha digitados estão corretos!');
            }
        } else {
            $this->setResposta_status(false);
            $this->setResposta_mensagem('Por favor, verifique se o e-mail e/ou senha digitados estão corretos!');
        }
    }

    public function remover()
    {
        $validacao_usuario = DB::table('alunos')->where('usuario_criacao', $this->getId_usuario())->orWhere('usuario_modificacao', $this->getId_usuario())->count();
        if ($validacao_usuario <= 0) {
            DB::table('usuarios')->where('id_usuario', $this->getId_usuario())->delete();
            $this->setResposta_status(true);
            $this->setResposta_mensagem('Usuário removido com sucesso!');
        } else {
            $this->setResposta_status(false);
            $this->setResposta_mensagem('Desculpe, mas não é possível concluir a exclusão. Existem cadastros vinculados ao usuário que deseja excluir!');
        }
    }
}
