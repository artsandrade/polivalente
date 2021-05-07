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