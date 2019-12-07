<?php
/*
  * PHP IO FOR READING JSON DATA
  * Exercício de Desenvolvimento de Aplicação / CRUD SIMPLES USANDO JSON COMO UM 'DB'
  * Aluno: Natan Pires de Souza
  * Git: https://github.com/ztodev/crud_json
  */

  include_once('../io.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $io = new IO();
    $io->editar($_POST);
    die('true');
  }

  return;