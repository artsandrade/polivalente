@extends('layout.base')

@section('titulo', 'Alunos')

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('inicio')}}">Início</a></li>
  <li class="breadcrumb-item active" aria-current="page">Alunos</li>
</ol>
@stop

@section('conteudo')
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
  <div class="pb-20">
    <table class="data-table table stripe hover nowrap">
      <thead>
        <tr>
          <th class="table-plus datatable-nosort">Nome</th>
          <th>E-mail</th>
          <th>Tipo do usuário</th>
          <th>Situação</th>
          <th class="datatable-nosort">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="table-plus">Gloria F. Mead</td>
          <td>25</td>
          <td>Sagittarius</td>
          <td>2829 Trainer Avenue Peoria, IL 61602 </td>
          <td>
            <div class="dropdown">
              <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> Visualizar</a>
                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Alterar</a>
                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Remover</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td class="table-plus">Andrea J. Cagle</td>
          <td>30</td>
          <td>Gemini</td>
          <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
          <td>
            <div class="dropdown">
              <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> Visualizar</a>
                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Alterar</a>
                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Remover</a>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@stop

@section('importacao_css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
@stop

@section('importacao_js')
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
@stop