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
</head>

<body>
  <div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="brand-logo">
        <a href="login.html">
          <img src="{{asset('assets/vendors/images/deskapp-logo.svg')}}" alt="">
        </a>
      </div>
      <div class="login-menu">
        <ul>
          <li><a href="{{route('login')}}">Fazer login</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="{{asset('assets/vendors/images/forgot-password.png')}}" alt="">
        </div>
        <div class="col-md-6">
          <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
              <h2 class="text-center text-primary">Redefinir senha</h2>
            </div>
            <h6 class="mb-20">Preencha o campo abaixo com sua nova senha!</h6>
            <form>
              <div class="input-group custom">
                <input type="password" class="form-control form-control-lg" placeholder="Digite a nova senha">
                <div class="input-group-append custom">
                  <span class="input-group-text"><i class="dw dw-padlock1" aria-hidden="true"></i></span>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-12">
                  <div class="input-group mb-0">
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Redefinir">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- js -->
  <script src="{{asset('assets/vendors/scripts/core.js')}}"></script>
  <script src="{{asset('assets/vendors/scripts/script.min.js')}}"></script>
  <script src="{{asset('assets/vendors/scripts/process.js')}}"></script>
  <script src="{{asset('assets/vendors/scripts/layout-settings.js')}}"></script>
</body>

</html>