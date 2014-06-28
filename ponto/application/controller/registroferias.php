<?php
class RegistroFerias extends Controller {
	
	public function index($id = null) {
		
		$registroferias = null;
		
		if(empty($id)===false) {
			$registroferias_model = $this->loadModel('RegistroFeriasModel');
			$registroferias = $registroferias_model->getRegistroFeriasByPessoaId($id);
		}
		
		$pessoas_model = $this->loadModel('PessoasModel');
		$pessoas = $pessoas_model->getAllPessoas();
		
		require 'application/views/_templates/header.php';
		require 'application/views/registroferias/index.php';
		require 'application/views/_templates/footer.php';
		echo '
			<script type="text/javascript">
            	function changeTest() {
            	    var result = $( "#pessoaselect" ).val();
                	document.location = "'.URL.'registroferias/index/"+result;	
                }
            </script>
			';
	}
	
	public function registraperiodoferias($id) {
		$pessoas_model = $this->loadModel('PessoasModel');
		$pessoas = $pessoas_model->getPessoaById($id);
		
		require 'application/views/_templates/header.php';
		require 'application/views/registroferias/registraperiodoferias.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function addregistroferias() {
		if (isset($_POST["idpessoa"])) {
			$registroferias_model = $this->loadModel('RegistroFeriasModel');
			$registroferias_model->addregistroferias($_POST["descricao"], $_POST["datini"], $_POST["datfin"], $_POST["idpessoa"]);
			
		}
		
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Registro de f&eacute;rias efetuado com sucesso.');
		header('location: ' . URL . 'registroferias/index/'.$_POST["idpessoa"]);
		
	}
	
	public function deletar($id) {
		if (isset($id)) {
			$registroferias_model = $this->loadModel('RegistroFeriasModel');
			$registroferias_model->deleteFerias($id);
		}
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'F&eacute;rias excluida com sucesso.');
		header('location: ' . URL . 'calendarioferiados/listaferiado');
	}
	
	public function editar($id) {
		$registroferias_model = $this->loadModel('RegistroFeriasModel');
		$feriados = $registroferias_model->getFeriadoById($id);
	
		require 'application/views/_templates/header.php';
		require 'application/views/registroferias/editarferiado.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function updFeriado() {
		if (isset($_POST["id"])) {
			$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
			$calendarioferiados_model->updFeriado($_POST["id"], $_POST["descricao"], $_POST["datini"], $_POST["datfin"], $_POST["calendario"]);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Feriado editado com sucesso.');
		header('location: ' . URL . 'calendarioferiados/listaferiado');
	}
}