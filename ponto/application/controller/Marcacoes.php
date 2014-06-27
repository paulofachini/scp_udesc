<?php
/**
 * Created by PhpStorm.
 * User: marcos.busana
 * Date: 26/06/14
 * Time: 10:48
 */
class Marcacoes extends Controller
{

    public function index()
  {
    $pessoasModel = $this->loadModel('PessoasModel');
    $arrPessoas = $pessoasModel->getAllPessoas();
    $arrMarcaoes = array();

      $pessoa = $_SESSION['perfil']['id'];
      $mes = date('m');
      $ano = date('Y');
      if (isset($_POST['idPessoa'])) {
          $pessoa = $_POST['idPessoa'];
          $mes = $_POST['mes'];
          $ano = $_POST['ano'];
      }

      $marcaoesModel = $this->loadModel('MarcacoesModel');
      $arrMarcaoes = $marcaoesModel->getMarcaoes($pessoa, $mes, $ano);
      $intNumeroMaxMarcacao = $marcaoesModel->getNumeMarcacao($pessoa, $mes, $ano);
      $intNumeroMaxMarcacao = $intNumeroMaxMarcacao->num;



    require 'application/views/_templates/header.php';
      require 'application/views/marcacoes/index.php';
      require 'application/views/_templates/footer.php';
  }


}
