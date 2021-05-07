@extends('layout.base')

@section('titulo', 'Visualizar aluno')

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('inicio')}}">Início</a></li>
  <li class="breadcrumb-item"><a href="{{route('alunos_get')}}">Alunos</a></li>
  <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
</ol>
@stop

@section('conteudo')
@foreach($dados_aluno as $aluno)
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
  <h5>Dados pessoais</h5>
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="nome">Nome :</label>
        <input type="text" id="nome" name="nome" class="form-control" value="{{$aluno->nome}}" disabled>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label for="codigo_simade">Código SIMADE :</label>
        <input type="text" id="codigo_simade" name="codigo_simade" class="form-control" value="{{$aluno->codigo_simade}}" disabled>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="cpf">CPF :</label>
        <input type="text" id="cpf" name="cpf" class="form-control" value="{{$aluno->cpf}}" disabled>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="data_nascimento">Data de nascimento :</label>
        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{$aluno->data_nascimento}}" disabled>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="sexo">Sexo :</label>
        <select class="custom-select form-control" id="sexo" name="sexo" disabled>
          <option value="" {{$aluno->sexo==''?'selected':''}}>-- Selecionar --</option>
          <option value="feminino" {{$aluno->sexo=='feminino'?'selected':''}}>Feminino</option>
          <option value="masculino" {{$aluno->sexo=='masculino'?'selected':''}}>Masculino</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label for="rg">RG :</label>
        <input type="text" id="rg" name="rg" class="form-control" value="{{$aluno->rg}}" disabled>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="estado_emissor">Estado emissor :</label>
        <select class="custom-select form-control" id="estado_emissor" name="estado_emissor" disabled>
          <option value="" {{$aluno->estado_emissor==''?'selected':''}}>-- Selecionar --</option>
          <option value="{{$aluno->estado_emissor}}" {{$aluno->estado_emissor!=''?'selected':''}}>{{$aluno->estado_emissor}}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="orgao_emissor">Órgão emissor :</label>
        <input type="text" id="orgao_emissor" name="orgao_emissor" class="form-control" value="{{$aluno->orgao_emissor}}" disabled>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="data_expedicao">Data de expedição :</label>
        <input type="date" id="data_expedicao" name="data_expedicao" class="form-control" value="{{$aluno->data_expedicao}}" disabled>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="estado_nascimento">Estado de nascimento :</label>
        <select class="custom-select form-control" id="estado_nascimento" name="estado_nascimento" disabled>
          <option value="" {{$aluno->estado_nascimento==''?'selected':''}}>-- Selecionar --</option>
          <option value="{{$aluno->estado_nascimento}}" {{$aluno->estado_nascimento!=''?'selected':''}}>{{$aluno->estado_nascimento}}</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="cidade_nascimento_opcoes">Cidade de nascimento :</label>
        <select class="custom-select form-control" id="cidade_nascimento_opcoes" disabled>
          <option value="" {{$aluno->cidade_nascimento==''?'selected':''}}>-- Selecionar --</option>
          <option value="{{$aluno->cidade_nascimento}}" {{$aluno->cidade_nascimento!=''?'selected':''}}>{{$aluno->cidade_nascimento}}</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label for="telefone">Telefone :</label>
        <input type="text" id="telefone" name="telefone" class="form-control" value="{{$aluno->telefone}}" disabled>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="celular">Celular :</label>
        <input type="text" id="celular" name="celular" class="form-control" value="{{$aluno->celular}}" disabled>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="telefone_adicional">Telefone adicional :</label>
        <input type="text" id="telefone_adicional" name="telefone_adicional" class="form-control" value="{{$aluno->telefone_adicional}}" disabled>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" class="form-control" value="{{$aluno->email}}" disabled>
      </div>
    </div>
  </div>
  <hr>
  <h5>Informações adicionais</h5>
  <br>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="numero_arquivo">Número do arquivo :</label>
        <input type="text" id="numero_arquivo" name="numero_arquivo" class="form-control" value="{{$aluno->numero_arquivo}}" disabled>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="armario">Armário :</label>
        <input type="text" id="armario" name="armario" class="form-control" value="{{$aluno->armario}}" disabled>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="gaveta">Gaveta :</label>
        <input type="text" id="gaveta" name="gaveta" class="form-control" value="{{$aluno->gaveta}}" disabled>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="observacoes">Observações :</label>
        <textarea class="form-control" id="observacoes" name="observacoes" cols="1" rows="5" disabled>{{$aluno->observacoes}}</textarea>
      </div>
    </div>
  </div>
  <hr>
  <h5>Documentos cadastrados</h5>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table class="data-table table stripe hover nowrap">
        <thead>
          <tr>
            <th class="table-plus">Arquivo</th>
            <th>Data inserção</th>
            <th>Inserido por</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($arquivos_aluno as $arquivo)
          <tr id="{{$arquivo->caminho}}">
            <td class="table-plus">{{$arquivo->caminho}}</td>
            <td>{{date('d/m/Y H:i:s', strtotime($arquivo->data_criacao))}}</td>
            @foreach($usuarios as $usuario)
            @if($usuario->id_usuario==$arquivo->usuario_criacao)
            <td>{{$usuario->nome}}</td>
            @endif
            @endforeach
            <td>
              <div class="dropdown">
                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                  <i class="dw dw-more"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                  <a class="dropdown-item" href="#" onclick="baixarArquivo('{{$arquivo->caminho}}')"><i class="dw dw-download"></i> Baixar</a>
                  <a class="dropdown-item" href="#" onclick="removerArquivoModal('{{$arquivo->id_arquivo}}', '{{$arquivo->caminho}}')"><i class="dw dw-delete-3"></i> Remover</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="row text-right">
    <div class="col-sm-12">
      <div class="form-group">
        <a href="{{route('alunos_get')}}" onclick="voltar()" class="btn btn-secondary">Voltar</a>
        <a type="button" href="{{route('alunos_alterar_get')}}?id={{$aluno->id_aluno}}" class="btn btn-primary" id="btn-cadastrar">Alterar</a>
      </div>
    </div>
  </div>
</div>
@endforeach
@stop

@section('importacao_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" integrity="sha512-A/XiYKl0I56Nxg43kogQlAnLUbGRVGcT3J2Ni9b73+blF89rmMJ6qL9iHhPR/vDOsjcylhEoiQfzHzGHS+K/lQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/themes/explorer-fa/theme.min.css" integrity="sha512-i77c8D4vLkvEhQeXQnxDnGNXxNwDfT/tkJW/N5uycy3955czX+LkOLuWCfud42f9GAaSEehPNgS3yc3sUcuRlA==" crossorigin="anonymous" />

<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/sweetalert2/sweetalert2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
@stop

@section('importacao_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/fileinput.min.js" integrity="sha512-1FvXwt9wkKd29ilILHy0zei6ScE5vdEKqZ6BSW+gmM7mfqC4T4256OmUfFzl1FkaNS3FUQ/Kdzrrs8SD83bCZA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/locales/pt-BR.min.js" integrity="sha512-Cpx57sl+l6IQEV+QXTm2mOCSQW04rlH7Bid1PzoHvJw2rH1vwJgVDWIpOOzi7KhszYPFpK7GiXuOSg1EKDOjtA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/themes/explorer-fa/theme.min.js" integrity="sha512-GIar09IA3mug1lRQk9WNNf8k5Qee4zYPXlu70pj63kvYUAGitsRXJc3bUmUt/+57EBYgrHcTvI6MwMkLU0b48w==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>

<script src="{{asset('assets/src/plugins/sweetalert2/sweetalert2.all.js')}}"></script>

<script src="{{asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
<!-- buttons for Export datatable -->
<script src="{{asset('assets/src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/datatables/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/datatables/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/datatables/js/vfs_fonts.js')}}"></script>
<!-- Datatable Setting js -->
<script src="{{asset('assets/vendors/scripts/datatable-setting.js')}}"></script>

<script src="{{asset('assets/js/alunos.js')}}" defer></script>
@stop