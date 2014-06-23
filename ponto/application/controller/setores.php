<?php
class Setores extends Controller {
	
	public function index() {
		// load a model.
		$setores_model = $this->loadModel('SetoresModel');
		$setores = $setores_model->getAllSetores();
	
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/setores/index.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function cadastro() {
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/setores/cadastro.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function editar($id) {
		// load a model.
		$setores_model = $this->loadModel('SetoresModel');
		$setores = $setores_model->getSetorById($id);
	
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/setores/editar.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function addSetor() {
		// if we have POST data to create a new song entry
		if (isset($_POST["descricao"])) {
			// load model, perform an action on the model
			$setores_model = $this->loadModel('SetoresModel');
			$setores_model->addSetor($_POST["descricao"], $_POST["codinteg"]);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Setor cadastrado com sucesso.');
		
		// where to go after song has been added
		header('location: ' . URL . 'setores/index');
	}
	
	public function deletar($id) {
		// if we have an id of a song that should be deleted
		if (isset($id)) {
			// load model, perform an action on the model
			$setores_model = $this->loadModel('SetoresModel');
			$setores_model->deleteSetor($id);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Setor excluido com sucesso.');
		
		// where to go after song has been deleted
		header('location: ' . URL . 'setores/index');
	}
	
	public function updSetor() {
		// if we have POST data to create a new song entry
		if (isset($_POST["id"])) {
			// load model, perform an action on the model
			$setores_model = $this->loadModel('SetoresModel');
			$setores_model->updSetor($_POST["id"], $_POST["descricao"], $_POST["codinteg"]);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Setor editado com sucesso.');
	
		// where to go after song has been added
		header('location: ' . URL . 'setores/index');
	}
}