@extends('layout.base')

@section('titulo', 'Visualizar usuário')

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('inicio')}}">Início</a></li>
  <li class="breadcrumb-item"><a href="{{route('usuarios_get')}}">Usuários</a></li>
  <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
</ol>
@stop

@section('conteudo')
@foreach($dados_usuario as $usuario)
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
  <div class="row">
    <div class="col-md-9 col-sm-12">
      <div class="form-group">
        <label for="nome">Nome :</label>
        <input class="form-control" id="nome" name="nome" type="text" value="{{$usuario->nome}}" disabled>
      </div>
    </div>
    <div class="col-md-3 col-sm-12">
      <div class="form-group">
        <label for="tipo">Tipo do usuário :</label>
        <input class="form-control" id="tipo" name="tipo" type="text" value="{{$usuario->tipo==1?'Administrador':'Comum'}}" disabled>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <div class="form-group">
        <label for="email">E-mail :</label>
        <input class="form-control" id="email" name="email" type="email" value="{{$usuario->email}}" disabled>
      </div>
    </div>
    <div class="col-md-3 col-sm-12">
      <div class="form-group">
        <label for="situacao">Situação :</label>
        <input class="form-control" id="situacao" name="situacao" type="text" value="{{$usuario->situacao==1?'Ativo':'Inativo'}}" disabled>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <div class="form-group">
        <label for="foto">Foto :</label>
        <div class="profile-photo">
          <img src="data:image/jpeg;base64, {{base64_encode( $usuario->foto )}}" style="min-height: 160px; max-height:160px; min-width:160px;max-width:160px" alt="" class="avatar-photo">
        </div>
      </div>
    </div>
  </div>
  <div class="row text-right">
    <div class="col-sm-12">
      <div class="form-group">
        <a href="{{route('usuarios_get')}}" onclick="voltar()" class="btn btn-secondary">Voltar</a>
        <a type="button" href="{{route('usuarios_alterar_get')}}?id={{$usuario->id_usuario}}" class="btn btn-primary" id="btn-cadastrar">Alterar</a>
      </div>
    </div>
  </div>
</div>
@endforeach
@stop

@section('importacao_css')
@stop

@section('importacao_js')
@stop