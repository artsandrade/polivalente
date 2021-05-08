@extends('layout.base')

@section('titulo')
Olá {{session('usuario_nome')}}, seja bem-vindo!
@stop

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('inicio')}}">Início</a></li>
</ol>
@stop

@section('conteudo')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
    <div class="card-box pd-30 height-100-p">
      <div class="progress-box text-center">
        <h1 class="text-black padding-top-10 h1">{{$alunos}}</h1>
        <h5 class="text-blue padding-top-10 h5">Alunos</h5>
      </div>
    </div>
  </div>
  @if(session('usuario_tipo')=='1')
  <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
    <div class="card-box pd-30 height-100-p">
      <div class="progress-box text-center">
        <h1 class="text-black padding-top-10 h1">{{$usuarios}}</h1>
        <h5 class="text-blue padding-top-10 h5">Usuários</h5>
      </div>
    </div>
  </div>
  @endif
</div>
@stop

@section('importacao_css')
@stop

@section('importacao_js')
@stop