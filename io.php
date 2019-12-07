<?php

class IO {
  public $filename = 'db.json';

  public function inserir($dados) 
  {
    $data = file_get_contents($this->filename);
    $data = json_decode($data,true);
    $id = 0;
    if ($data['data'])
    {
      foreach($data['data'] as $key => $c)
      {
        $id = $c['id'];
      }
    } else {
      $data['data'] = [];
    }    
    $dados['id'] = $id + 1;
    $dados['senha'] = md5($dados['senha']);
    array_push($data['data'], $dados);
    file_put_contents($this->filename, json_encode($data));
    return 'true';
  }

  public function editar($dados) 
  {
    $data = file_get_contents($this->filename);
    $data = json_decode($data,true);

    $id     = $dados['id'];
    $name   = $dados['nome'];
    $email  = $dados['email'];
    $senha  = $dados['senha'];
    $ra     = $dados['ra'];
    foreach($data['data'] as $key => $c)
    {
      if ($c['id'] == $id)
      {
        $data['data'][$key]['id']      = $id;
        $data['data'][$key]['nome']    = $name;
        $data['data'][$key]['email']   = $email;
        $data['data'][$key]['senha']   = $senha;
        $data['data'][$key]['ra']      = $ra;
      }
    }

    file_put_contents($this->filename, json_encode($data));
    return 'true';
  }

  public function remover($id) 
  {
    $data = file_get_contents($this->filename);
    $data = json_decode($data,true);

    foreach($data['data'] as $key => $c)
    {
      if ($c['id'] == $id)
      {
        unset($data['data'][$key]);
      } 
    }

    file_put_contents($this->filename, json_encode($data));
    return 'true';
  }
}