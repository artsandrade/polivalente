<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class alunosModel extends Model
{
    use HasFactory;
    private $id_aluno;
    private $nome;
    private $codigo_simade;
    private $cpf;
    private $data_nascimento;
    private $sexo;
    private $rg;
    private $estado_emissor;
    private $orgao_emissor;
    private $data_expedicao;
    private $estado_nascimento;
    private $cidade_nascimento;
    private $telefone;
    private $celular;
    private $telefone_adicional;
    private $email;
    private $numero_arquivo;
    private $armario;
    private $gaveta;
    private $observacoes;
    private $data_criacao;
    private $usuario_criacao;
    private $data_modificacao;
    private $usuario_modificacao;

    private $id_arquivo;
    private $aluno_id;
    private $caminho;
    private $arquivo;

    private $resposta_status;
    private $resposta_mensagem;

    public function getId_aluno()
    {
        return $this->id_aluno;
    }

    public function setId_aluno($id_aluno)
    {
        $this->id_aluno = $id_aluno;

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

    public function getCodigo_simade()
    {
        return $this->codigo_simade;
    }

    public function setCodigo_simade($codigo_simade)
    {
        $this->codigo_simade = $codigo_simade;

        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getData_nascimento()
    {
        return $this->data_nascimento;
    }

    public function setData_nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;

        return $this;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    public function getEstado_emissor()
    {
        return $this->estado_emissor;
    }

    public function setEstado_emissor($estado_emissor)
    {
        $this->estado_emissor = $estado_emissor;

        return $this;
    }

    public function getOrgao_emissor()
    {
        return $this->orgao_emissor;
    }

    public function setOrgao_emissor($orgao_emissor)
    {
        $this->orgao_emissor = $orgao_emissor;

        return $this;
    }

    public function getData_expedicao()
    {
        return $this->data_expedicao;
    }

    public function setData_expedicao($data_expedicao)
    {
        $this->data_expedicao = $data_expedicao;

        return $this;
    }

    public function getEstado_nascimento()
    {
        return $this->estado_nascimento;
    }

    public function setEstado_nascimento($estado_nascimento)
    {
        $this->estado_nascimento = $estado_nascimento;

        return $this;
    }

    public function getCidade_nascimento()
    {
        return $this->cidade_nascimento;
    }

    public function setCidade_nascimento($cidade_nascimento)
    {
        $this->cidade_nascimento = $cidade_nascimento;

        return $this;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    public function getTelefone_adicional()
    {
        return $this->telefone_adicional;
    }

    public function setTelefone_adicional($telefone_adicional)
    {
        $this->telefone_adicional = $telefone_adicional;

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

    public function getNumero_arquivo()
    {
        return $this->numero_arquivo;
    }

    public function setNumero_arquivo($numero_arquivo)
    {
        $this->numero_arquivo = $numero_arquivo;

        return $this;
    }

    public function getArmario()
    {
        return $this->armario;
    }

    public function setArmario($armario)
    {
        $this->armario = $armario;

        return $this;
    }

    public function getGaveta()
    {
        return $this->gaveta;
    }

    public function setGaveta($gaveta)
    {
        $this->gaveta = $gaveta;

        return $this;
    }

    public function getObservacoes()
    {
        return $this->observacoes;
    }

    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;

        return $this;
    }

    public function getData_criacao()
    {
        return $this->data_criacao;
    }

    public function setData_criacao($data_criacao)
    {
        $this->data_criacao = $data_criacao;

        return $this;
    }

    public function getUsuario_criacao()
    {
        return $this->usuario_criacao;
    }

    public function setUsuario_criacao($usuario_criacao)
    {
        $this->usuario_criacao = $usuario_criacao;

        return $this;
    }

    public function getData_modificacao()
    {
        return $this->data_modificacao;
    }

    public function setData_modificacao($data_modificacao)
    {
        $this->data_modificacao = $data_modificacao;

        return $this;
    }

    public function getUsuario_modificacao()
    {
        return $this->usuario_modificacao;
    }

    public function setUsuario_modificacao($usuario_modificacao)
    {
        $this->usuario_modificacao = $usuario_modificacao;

        return $this;
    }

    public function getId_arquivo()
    {
        return $this->id_arquivo;
    }

    public function setId_arquivo($id_arquivo)
    {
        $this->id_arquivo = $id_arquivo;

        return $this;
    }

    public function getAluno_id()
    {
        return $this->aluno_id;
    }

    public function setAluno_id($aluno_id)
    {
        $this->aluno_id = $aluno_id;

        return $this;
    }

    public function getCaminho()
    {
        return $this->caminho;
    }

    public function setCaminho($caminho)
    {
        $this->caminho = $caminho;

        return $this;
    }

    public function getArquivo()
    {
        return $this->arquivo;
    }

    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;

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
        $validacao_simade = DB::table('alunos')->where('codigo_simade', $this->getCodigo_simade());
        if ($validacao_simade->get()->contains('id_aluno', $this->getId_aluno()) || $validacao_simade->count() <= 0) {
            DB::table('alunos')->where('id_aluno', $this->getId_aluno())->update([
                'nome' => $this->getNome(),
                'codigo_simade' => $this->getCodigo_simade(),
                'cpf' => $this->getCpf(),
                'data_nascimento' => $this->getData_nascimento(),
                'sexo' => $this->getSexo(),
                'rg' => $this->getRg(),
                'estado_emissor' => $this->getEstado_emissor(),
                'orgao_emissor' => $this->getOrgao_emissor(),
                'data_expedicao' => $this->getData_expedicao(),
                'estado_nascimento' => $this->getEstado_nascimento(),
                'cidade_nascimento' => $this->getCidade_nascimento(),
                'telefone' => $this->getTelefone(),
                'celular' => $this->getCelular(),
                'telefone_adicional' => $this->getTelefone_adicional(),
                'email' => $this->getEmail(),
                'numero_arquivo' => $this->getNumero_arquivo(),
                'armario' => $this->getArmario(),
                'gaveta' => $this->getGaveta(),
                'observacoes' => $this->getObservacoes(),
                'data_modificacao' => $this->getData_modificacao(),
                'usuario_modificacao' => $this->getUsuario_modificacao(),
            ]);

            if ($this->getArquivo()['error'][0] != 4) {
                foreach ($this->getArquivo()['tmp_name'] as $key => $imagem) {
                    $diretorio = storage_path('arquivos/');
                    $ext = pathinfo($this->getArquivo()['name'][$key], PATHINFO_EXTENSION);
                    $nome = date('d_m_Y_H_i_s') . $key . '.' . $ext;
                    $arquivo = $diretorio . $nome;
                    DB::table('alunos_arquivos')->insert([
                        'aluno_id' => $this->getId_aluno(),
                        'caminho' => $nome,
                        'data_criacao' => $this->getData_modificacao(),
                        'usuario_criacao' => $this->getUsuario_modificacao(),
                    ]);
                    move_uploaded_file($this->getArquivo()['tmp_name'][$key], $arquivo);
                }
            }
            $this->setResposta_status(true);
            if ($this->getSexo() == 'masculino') {
                $this->setResposta_mensagem('Aluno alterado com sucesso!');
            } elseif ($this->getSexo() == 'feminino') {
                $this->setResposta_mensagem('Aluna alterada com sucesso!');
            } else {
                $this->setResposta_mensagem('Aluno(a) alterado(a) com sucesso!');
            }
        } else {
            $this->setResposta_status(false);
            $this->setResposta_mensagem('Desculpe, mas já existe um aluno(a) com o código SIMADE: ' . $this->getCodigo_simade() . ' cadastrado!');
        }
    }

    public function cadastrar()
    {
        $validacao_simade = DB::table('alunos')->where('codigo_simade', $this->getCodigo_simade())->count();
        if ($validacao_simade <= 0) {
            $this->setAluno_id(DB::table('alunos')->insertGetId([
                'nome' => $this->getNome(),
                'codigo_simade' => $this->getCodigo_simade(),
                'cpf' => $this->getCpf(),
                'data_nascimento' => $this->getData_nascimento(),
                'sexo' => $this->getSexo(),
                'rg' => $this->getRg(),
                'estado_emissor' => $this->getEstado_emissor(),
                'orgao_emissor' => $this->getOrgao_emissor(),
                'data_expedicao' => $this->getData_expedicao(),
                'estado_nascimento' => $this->getEstado_nascimento(),
                'cidade_nascimento' => $this->getCidade_nascimento(),
                'telefone' => $this->getTelefone(),
                'celular' => $this->getCelular(),
                'telefone_adicional' => $this->getTelefone_adicional(),
                'email' => $this->getEmail(),
                'numero_arquivo' => $this->getNumero_arquivo(),
                'armario' => $this->getArmario(),
                'gaveta' => $this->getGaveta(),
                'observacoes' => $this->getObservacoes(),
                'data_criacao' => $this->getData_criacao(),
                'usuario_criacao' => $this->getUsuario_criacao(),
            ]));

            if ($this->getArquivo()['error'][0] != 4) {
                foreach ($this->getArquivo()['tmp_name'] as $key => $imagem) {
                    $diretorio = storage_path('arquivos/');
                    $ext = pathinfo($this->getArquivo()['name'][$key], PATHINFO_EXTENSION);
                    $nome = date('d_m_Y_H_i_s') . $key . $ext;
                    $arquivo = $diretorio . $nome;
                    DB::table('alunos_arquivos')->insert([
                        'aluno_id' => $this->getAluno_id(),
                        'caminho' => $nome,
                        'data_criacao' => $this->getData_criacao(),
                        'usuario_criacao' => $this->getUsuario_criacao(),
                    ]);
                    move_uploaded_file($this->getArquivo()['tmp_name'][$key], $arquivo);
                }
            }
            $this->setResposta_status(true);
            if ($this->getSexo() == 'masculino') {
                $this->setResposta_mensagem('Aluno cadastrado com sucesso!');
            } elseif ($this->getSexo() == 'feminino') {
                $this->setResposta_mensagem('Aluna cadastrada com sucesso!');
            } else {
                $this->setResposta_mensagem('Aluno(a) cadastrado(a) com sucesso!');
            }
        } else {
            $this->setResposta_status(false);
            $this->setResposta_mensagem('Desculpe, mas já existe um aluno(a) com o código SIMADE: ' . $this->getCodigo_simade() . ' cadastrado!');
        }
    }

    public function remover()
    {
        $arquivos = DB::table('alunos_arquivos')->where('aluno_id', $this->getId_aluno());
        if ($arquivos->count() > 0) {
            foreach ($arquivos->get() as $arquivo) {
                unlink(storage_path('arquivos/' . $arquivo->caminho));
                DB::table('alunos_arquivos')->where('id_arquivo', $arquivo->id_arquivo)->delete();
            }
        }
        DB::table('alunos')->where('id_aluno', $this->getId_aluno())->delete();
        $this->setResposta_status(true);
        $this->setResposta_mensagem('Aluno(a) removido(a) com sucesso!');
    }

    public function remover_arquivo()
    {
        DB::table('alunos_arquivos')->where('id_arquivo', $this->getId_arquivo())->delete();
        unlink(storage_path('arquivos/' . $this->getCaminho()));
        $this->setResposta_status(true);
        $this->setResposta_mensagem('Arquivo removido com sucesso!');
    }
}
