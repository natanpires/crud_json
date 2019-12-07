var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

var remover = (id) =>
{
  $.post( "/ajax/remover.php", { id: id })
  .done(function( data ) {
    if (data == 'true')
    {
      location.reload()
    }
  });
}

var editar = (id) =>
{
  let nome    = $(`#nome${id}`).val()
  let email   = $(`#email${id}`).val()
  let ra      = $(`#ra${id}`).val()
  let senha   = $(`#senha${id}`).val()
  if (email.match(emailRegex)) {
    $.post( "/ajax/editar.php", { id: id, nome: nome, email: email, ra: ra, senha: senha })
    .done(function( data ) {
      if (data == 'true')
      {
        location.reload()
      }
    });
  }
}

var insert = () =>
{
  let nome    = $(`#nome_new`).val()
  let email   = $(`#email_new`).val()
  let ra      = $(`#ra_new`).val()
  let senha   = $(`#senha_new`).val()
  if (email.match(emailRegex)) {
    $.post( "/ajax/inserir.php", { nome: nome, email: email, ra: ra, senha: senha })
    .done(function( data ) {
      if (data == 'true')
      {
        location.reload()
      }
    });
  }
}


$(function() {
  $('#ra_new').mask('#######-#')
  $('.ra').mask('#######-#')  
})