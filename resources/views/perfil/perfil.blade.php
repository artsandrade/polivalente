@extends('layout.base')

@section('titulo', 'Perfil')

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('inicio')}}">Início</a></li>
  <li class="breadcrumb-item active" aria-current="page">Perfil</li>
</ol>
@stop

@section('conteudo')
<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
    <div class="pd-20 card-box height-100-p">
      <div class="profile-photo">
        <img src="data:image/jpeg;base64, {{base64_encode( session('usuario_foto') )}}" style="min-height: 160px; max-height:160px; min-width:160px;max-width:160px" alt="" class="avatar-photo">
      </div>
      <h5 class="text-center h5 mb-0">{{session('usuario_nome')}}</h5>
      <div class="profile-info">
        <h5 class="mb-20 h5 text-blue">Informações</h5>
        <ul>
          <li>
            <span>E-mail</span>
            {{session('usuario_email')}}
          </li>
          <li>
            <span>Tipo do usuário:</span>
            {{session('usuario_tipo')==1?'Administrador':'Comum'}}
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
      <h4 class="text-blue h5 mb-20">Alterar senha</h4>
      <form action="javascript:void(0)" method="POST" id="form-alterar">
        @csrf
        <input type="hidden" id="url_form" name="url_form" value="">
        <input type="hidden" id="id_usuario" name="id_usuario" value="{{session('usuario_id')}}">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Senha antiga</label>
              <input class="form-control form-control-lg" id="senha_antiga" name="senha_antiga" type="password">
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Nova senha</label>
              <input class="form-control form-control-lg" id="senha_nova" name="senha_nova" type="password">
            </div>
          </div>
        </div>
      </form>
      <div class="row text-right">
        <div class="col-sm-12">
          <div class="form-group">
            <button class="btn btn-primary" id="btn-alterar">Alterar senha</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('importacao_css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/sweetalert2/sweetalert2.css')}}">
@stop

@section('importacao_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
<script src="{{asset('assets/src/plugins/sweetalert2/sweetalert2.all.js')}}"></script>
<script src="{{asset('assets/js/perfil.js')}}" defer></script>
@stop