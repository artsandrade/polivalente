@extends('layout.base')

@section('titulo', 'Alterar aluno')

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('inicio')}}">Início</a></li>
  <li class="breadcrumb-item"><a href="{{route('alunos_get')}}">Alunos</a></li>
  <li class="breadcrumb-item active" aria-current="page">Alterar</li>
</ol>
@stop

@section('conteudo')
@foreach($dados_aluno as $aluno)
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
  <form action="javascript:void(0)" method="POST" id="form-alterar" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="id_aluno" name="id_aluno" value="{{$aluno->id_aluno}}">
    <input type="hidden" id="url_form" name="url_form" value="{{route('alunos_alterar_post')}}">
    <h5>Dados pessoais</h5>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="nome">Nome : <b>*</b></label>
          <input type="text" id="nome" name="nome" class="form-control" value="{{$aluno->nome}}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="codigo_simade">Código SIMADE : <b>*</b></label>
          <input type="text" id="codigo_simade" name="codigo_simade" onchange="document.getElementById('numero_arquivo').value=document.getElementById('codigo_simade').value" class="form-control" value="{{$aluno->codigo_simade}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="cpf">CPF :</label>
          <input type="text" id="cpf" name="cpf" class="form-control" value="{{$aluno->cpf}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="data_nascimento">Data de nascimento : <b>*</b></label>
          <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{$aluno->data_nascimento}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="sexo">Sexo :</label>
          <select class="custom-select form-control" id="sexo" name="sexo">
            <option value="">-- Selecionar --</option>
            <option value="feminino">Feminino</option>
            <option value="masculino">Masculino</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="rg">RG :</label>
          <input type="text" id="rg" name="rg" class="form-control" value="{{$aluno->rg}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="estado_emissor">Estado emissor :</label>
          <select class="custom-select form-control" id="estado_emissor" name="estado_emissor">
          <option value="">-- Selecionar --</option>
            <option data-id="AC" value="Acre" {{$aluno->estado_emissor=='Acre'?'selected':''}}>Acre</option>
            <option data-id="AL" value="Alagoas" {{$aluno->estado_emissor=='Alagoas'?'selected':''}}>Alagoas</option>
            <option data-id="AP" value="Amapá" {{$aluno->estado_emissor=='Amapá'?'selected':''}}>Amapá</option>
            <option data-id="AM" value="Amazonas" {{$aluno->estado_emissor=='Amazonas'?'selected':''}}>Amazonas</option>
            <option data-id="BA" value="Bahia" {{$aluno->estado_emissor=='Bahia'?'selected':''}}>Bahia</option>
            <option data-id="CE" value="Ceará" {{$aluno->estado_emissor=='Ceará'?'selected':''}}>Ceará</option>
            <option data-id="DF" value="Distrito Federal" {{$aluno->estado_emissor=='Distrito Federal'?'selected':''}}>Distrito Federal</option>
            <option data-id="ES" value="Espírito Santo" {{$aluno->estado_emissor=='Espírito Santo'?'selected':''}}>Espírito Santo</option>
            <option data-id="GO" value="Goiás" {{$aluno->estado_emissor=='Goiás'?'selected':''}}>Goiás</option>
            <option data-id="MA" value="Maranhão" {{$aluno->estado_emissor=='Maranhão'?'selected':''}}>Maranhão</option>
            <option data-id="MT" value="Mato Grosso" {{$aluno->estado_emissor=='Mato Grosso'?'selected':''}}>Mato Grosso</option>
            <option data-id="MS" value="Mato Grosso do Sul" {{$aluno->estado_emissor=='Mato Grosso do Sul'?'selected':''}}>Mato Grosso do Sul</option>
            <option data-id="MG" value="Minas Gerais" {{$aluno->estado_emissor=='Minas Gerais'?'selected':''}}>Minas Gerais</option>
            <option data-id="PA" value="Pará" {{$aluno->estado_emissor=='Pará'?'selected':''}}>Pará</option>
            <option data-id="PB" value="Paraíba" {{$aluno->estado_emissor=='Paraíba'?'selected':''}}>Paraíba</option>
            <option data-id="PR" value="Paraná" {{$aluno->estado_emissor=='Paraná'?'selected':''}}>Paraná</option>
            <option data-id="PE" value="Pernambuco" {{$aluno->estado_emissor=='Pernambuco'?'selected':''}}>Pernambuco</option>
            <option data-id="PI" value="Piauí" {{$aluno->estado_emissor=='Piauí'?'selected':''}}>Piauí</option>
            <option data-id="RJ" value="Rio de Janeiro" {{$aluno->estado_emissor=='Rio de Janeiro'?'selected':''}}>Rio de Janeiro</option>
            <option data-id="RN" value="Rio Grande do Norte" {{$aluno->estado_emissor=='Rio Grande do Norte'?'selected':''}}>Rio Grande do Norte</option>
            <option data-id="RS" value="Rio Grande do Sul" {{$aluno->estado_emissor=='Rio Grande do Sul'?'selected':''}}>Rio Grande do Sul</option>
            <option data-id="RO" value="Rondônia" {{$aluno->estado_emissor=='Rondônia'?'selected':''}}>Rondônia</option>
            <option data-id="RR" value="Roraima" {{$aluno->estado_emissor=='Roraima'?'selected':''}}>Roraima</option>
            <option data-id="SC" value="Santa Catarina" {{$aluno->estado_emissor=='Santa Catarina'?'selected':''}}>Santa Catarina</option>
            <option data-id="SP" value="São Paulo" {{$aluno->estado_emissor=='São Paulo'?'selected':''}}>São Paulo</option>
            <option data-id="SE" value="Sergipe" {{$aluno->estado_emissor=='Sergipe'?'selected':''}}>Sergipe</option>
            <option data-id="TO" value="Tocantins" {{$aluno->estado_emissor=='Tocantins'?'selected':''}}>Tocantins</option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="orgao_emissor">Órgão emissor :</label>
          <input type="text" id="orgao_emissor" name="orgao_emissor" class="form-control" value="{{$aluno->orgao_emissor}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="data_expedicao">Data de expedição :</label>
          <input type="date" id="data_expedicao" name="data_expedicao" class="form-control" value="{{$aluno->data_expedicao}}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="estado_nascimento">Estado de nascimento :</label>
          <select class="custom-select form-control" id="estado_nascimento" name="estado_nascimento">
            <option value="">-- Selecionar --</option>
            <option data-id="AC" value="Acre" {{$aluno->estado_nascimento=='Acre'?'selected':''}}>Acre</option>
            <option data-id="AL" value="Alagoas" {{$aluno->estado_nascimento=='Alagoas'?'selected':''}}>Alagoas</option>
            <option data-id="AP" value="Amapá" {{$aluno->estado_nascimento=='Amapá'?'selected':''}}>Amapá</option>
            <option data-id="AM" value="Amazonas" {{$aluno->estado_nascimento=='Amazonas'?'selected':''}}>Amazonas</option>
            <option data-id="BA" value="Bahia" {{$aluno->estado_nascimento=='Bahia'?'selected':''}}>Bahia</option>
            <option data-id="CE" value="Ceará" {{$aluno->estado_nascimento=='Ceará'?'selected':''}}>Ceará</option>
            <option data-id="DF" value="Distrito Federal" {{$aluno->estado_nascimento=='Distrito Federal'?'selected':''}}>Distrito Federal</option>
            <option data-id="ES" value="Espírito Santo" {{$aluno->estado_nascimento=='Espírito Santo'?'selected':''}}>Espírito Santo</option>
            <option data-id="GO" value="Goiás" {{$aluno->estado_nascimento=='Goiás'?'selected':''}}>Goiás</option>
            <option data-id="MA" value="Maranhão" {{$aluno->estado_nascimento=='Maranhão'?'selected':''}}>Maranhão</option>
            <option data-id="MT" value="Mato Grosso" {{$aluno->estado_nascimento=='Mato Grosso'?'selected':''}}>Mato Grosso</option>
            <option data-id="MS" value="Mato Grosso do Sul" {{$aluno->estado_nascimento=='Mato Grosso do Sul'?'selected':''}}>Mato Grosso do Sul</option>
            <option data-id="MG" value="Minas Gerais" {{$aluno->estado_nascimento=='Minas Gerais'?'selected':''}}>Minas Gerais</option>
            <option data-id="PA" value="Pará" {{$aluno->estado_nascimento=='Pará'?'selected':''}}>Pará</option>
            <option data-id="PB" value="Paraíba" {{$aluno->estado_nascimento=='Paraíba'?'selected':''}}>Paraíba</option>
            <option data-id="PR" value="Paraná" {{$aluno->estado_nascimento=='Paraná'?'selected':''}}>Paraná</option>
            <option data-id="PE" value="Pernambuco" {{$aluno->estado_nascimento=='Pernambuco'?'selected':''}}>Pernambuco</option>
            <option data-id="PI" value="Piauí" {{$aluno->estado_nascimento=='Piauí'?'selected':''}}>Piauí</option>
            <option data-id="RJ" value="Rio de Janeiro" {{$aluno->estado_nascimento=='Rio de Janeiro'?'selected':''}}>Rio de Janeiro</option>
            <option data-id="RN" value="Rio Grande do Norte" {{$aluno->estado_nascimento=='Rio Grande do Norte'?'selected':''}}>Rio Grande do Norte</option>
            <option data-id="RS" value="Rio Grande do Sul" {{$aluno->estado_nascimento=='Rio Grande do Sul'?'selected':''}}>Rio Grande do Sul</option>
            <option data-id="RO" value="Rondônia" {{$aluno->estado_nascimento=='Rondônia'?'selected':''}}>Rondônia</option>
            <option data-id="RR" value="Roraima" {{$aluno->estado_nascimento=='Roraima'?'selected':''}}>Roraima</option>
            <option data-id="SC" value="Santa Catarina" {{$aluno->estado_nascimento=='Santa Catarina'?'selected':''}}>Santa Catarina</option>
            <option data-id="SP" value="São Paulo" {{$aluno->estado_nascimento=='São Paulo'?'selected':''}}>São Paulo</option>
            <option data-id="SE" value="Sergipe" {{$aluno->estado_nascimento=='Sergipe'?'selected':''}}>Sergipe</option>
            <option data-id="TO" value="Tocantins" {{$aluno->estado_nascimento=='Tocantins'?'selected':''}}>Tocantins</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="cidade_nascimento_opcoes">Cidade de nascimento :</label>
          <select class="custom-select form-control" id="cidade_nascimento_opcoes" readonly>
            <option value="">-- Selecionar --</option>
          </select>
          <input type="hidden" id="cidade_nascimento" name="cidade_nascimento" value="{{$aluno->cidade_nascimento}}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="telefone">Telefone :</label>
          <input type="text" id="telefone" name="telefone" class="form-control" value="{{$aluno->telefone}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="celular">Celular :</label>
          <input type="text" id="celular" name="celular" class="form-control" value="{{$aluno->celular}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="telefone_adicional">Telefone adicional :</label>
          <input type="text" id="telefone_adicional" name="telefone_adicional" class="form-control" value="{{$aluno->telefone_adicional}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="email">E-mail :</label>
          <input type="email" id="email" name="email" class="form-control" value="{{$aluno->email}}">
        </div>
      </div>
    </div>
    <hr>
    <h5>Informações adicionais</h5>
    <br>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="numero_arquivo">Número do arquivo : <b>*</b></label>
          <input type="text" id="numero_arquivo" name="numero_arquivo" class="form-control" value="{{$aluno->numero_arquivo}}" readonly>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="armario">Armário : <b>*</b></label>
          <input type="text" id="armario" name="armario" class="form-control" value="{{$aluno->armario}}">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="gaveta">Gaveta : <b>*</b></label>
          <input type="text" id="gaveta" name="gaveta" class="form-control" value="{{$aluno->gaveta}}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="observacoes">Observações :</label>
          <textarea class="form-control" id="observacoes" name="observacoes" cols="1" rows="5">{{$aluno->observacoes}}</textarea>
        </div>
      </div>
    </div>
    <hr>
    <h5>Documentos</h5>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="arquivos">Insira os arquivos: </label>
          <input id="arquivos" name="arquivos[]" type="file" class="file" accept=".jpeg, .jpg, .gif, .png, .JPEG, .JPG, .GIF, .PNG" multiple>
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
    <small class="form-text text-muted">É necessário que os campos com <b>*</b> sejam preenchidos!</small>
    <div class="row text-right">
      <div class="col-sm-12">
        <div class="form-group">
          <a href="{{route('alunos_get')}}" class="btn btn-secondary">Voltar</a>
          <button type="submit" class="btn btn-primary" id="btn-alterar">Alterar</button>
        </div>
      </div>
    </div>
  </form>
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