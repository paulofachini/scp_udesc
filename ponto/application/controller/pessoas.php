<?php

class Pessoas extends Controller {
	
	public function login() {
		
	}
	
	public function index() {
		// load a model.
		$pessoas_model = $this->loadModel('PessoasModel');
		$pessoas = $pessoas_model->getAllPessoas();
		
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/pessoas/index.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function cadastro() {
		// load a model.
		$setores_model = $this->loadModel('SetoresModel');
		$setores = $setores_model->getAllSetores();
		
		$tipospessoas_model = $this->loadModel('TiposPessoasModel');
		$tipospessoas = $tipospessoas_model->getAllTiposPessoas();
		
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/pessoas/cadastro.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function editar($id) {
		// load a model.
		$setores_model = $this->loadModel('SetoresModel');
		$setores = $setores_model->getAllSetores();
		
		$tipospessoas_model = $this->loadModel('TiposPessoasModel');
		$tipospessoas = $tipospessoas_model->getAllTiposPessoas();
		
		$pessoas_model = $this->loadModel('PessoasModel');
		$pessoas = $pessoas_model->getPessoaById($id);
	
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/pessoas/editar.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function addPessoa() {
		// if we have POST data to create a new song entry
		if (isset($_POST["nome"])) {
			// load model, perform an action on the model
			$pessoas_model = $this->loadModel('PessoasModel');
			$pessoas_model->addPessoa($_POST["nome"], $_POST["email"], $_POST["setor"], $_POST["tipopessoa"], $_POST["senha"], $_POST["codinteg"]);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Pessoa cadastrada com sucesso.');
	
		header('location: ' . URL . 'pessoas/index');
	}
	
	public function deletar($id) {
		// if we have an id of a song that should be deleted
		if (isset($id)) {
			// load model, perform an action on the model
			$pessoas_model = $this->loadModel('PessoasModel');
			$pessoas_model->deletePessoa($id);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Pessoa excluido com sucesso.');
	
		// where to go after song has been deleted
		header('location: ' . URL . 'pessoas/index');
	}
	
	public function updPessoa() {
		// if we have POST data to create a new song entry
		if (isset($_POST["id"])) {
			// load model, perform an action on the model
			$pessoas_model = $this->loadModel('PessoasModel');
			$pessoas_model->updPessoa($_POST["id"], $_POST["nome"], $_POST["email"], $_POST["setor"], $_POST["tipopessoa"], $_POST["senha"], $_POST["codinteg"]);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Pessoa editada com sucesso.');
	
		// where to go after song has been added
		header('location: ' . URL . 'pessoas/index');
	}
}
