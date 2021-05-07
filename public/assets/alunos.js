$("#arquivos").fileinput({
  'showUpload': false,
  'previewFileType': 'any',
  'language': 'pt-BR'
});

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