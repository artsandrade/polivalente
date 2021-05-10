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

    public function redefinir_senha1()
    {
        $validacao_email = DB::table('usuarios')->where('email', $this->getEmail())->count();
        if ($validacao_email > 0) {
            $codigo = mt_rand(9999999, 99999999);
            $url = "http://" . $_SERVER["HTTP_HOST"] . "/redefinir-senha?email=" . $this->getEmail() . "&codigo=" . $codigo;
            DB::table('usuarios_codigo')->insert([
                'email' => $this->getEmail(),
                'codigo' => $codigo
            ]);

            $headers = "MIME-Version: 1.1\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $headers .= "From: senha@poli.athur.dev.br\r\n"; // remetente
            $headers .= "Return-Path: senha@poli.athur.dev.br\r\n"; // return-path
            $text = "<html>
                                <head>
                                    <title>Redefinir senha</title>
                                </head>
                                <body>
                                    <h3>Olá!</h3>
                                    </br>
                                    <h3>Você solicitou uma redefinição de senha no site Gestão Polivalente.</h3>
                                    <h3>Clique <a href='$url'>aqui</a> para prosseguir! Assim, você será redirecionado ao site e criará uma nova senha para seu acesso ao painel.</h3>
                                    </div>
                                </body>
                            </html>";
            $envio = mail($this->getEmail(), "Redefinir senha - Gestão Polivalente", $text, $headers);

            if ($envio) {
                $this->setResposta_status(true);
                $this->setResposta_mensagem('Por favor, verifique se o link de redefinição de senha foi encaminhado para o e-mail solicitado! Caso não encontre na caixa de entrada, verifique a caixa de SPAM ou lixo eletrônico.');
            }
        } else {
            $this->setResposta_status(false);
            $this->setResposta_mensagem('Por favor, verifique se o e-mail digitado está correto!');
        }
    }

    public function redefinir_senha2()
    {
        $validacao_codigo = DB::table('usuarios_codigo')->where('id_codigo', $this->getId_usuario())->where('codigo', $this->getNome())->where('email', $this->getEmail())->count();
        if ($validacao_codigo > 0) {
            $codigo = DB::table('usuarios_codigo')->where('id_codigo', $this->getId_usuario())->where('codigo', $this->getNome())->where('email', $this->getEmail())->first();
            DB::table('usuarios')->where('email', $codigo->email)->update([
                'senha' => $this->getSenha()
            ]);
            DB::table('usuarios_codigo')->where('codigo', $this->getNome())->delete();
            $this->setResposta_status(true);
            $this->setResposta_mensagem('Senha alterada com sucesso! Sua autenticação deve ser realizada com a nova senha.');
        } else {
            $this->setResposta_status(false);
            $this->setResposta_mensagem('Desculpe, mas o código não é mais válido. Faça uma nova solicitação para redefinir a senha!');
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
