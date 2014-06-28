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

        $pessoaSel = isset($_POST['idPessoa']) ? $_POST['idPessoa'] : $_SESSION['perfil']['id'];
        $mes = date('m');
        $ano = date('Y');
        if (isset($_POST['mes'])) {
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];
        }

        $marcaoesModel = $this->loadModel('MarcacoesModel');
        $arrMarcaoes = $marcaoesModel->getMarcaoes($pessoaSel, $mes, $ano);
        $intNumeroMaxMarcacao = $marcaoesModel->getNumeMarcacao($pessoaSel, $mes, $ano);
        //$intNumeroMaxMarcacao = $intNumeroMaxMarcacao->num;


        require 'application/views/_templates/header.php';
        require 'application/views/marcacoes/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function edicao()
    {
        $pessoasModel = $this->loadModel('PessoasModel');
        $arrPessoas = $pessoasModel->getAllPessoas();
        $arrMarcaoes = array();

        $pessoaSel = isset($_POST['idPessoa']) ? $_POST['idPessoa'] : $_SESSION['perfil']['id'];
        $mes = date('m');
        $ano = date('Y');
        if (isset($_POST['mes'])) {
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];
        }

        $marcaoesModel = $this->loadModel('MarcacoesModel');
        $arrMarcaoes = $marcaoesModel->getMarcaoes($pessoaSel, $mes, $ano);
        $intNumeroMaxMarcacao = $marcaoesModel->getNumeMarcacao($pessoaSel, $mes, $ano);
        //$intNumeroMaxMarcacao = $intNumeroMaxMarcacao->num;


        require 'application/views/_templates/header.php';
        require 'application/views/marcacoes/edicao.php';
        require 'application/views/_templates/footer.php';
    }

    public function salvar()
    {

        $pessoa = isset($_POST['idPessoa']) ? $_POST['idPessoa'] : $_SESSION['perfil']['id'];
        $marcaoesModel = $this->loadModel('MarcacoesModel');
        $mes = date('m');
        $ano = date('Y');
        if (isset($_POST['mes'])) {
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];


        }

        $marcaoesModel->deletaHoras($pessoa, $mes, $ano);
        //print_r($_POST);

        foreach ($_POST as $dia => $arrHora) {
            foreach ($arrHora as $hora) {
                $data = new DateTime(str_replace('_', '-', $dia) . ' ' . $hora . ':00');
                $marcaoesModel->addBatida($pessoa, $data);
            }
        }

        header('Location: ' . URL . 'Marcacoes/edicao');
    }

}
