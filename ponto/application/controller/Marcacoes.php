<?php
/**
 * Created by PhpStorm.
 * User: marcos.busana
 * Date: 26/06/14
 * Time: 10:48
 */

class Marcacoes {

  public function index()
  {
    $pessoasModel = $this->loadModel('PessoasModel');
    $arrPessoas = $pessoasModel->getAllPessoas();
    $arrMarcaoes = array();

    if($_POST['idPessoa']){
      $marcaoesModel = $this->loadModel('MarcacoesModel');
      $arrMarcaoes = $marcaoesModel->getMarcaoes($_POST['idPessoa'], $_POST['mes'], $_POST['ano']);
    }

    require 'application/views/_templates/header.php';
    require 'application/views/marcacoes/index.php';
    require 'application/views/_templates/footer.php';
  }


} 