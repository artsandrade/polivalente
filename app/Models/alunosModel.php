<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function alterar(){

    }

    public function cadastrar(){

    }

    public function remover(){
        
    }
}
