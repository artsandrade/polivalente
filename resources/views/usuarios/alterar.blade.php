@extends('layout.base')

@section('titulo', 'Alterar usuário')

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('inicio')}}">Início</a></li>
  <li class="breadcrumb-item"><a href="{{route('usuarios_get')}}">Usuários</a></li>
  <li class="breadcrumb-item active" aria-current="page">Alterar</li>
</ol>
@stop

@section('conteudo')
@foreach($dados_usuario as $usuario)
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
  <form action="javascript:void(0)" method="POST" id="form-alterar" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="id_usuario" name="id_usuario" value="{{$usuario->id_usuario}}">
    <input type="hidden" id="url_form" name="url_form" value="{{route('usuarios_alterar_post')}}">
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <div class="form-group">
          <label for="nome">Nome :</label>
          <input class="form-control" id="nome" name="nome" type="text" value="{{$usuario->nome}}">
        </div>
      </div>
      <div class="col-md-3 col-sm-12">
        <div class="form-group">
          <label for="tipo">Tipo do usuário :</label>
          <select class="form-control" id="tipo" name="tipo">
            <option value="1" {{$usuario->tipo==1?'selected':''}}>Administrador</option>
            <option value="2" {{$usuario->tipo==2?'selected':''}}>Comum</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="form-group">
          <label for="email">E-mail :</label>
          <input class="form-control" id="email" name="email" type="email" value="{{$usuario->email}}">
        </div>
      </div>
      <div class="col-md-3 col-sm-12">
        <div class="form-group">
          <label for="senha">Senha :</label>
          <input class="form-control" id="senha" name="senha" type="password">
        </div>
      </div>
      <div class="col-md-3 col-sm-12">
        <div class="form-group">
          <label for="situacao">Situação :</label>
          <select class="form-control" id="situacao" name="situacao">
            <option value="1" {{$usuario->situacao==1?'selected':''}}>Ativo</option>
            <option value="2" {{$usuario->situacao==2?'selected':''}}>Inativo</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <label for="foto">Foto :</label>
          <div class="row">
            <div class="col-sm-3">
              <div class="profile-photo">
                <img src="data:image/jpeg;base64, {{base64_encode( $usuario->foto )}}" style="min-height: 160px; max-height:160px; min-width:160px;max-width:160px" alt="" class="avatar-photo">
              </div>
            </div>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="foto" name="foto">
            <label class="custom-file-label">Escolher uma foto</label>
          </div>
        </div>
      </div>
    </div>
    <div class="row text-right">
      <div class="col-sm-12">
        <div class="form-group">
          <a href="{{route('usuarios_get')}}" class="btn btn-secondary">Voltar</a>
          <button type="submit" class="btn btn-primary" id="btn-alterar">Alterar</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endforeach
@stop

@section('importacao_css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/sweetalert2/sweetalert2.css')}}">
@stop

@section('importacao_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
<script src="{{asset('assets/src/plugins/sweetalert2/sweetalert2.all.js')}}"></script>
<script src="{{asset('assets/js/usuarios.js')}}" defer></script>
@stop