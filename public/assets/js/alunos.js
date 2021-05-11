if (document.getElementById('arquivos')) {
  $("#arquivos").fileinput({
    'showUpload': false,
    'previewFileType': 'any',
    'language': 'pt-BR'
  });
}

if (document.getElementById('cpf')) {
  var $cpf = $("#cpf");
  $cpf.mask('000.000.000-00');

  var $telefone = $("#telefone");
  $telefone.mask('(00) 0000-0000');

  var $celular = $("#celular");
  $celular.mask('(00) 00000-0000');

  var $telefone_adicional = $("#telefone_adicional");
  $telefone_adicional.mask('(00) 0000-0000');
}

/* Preenchimento da lista de cidade (naturalidade) com base na UF (API IBGE) */
$("select[name='estado_nascimento']").change(function () {
  if ($(this).val()) {
    $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + $(this).find("option:selected").attr('data-id') + '/municipios', {
      id: $(this).find("option:selected").attr('data-id')
    }, function (json) {
      var options = '<option value="">-– Selecionar -–</option>';
      for (var i = 0; i < json.length; i++) {
        options += '<option data-value="' + json[i].nome + '" value="' + json[i].nome + '" >' + json[i].nome + '</option>';
      }
      $("select[id='cidade_nascimento_opcoes']").html(options);
    });
    document.getElementById('cidade_nascimento_opcoes').removeAttribute('readonly');
  } else {
    $("select[id='cidade_nascimento_opcoes']").html('<option value="">-– Selecionar -–</option>');
    document.getElementById('cidade_nascimento_opcoes').setAttribute('readonly', true);
  }
});

if (document.getElementById('estado_nascimento') && document.getElementById('cidade_nascimento')) {
  var estado = document.getElementById('estado_nascimento');
  var opt_estado = estado.value;
  var opt_cidade = document.getElementById('cidade_nascimento').value;
  if (opt_estado != '') {
    $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + $('#estado_nascimento').find("option:selected").attr('data-id') + '/municipios', {
      id: $('#estado_nascimento').find("option:selected").attr('data-id')
    }, function (json) {
      var options = '<option value="">-– Selecionar -–</option>';
      for (var i = 0; i < json.length; i++) {
        options += '<option data-value="' + json[i].nome + '" value="' + json[i].nome + '" >' + json[i].nome + '</option>';
      }
      $("select[id='cidade_nascimento_opcoes']").html(options);
      document.getElementById('cidade_nascimento_opcoes').value = opt_cidade;
      console.log(opt_cidade)
    });
    document.getElementById('cidade_nascimento_opcoes').removeAttribute('readonly');
  } else {
    $("select[id='cidade_nascimento_opcoes']").html('<option value="">-– Selecionar -–</option>');
    document.getElementById('cidade_nascimento_opcoes').setAttribute('readonly', true);
  }
}

$(document).ready(function () {
  var table = $('#tabela').DataTable();
});

//Alterar aluno
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
          window.location.reload();
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

//Cadastrar aluno
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

//Remover aluno
function removerModal(id_aluno, nome) {
  document.getElementById('modal-remover').innerHTML = '\
  <div class="modal fade" id="modal-remover-confirmacao" tabindex="-1" role="dialog" aria-hidden="true">\
    <div class="modal-dialog modal-dialog-centered" role="document">\
      <div class="modal-content">\
        <div class="modal-body text-center font-18">\
          <h4 class="padding-top-30 mb-30 weight-500">Você tem certeza que deseja remover o(a) aluno(a) '+ nome + '?</h4>\
          <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">\
            <div class="col-6">\
              <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>\
              Não\
            </div>\
            <div class="col-6">\
              <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" onclick="remover(\''+ id_aluno + '\')"><i class="fa fa-check"></i></button>\
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

function remover(id_aluno) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var _token = document.getElementsByName('_token')[0].value;
  $.ajax({
    url: "/alunos/remover",
    method: 'post',
    data: {
      '_token': _token,
      'id_aluno': id_aluno
    },
    success: function (response) {

      if (response.status === true) {
        window.location.href = '/alunos';
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

//Remover arquivo do aluno
function removerArquivoModal(id_arquivo, caminho) {
  document.getElementById('modal-remover').innerHTML = '\
  <div class="modal fade" id="modal-remover-arquivo-confirmacao" tabindex="-1" role="dialog" aria-hidden="true">\
    <div class="modal-dialog modal-dialog-centered" role="document">\
      <div class="modal-content">\
        <div class="modal-body text-center font-18">\
          <h4 class="padding-top-30 mb-30 weight-500">Você tem certeza que deseja remover o arquivo '+ caminho + '?</h4>\
          <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">\
            <div class="col-6">\
              <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>\
              Não\
            </div>\
            <div class="col-6">\
              <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" onclick="removerArquivo(\''+ id_arquivo + '\', \'' + caminho + '\')"><i class="fa fa-check"></i></button>\
              Sim\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>\
  ';
  $('#modal-remover-arquivo-confirmacao').modal({
    'show': true
  });
}

function removerArquivo(id_arquivo, caminho) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var _token = document.getElementsByName('_token')[0].value;
  $.ajax({
    url: "/alunos/remover_arquivo",
    method: 'post',
    data: {
      '_token': _token,
      'id_arquivo': id_arquivo,
      'caminho': caminho,
    },
    success: function (response) {

      if (response.status === true) {
        var linha = document.getElementById(caminho);
        var datatable = document.getElementById('tabela');
        datatable.rows[caminho].remove();
        $('#modal-remover-arquivo-confirmacao').modal(
          'hide'
        );
        var url = window.location.pathname;
        var id = window.location.search;
        window.location.href = url + id + '#tabela'
        swal(
          {
            type: 'success',
            title: 'Sucesso!',
            text: 'Arquivo removido com sucesso!',
          }
        )

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