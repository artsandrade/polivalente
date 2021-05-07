$(document).ready(function () {
  $('#btn-alterar').click(function (e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#btn-alterar').html('Alterando senha...');
    var url_atual = document.getElementById('url_form').value;
    $.ajax({
      url: "" + url_atual + "",
      method: 'post',
      data: $('#form-alterar').serialize(),
      success: function (response) {

        if (response.status === true) {
          swal(
            {
              type: 'success',
              title: 'Sucesso!',
              text: response.mensagem,
            }
          )
          document.getElementById('form-alterar').reset();
          $('#btn-alterar').html('Alterar senha');
        }
        else {
          swal(
            {
              type: 'error',
              title: 'Oops...',
              text: response.mensagem,
            }
          )
          $('#btn-alterar').html('Alterar senha');
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
        $('#btn-alterar').html('Alterar senha');
      }
    });
  });
});