<?php

class TiposPessoas extends Controller {
	
	public function index() {
		// load a model.
		$tipospessoas_model = $this->loadModel('TiposPessoasModel');
		$tipospessoas = $tipospessoas_model->getAllTiposPessoas();
		
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/tipospessoas/index.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function cadastro() {
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/tipospessoas/cadastro.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function editar($id) {
		// load a model.
		$tipospessoas_model = $this->loadModel('TiposPessoasModel');
		$tipospessoas = $tipospessoas_model->getTipoPessoaById($id);
	
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/tipospessoas/editar.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function addTipoPessoa() {
		// if we have POST data to create a new song entry
		if (isset($_POST["descricao"])) {
			// load model, perform an action on the model
			$tipospessoas_model = $this->loadModel('TiposPessoasModel');
			$tipospessoas_model->addTipoPessoa($_POST["descricao"], $_POST["codinteg"]);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Tipo de pessoa cadastrado com sucesso.');
	
		// where to go after song has been added
		header('location: ' . URL . 'tipospessoas/index');
	}
	
	public function deletar($id) {
		// if we have an id of a song that should be deleted
		if (isset($id)) {
			// load model, perform an action on the model
			$tipospessoas_model = $this->loadModel('TiposPessoasModel');
			$tipospessoas_model->deleteTipoPessoa($id);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Tipo de pessoa excluido com sucesso.');
	
		// where to go after song has been deleted
		header('location: ' . URL . 'tipospessoas/index');
	}
	
	public function updTipoPessoa() {
		// if we have POST data to create a new song entry
		if (isset($_POST["id"])) {
			// load model, perform an action on the model
			$tipospessoas_model = $this->loadModel('TiposPessoasModel');
			$tipospessoas_model->updTipoPessoa($_POST["id"], $_POST["descricao"], $_POST["codinteg"]);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Tipo de pessoa editado com sucesso.');
	
		// where to go after song has been added
		header('location: ' . URL . 'tipospessoas/index');
	}
}