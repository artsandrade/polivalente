$(document).ready(function () {
  $('#btn-login').click(function (e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#btn-login').html('Entrando...');
    var url_atual = document.getElementById('url_form').value;
    $.ajax({
      url: "" + url_atual + "",
      method: 'post',
      data: $('#form-login').serialize(),
      success: function (response) {

        if (response.status === true) {
          window.location.href = '/';
          $('#btn-login').html('Cadastrar');
        }
        else {
          swal(
            {
              type: 'error',
              title: 'Oops...',
              text: response.mensagem,
            }
          )
          $('#btn-login').html('Cadastrar');
        }
      },
      error: function (response) {
        swal(
          {
            type: 'error',
            title: 'Oops...',
            text: response.responseJSON.message,
          }
        )
        $('#btn-login').html('Cadastrar');
      }
    });
  });
});

//Cadastrar usuário
$(document).ready(function (e) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#form-cadastrar').submit(function (e) {
    e.preventDefault();

    var form = new FormData(this);

    $('#btn-cadastrar').html('Solicitando...');
    var url_atual = document.getElementById('url_form').value;
    $.ajax({
      url: "" + url_atual + "",
      method: 'post',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {

        if (response.status === true) {
          swal(
            {
              type: 'success',
              title: 'Sucesso!',
              text: response.mensagem,
            }
          )
          document.getElementById('form-cadastrar').reset();
          $('#btn-cadastrar').html('Solicitar');
        }
        else {
          swal(
            {
              type: 'error',
              title: 'Oops...',
              text: response.mensagem,
            }
          )
          $('#btn-cadastrar').html('Solicitar');
        }
      },
      error: function (response) {
        swal(
          {
            type: 'error',
            title: 'Oops...',
            text: response.responseJSON.message,
          }
        )
        $('#btn-cadastrar').html('Solicitar');
      }
    });

  });
});

//Alterar usuário
$(document).ready(function (e) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#form-alterar').submit(function (e) {
    e.preventDefault();

    var form = new FormData(this);

    $('#btn-alterar').html('Redefinindo...');
    var url_atual = document.getElementById('url_form').value;
    $.ajax({
      url: "" + url_atual + "",
      method: 'post',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {

        if (response.status === true) {
          swal(
            {
              type: 'success',
              title: 'Sucesso!',
              text: response.mensagem,
            }
          )
          $('#btn-alterar').html('Redefinir');
        }
        else {
          swal(
            {
              type: 'error',
              title: 'Oops...',
              text: response.mensagem,
            }
          )
          $('#btn-alterar').html('Redefinir');
        }
      },
      error: function (response) {
        swal(
          {
            type: 'error',
            title: 'Oops...',
            text: response.responseJSON.message,
          }
        )
        $('#btn-alterar').html('Redefinir');
      }
    });

  });
});