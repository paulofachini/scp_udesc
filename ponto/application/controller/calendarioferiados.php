<?php

class Calendarioferiados extends Controller {
	
	public function index()
	{
		$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
		$calfer = $calendarioferiados_model->getAllCalendarios();
		
		require 'application/views/_templates/header.php';
		require 'application/views/calendarioferiados/index.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function cadastrocalendario () {
		require 'application/views/_templates/header.php';
		require 'application/views/calendarioferiados/cadastrocalendario.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function editarcalendario($id) {
		// load a model.
		$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
		$calfer = $calendarioferiados_model->getCalendarioById($id);
		
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/calendarioferiados/editarcalendario.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function updCalendario() {
		if (isset($_POST["id"])) {
			$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
			$calendarioferiados_model->updCalendario($_POST["id"], $_POST["ano"], $_POST["descricao"]);
		}
		
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Calend&aacute;rio editado com sucesso.');
		header('location: ' . URL . 'calendarioferiados/index');
	}
	
	public function deletarcalendario($id) {
		if (isset($id)) {
			$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
			$calendarioferiados_model->deleteCalendario($id);
		}
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Calend&aacute;rio excluido com sucesso.');
		header('location: ' . URL . 'calendarioferiados/index');
	}
	
	public function addCalendario() {
		if (isset($_POST["descricao"])) {
			$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
			$calendarioferiados_model->addCalendario($_POST["ano"], $_POST["descricao"]);
		}
		
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Calend&aacute;rio cadastrado com sucesso.');
		
		header('location: ' . URL . 'calendarioferiados/index');
	}
	
	public function listaferiado() {
		$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
		$feriados = $calendarioferiados_model->getAllFeriados();
		
		
		
		require 'application/views/_templates/header.php';
		require 'application/views/calendarioferiados/listaferiado.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function editarferiado($id) {
		// load a model.
		$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
		$feriados = $calendarioferiados_model->getFeriadoById($id);
		$calfer = $calendarioferiados_model->getAllCalendarios();
	
		// load views.
		require 'application/views/_templates/header.php';
		require 'application/views/calendarioferiados/editarferiado.php';
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
	
	public function cadastroferiado() {
		$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
		$calfer = $calendarioferiados_model->getAllCalendarios();
		
		require 'application/views/_templates/header.php';
		require 'application/views/calendarioferiados/cadastroferiado.php';
		require 'application/views/_templates/footer.php';
	}
	
	public function addFeriado() {
		if (isset($_POST["descricao"])) {
			$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
			$calendarioferiados_model->addFeriado($_POST["descricao"], $_POST["datini"], $_POST["datfin"], $_POST["calendario"]);
		}
	
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Feriado cadastrado com sucesso.');
	
		header('location: ' . URL . 'calendarioferiados/listaferiado');
	}
	
	public function deletarferiado($id) {
		if (isset($id)) {
			$calendarioferiados_model = $this->loadModel('CalendarioferiadosModel');
			$calendarioferiados_model->deleteFeriado($id);
		}
		$_SESSION['msg'] = array('cod'=>'alert-success', 'msg'=>'Feriado excluido com sucesso.');
		header('location: ' . URL . 'calendarioferiados/listaferiado');
	}
}