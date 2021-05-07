@extends('layout.base')

@section('titulo', 'Cadastrar aluno')

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('inicio')}}">Início</a></li>
  <li class="breadcrumb-item"><a href="{{route('alunos_get')}}">Alunos</a></li>
  <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
</ol>
@stop

@section('conteudo')
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
  <form action="javascript:void(0)" method="POST" id="form-cadastrar" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="url_form" name="url_form" value="{{route('alunos_cadastrar_post')}}">
    <h5>Dados pessoais</h5>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="nome">Nome : <b>*</b></label>
          <input type="text" id="nome" name="nome" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="codigo_simade">Código SIMADE : <b>*</b></label>
          <input type="text" id="codigo_simade" name="codigo_simade" onchange="document.getElementById('numero_arquivo').value=document.getElementById('codigo_simade').value" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="cpf">CPF :</label>
          <input type="text" id="cpf" name="cpf" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="data_nascimento">Data de nascimento : <b>*</b></label>
          <input type="date" id="data_nascimento" name="data_nascimento" class="form-control">
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
          <input type="text" id="rg" name="rg" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="estado_emissor">Estado emissor :</label>
          <select class="custom-select form-control" id="estado_emissor" name="estado_emissor">
            <option value="">-- Selecionar --</option>
            <option value="Acre">Acre</option>
            <option value="Alagoas">Alagoas</option>
            <option value="Amapá">Amapá</option>
            <option value="Amazonas">Amazonas</option>
            <option value="Bahia">Bahia</option>
            <option value="Ceará">Ceará</option>
            <option value="Distrito Federal">Distrito Federal</option>
            <option value="Espírito Santo">Espírito Santo</option>
            <option value="Goiás">Goiás</option>
            <option value="Maranhão">Maranhão</option>
            <option value="Mato Grosso">Mato Grosso</option>
            <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
            <option value="Minas Gerais">Minas Gerais</option>
            <option value="Pará">Pará</option>
            <option value="Paraíba">Paraíba</option>
            <option value="Paraná">Paraná</option>
            <option value="Pernambuco">Pernambuco</option>
            <option value="Piauí">Piauí</option>
            <option value="Rio de Janeiro">Rio de Janeiro</option>
            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
            <option value="Rondônia">Rondônia</option>
            <option value="Roraima">Roraima</option>
            <option value="Santa Catarina">Santa Catarina</option>
            <option value="São Paulo">São Paulo</option>
            <option value="Sergipe">Sergipe</option>
            <option value="Tocantins">Tocantins</option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="orgao_emissor">Órgão emissor :</label>
          <input type="text" id="orgao_emissor" name="orgao_emissor" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="data_expedicao">Data de expedição :</label>
          <input type="date" id="data_expedicao" name="data_expedicao" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="estado_nascimento">Estado de nascimento :</label>
          <select class="custom-select form-control" id="estado_nascimento" name="estado_nascimento">
            <option value="">-- Selecionar --</option>
            <option data-id="AC" value="Acre">Acre</option>
            <option data-id="AL" value="Alagoas">Alagoas</option>
            <option data-id="AP" value="Amapá">Amapá</option>
            <option data-id="AM" value="Amazonas">Amazonas</option>
            <option data-id="BA" value="Bahia">Bahia</option>
            <option data-id="CE" value="Ceará">Ceará</option>
            <option data-id="DF" value="Distrito Federal">Distrito Federal</option>
            <option data-id="ES" value="Espírito Santo">Espírito Santo</option>
            <option data-id="GO" value="Goiás">Goiás</option>
            <option data-id="MA" value="Maranhão">Maranhão</option>
            <option data-id="MT" value="Mato Grosso">Mato Grosso</option>
            <option data-id="MS" value="Mato Grosso do Sul">Mato Grosso do Sul</option>
            <option data-id="MG" value="Minas Gerais">Minas Gerais</option>
            <option data-id="PA" value="Pará">Pará</option>
            <option data-id="PB" value="Paraíba">Paraíba</option>
            <option data-id="PR" value="Paraná">Paraná</option>
            <option data-id="PE" value="Pernambuco">Pernambuco</option>
            <option data-id="PI" value="Piauí">Piauí</option>
            <option data-id="RJ" value="Rio de Janeiro">Rio de Janeiro</option>
            <option data-id="RN" value="Rio Grande do Norte">Rio Grande do Norte</option>
            <option data-id="RS" value="Rio Grande do Sul">Rio Grande do Sul</option>
            <option data-id="RO" value="Rondônia">Rondônia</option>
            <option data-id="RR" value="Roraima">Roraima</option>
            <option data-id="SC" value="Santa Catarina">Santa Catarina</option>
            <option data-id="SP" value="São Paulo">São Paulo</option>
            <option data-id="SE" value="Sergipe">Sergipe</option>
            <option data-id="TO" value="Tocantins">Tocantins</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="cidade_nascimento_opcoes">Cidade de nascimento :</label>
          <select class="custom-select form-control" id="cidade_nascimento_opcoes" readonly>
            <option value="">-- Selecionar --</option>
          </select>
          <input type="hidden" id="cidade_nascimento" name="cidade_nascimento">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="telefone">Telefone :</label>
          <input type="text" id="telefone" name="telefone" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="celular">Celular :</label>
          <input type="text" id="celular" name="celular" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="telefone_adicional">Telefone adicional :</label>
          <input type="text" id="telefone_adicional" name="telefone_adicional" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="email">E-mail :</label>
          <input type="email" id="email" name="email" class="form-control">
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
          <input type="text" id="numero_arquivo" name="numero_arquivo" class="form-control" readonly>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="armario">Armário : <b>*</b></label>
          <input type="text" id="armario" name="armario" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="gaveta">Gaveta : <b>*</b></label>
          <input type="text" id="gaveta" name="gaveta" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="observacoes">Observações :</label>
          <textarea class="form-control" id="observacoes" name="observacoes" cols="1" rows="5"></textarea>
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
          <input id="arquivos" name="arquivos[]" type="file" class="file" multiple>
        </div>
      </div>
    </div>
    <small class="form-text text-muted">É necessário que os campos com <b>*</b> sejam preenchidos!</small>
    <div class="row text-right">
      <div class="col-sm-12">
        <div class="form-group">
          <a href="{{route('alunos_get')}}" class="btn btn-secondary">Voltar</a>
          <button type="submit" class="btn btn-primary" id="btn-cadastrar">Cadastrar</button>
        </div>
      </div>
    </div>
  </form>
</div>
@stop

@section('importacao_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" integrity="sha512-A/XiYKl0I56Nxg43kogQlAnLUbGRVGcT3J2Ni9b73+blF89rmMJ6qL9iHhPR/vDOsjcylhEoiQfzHzGHS+K/lQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/themes/explorer-fa/theme.min.css" integrity="sha512-i77c8D4vLkvEhQeXQnxDnGNXxNwDfT/tkJW/N5uycy3955czX+LkOLuWCfud42f9GAaSEehPNgS3yc3sUcuRlA==" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/sweetalert2/sweetalert2.css')}}">
@stop

@section('importacao_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/fileinput.min.js" integrity="sha512-1FvXwt9wkKd29ilILHy0zei6ScE5vdEKqZ6BSW+gmM7mfqC4T4256OmUfFzl1FkaNS3FUQ/Kdzrrs8SD83bCZA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/locales/pt-BR.min.js" integrity="sha512-Cpx57sl+l6IQEV+QXTm2mOCSQW04rlH7Bid1PzoHvJw2rH1vwJgVDWIpOOzi7KhszYPFpK7GiXuOSg1EKDOjtA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/themes/explorer-fa/theme.min.js" integrity="sha512-GIar09IA3mug1lRQk9WNNf8k5Qee4zYPXlu70pj63kvYUAGitsRXJc3bUmUt/+57EBYgrHcTvI6MwMkLU0b48w==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
<script src="{{asset('assets/src/plugins/sweetalert2/sweetalert2.all.js')}}"></script>
<script src="{{asset('assets/js/alunos.js')}}" defer></script>
@stop