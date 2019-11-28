<?php
/*
  * PHP IO FOR READING JSON DATA
  * Exercício de Desenvolvimento de Aplicação / CRUD SIMPLES USANDO JSON COMO UM 'DB'
  * Aluno: Natan Pires de Souza
  * Git: https://github.com/ztodev/
  */

  $file = file_get_contents('../db.json');
  $data = json_decode($file, true);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id     = $_POST['id'];
    $name   = $_POST['nome'];
    $email  = $_POST['email'];
    $ra     = $_POST['ra'];
    foreach($data['data'] as $key => $c)
    {
      if ($c['id'] == $id)
      {
        $data['data'][$key]['id']      = $id;
        $data['data'][$key]['nome']    = $name;
        $data['data'][$key]['email']   = $email;
        $data['data'][$key]['ra']      = $ra;
      }
    }

    file_put_contents('../db.json', json_encode($data));
    die('true');
  }

  return;