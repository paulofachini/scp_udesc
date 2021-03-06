<?php
class TiposPessoasModel {
	
	function __construct($db) {
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}
	
	public function getAllTiposPessoas() {
		$sql = "SELECT id, descricao, codinteg FROM tipopessoas";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function getTipoPessoaById($id) {
		$sql = "SELECT id, descricao, codinteg FROM tipopessoas where id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
		return $query->fetchAll();
	}
	
	public function addTipoPessoa($descricao, $codinteg) {
		// trata entrada de dados
		$descricao = strip_tags($descricao);
		$codinteg = strip_tags($codinteg);
	
		$sql = "INSERT INTO tipopessoas (descricao, codinteg) VALUES (:descricao, :codinteg)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':descricao' => $descricao, ':codinteg' => $codinteg));
	}
	
	public function deleteTipoPessoa($id)
	{
		$sql = "DELETE FROM tipopessoas WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
	}
	
	public function updTipoPessoa($id, $descricao, $codinteg) {
		// trata entrada de dados
		$id = strip_tags($id);
		$descricao = strip_tags($descricao);
		$codinteg = strip_tags($codinteg);
	
		$sql = "UPDATE tipopessoas set descricao = :descricao, codinteg = :codinteg WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':descricao' => $descricao, ':codinteg' => $codinteg, ':id' => $id));
	}
}