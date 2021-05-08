<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8">
  <title>Gestão Polivalente</title>

  <!-- Site favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/vendors/images/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/vendors/images/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/vendors/images/favicon-16x16.png')}}">

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/styles/core.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/styles/icon-font.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/styles/style.css')}}">
  @yield('importacao_css')
</head>

<body>
  <div class="pre-loader">
    <div class="pre-loader-box">
      <div class="loader-logo"><img src="{{asset('assets/vendors/images/deskapp-logo.svg')}}" alt=""></div>
      <div class='loader-progress' id="progress_div">
        <div class='bar' id='bar1'></div>
      </div>
      <div class='percent' id='percent1'>0%</div>
      <div class="loading-text">
        Carregando
      </div>
    </div>
  </div>

  <div class="header">
    <div class="header-left">
      <div class="menu-icon dw dw-menu"></div>
      <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
    </div>
    <div class="header-right">
      <div class="user-info-dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <span class="user-icon">
              <img src="data:image/jpeg;base64, {{base64_encode( session('usuario_foto') )}}" style="min-height: 52px; max-height:52px; min-width:52px;max-width:52px" alt="">
            </span>
            <span class="user-name">{{session('usuario_nome')}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
            <a class="dropdown-item" href="{{route('perfil_get')}}"><i class="dw dw-user1"></i> Perfil</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirmation-modal"><i class="dw dw-logout"></i> Sair</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="left-side-bar">
    <div class="brand-logo">
      <a href="{{route('inicio')}}">
        <img src="{{asset('assets/vendors/images/deskapp-logo.svg')}}" alt="" class="dark-logo">
        <img src="{{asset('assets/vendors/images/deskapp-logo-white.svg')}}" alt="" class="light-logo">
      </a>
      <div class="close-sidebar" data-toggle="left-sidebar-close">
        <i class="ion-close-round"></i>
      </div>
    </div>
    <div class="menu-block customscroll">
      <div class="sidebar-menu">
        <ul id="accordion-menu">
          <li>
            <a href="{{route('inicio')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-house-1"></span><span class="mtext">Início</span>
            </a>
          </li>
          <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon dw dw-group"></span><span class="mtext">Alunos</span>
            </a>
            <ul class="submenu">
              <li><a href="{{route('alunos_cadastrar_get')}}">Cadastrar</a></li>
              <li><a href="{{route('alunos_get')}}">Visualizar</a></li>
            </ul>
          </li>
          @if(session('usuario_nome')=='1')
          <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon dw dw-user1"></span><span class="mtext">Usuários</span>
            </a>
            <ul class="submenu">
              <li><a href="{{route('usuarios_cadastrar_get')}}">Cadastrar</a></li>
              <li><a href="{{route('usuarios_get')}}">Visualizar</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
  <div class="mobile-menu-overlay"></div>

  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="title">
                <h4>@yield('titulo')</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                @yield('breadcrumb')
              </nav>
            </div>
          </div>
        </div>
        @yield('conteudo')
        <div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">Você tem certeza que deseja sair?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                  <div class="col-6">
                    <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    Não
                  </div>
                  <div class="col-6">
                    <a type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" href="{{route('logout_post')}}"><i class="fa fa-check"></i></a>
                    Sim
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-wrap pd-20 mb-20 card-box">
        Desenvolvido por <a href="http://www.arthur.dev.br" target="_blank">Arthur Souza Andrade</a>
      </div>
    </div>
  </div>
  <!-- js -->
  <script src="{{asset('assets/vendors/scripts/core.js')}}"></script>
  <script src="{{asset('assets/vendors/scripts/script.min.js')}}"></script>
  <script src="{{asset('assets/vendors/scripts/process.js')}}"></script>
  <script src="{{asset('assets/vendors/scripts/layout-settings.js')}}"></script>

  @yield('importacao_js')
</body>

</html>