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
    $id = $_POST['id'];
    foreach($data['data'] as $key => $c)
    {
      if ($c['id'] == $id)
      {
        unset($data['data'][$key]);
      } 
    }

    file_put_contents('../db.json', json_encode($data));
    die('true');
  }

  return;