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
    foreach($data['data'] as $key => $c)
    {
      $id = $c['id'];
    }
    $_POST['id'] = $id + 1;
    array_push($data['data'], $_POST);
    file_put_contents('../db.json', json_encode($data));
    die('true');
  }

  return;