<?php
/*
  * PHP IO FOR READING JSON DATA
  * Exercício de Desenvolvimento de Aplicação / CRUD SIMPLES USANDO JSON COMO UM 'DB'
  * Aluno: Natan Pires de Souza
  * Git: https://github.com/ztodev/
  */

  $file = file_get_contents('db.json');
  $data = json_decode($file, true);
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <script src="./assets/js/jquery-3.4.1.min.js"></script>
    <script src="./assets/js/jquery.mask.min.js"></script>
    <script src="./assets/js/crud.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>CRUD - JSON</title>
  </head>
  <body>
    <div class="container">
      <div class="table_fields">
        <table>
          <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>RA</th>
            <th class="tb_options">Ações</th>
          </tr>
<?php foreach($data['data'] as $key => $c): ?>
          <tr>          
            <td>
              <input type="text" class="td-input" name="nome" id="nome<?=$c['id']?>" value="<?=$c['nome']?>" required/>
            </td>
           <td>
              <input type="text" class="td-input" name="email" id="email<?=$c['id']?>" value="<?=$c['email']?>" required/>
            </td>
            <td>
              <input type="text" class="td-input ra" maxlength="10" name="ra" id="ra<?=$c['id']?>" value="<?=$c['ra']?>" required/>
            </td>
            <td>
              <a href="javascript:editar(<?=$c['id']?>)">EDITAR</a>
              <a href="javascript:remover(<?=$c['id']?>)">REMOVER</a>
            </td>          
          </tr>
<?php endforeach; ?>          
        </table>    
      </div>
      <div class="form_fields">
        <h1>Inserir dados</h1>
        <form id="data_insert">
          <div class="input">
            <label for="nome_new">
              <span>Nome</span>
            </label>
            <input type="text" name="nome_new" id="nome_new" required/>
          </div>          
          <div class="input">
            <label for="email_new">
              <span>E-mail</span>
            </label>
            <input type="text" name="email_new" id="email_new" required/>
          </div>
          <div class="input">
            <label for="ra_new">
              <span>RA</span>
            </label>
            <input type="text" maxlength="10" name="ra_new" id="ra_new" required/>
          </div>
          <div class="input button">
            <a href="javascript:insert()" class="btn-submit" id="form_submit">SALVAR</a>
          </div>
        </form>
      </div>      
    </div>  
  </body>
</html>