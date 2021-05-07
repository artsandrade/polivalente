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

    $('#btn-alterar').html('Alterando...');
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
          $('#btn-alterar').html('Alterar');
        }
        else {
          swal(
            {
              type: 'error',
              title: 'Oops...',
              text: response.mensagem,
            }
          )
          $('#btn-alterar').html('Alterar');
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
        $('#btn-alterar').html('Alterar');
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

    $('#btn-cadastrar').html('Cadastrando...');
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
          $('#btn-cadastrar').html('Cadastrar');
        }
        else {
          swal(
            {
              type: 'error',
              title: 'Oops...',
              text: response.mensagem,
            }
          )
          $('#btn-cadastrar').html('Cadastrar');
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
        $('#btn-cadastrar').html('Cadastrar');
      }
    });

  });
});

//Remover usuário
function removerModal(id_usuario, nome) {
  document.getElementById('modal-remover').innerHTML = '\
  <div class="modal fade" id="modal-remover-confirmacao" tabindex="-1" role="dialog" aria-hidden="true">\
    <div class="modal-dialog modal-dialog-centered" role="document">\
      <div class="modal-content">\
        <div class="modal-body text-center font-18">\
          <h4 class="padding-top-30 mb-30 weight-500">Você tem certeza que deseja remover o usuário '+ nome + '?</h4>\
          <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">\
            <div class="col-6">\
              <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>\
              Não\
            </div>\
            <div class="col-6">\
              <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" onclick="remover(\''+ id_usuario + '\')"><i class="fa fa-check"></i></button>\
              Sim\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>\
  ';
  $('#modal-remover-confirmacao').modal({
    'show': true
  });
}

function remover(id_usuario) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var _token = document.getElementsByName('_token')[0].value;
  $.ajax({
    url: "/usuarios/remover",
    method: 'post',
    data: {
      '_token': _token,
      'id_usuario': id_usuario
    },
    success: function (response) {

      if (response.status === true) {
        window.location.href = '/usuarios';
      }
      else {
        swal(
          {
            type: 'error',
            title: 'Oops...',
            text: response.mensagem,
          }
        )
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
    }
  });
}