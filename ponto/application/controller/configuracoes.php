<?php


class Configuracoes extends Controller
{

    public function index()
    {
        $configuracoes_model = $this->loadModel('ConfiguracoesModel');
        $configuracoes = $configuracoes_model->getAllConfiguracoes();

        require 'application/views/_templates/header.php';
        require 'application/views/configuracoes/index.php';
        require 'application/views/_templates/footer.php';
    }


  public function editConfiguracoes()
  {
    $configuracoes_model = $this->loadModel('ConfiguracoesModel');

    foreach($_POST as $chave => $valor){
      $configuracoes_model->updateConfiguracoes($chave, $valor);
    }

    $_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Configura&ccedil;&#245;es editada com sucesso.');

    // where to go after song has been added
    header('location: ' . URL . 'configuracoes/index');
  }

}
