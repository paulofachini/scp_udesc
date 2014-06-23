<?php
class SetoresModel {
	
	function __construct($db) {
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}
	
	public function getAllSetores() {
		$sql = "SELECT id, descricao, codinteg FROM setores";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function getSetorById($id) {
		$sql = "SELECT id, descricao, codinteg FROM setores where id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
		return $query->fetchAll();
	}
	
	public function addSetor($descricao, $codinteg) {
		// trata entrada de dados
		$descricao = strip_tags($descricao);
		$codinteg = strip_tags($codinteg);
	
		$sql = "INSERT INTO setores (descricao, codinteg) VALUES (:descricao, :codinteg)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':descricao' => $descricao, ':codinteg' => $codinteg));
	}
	
	public function deleteSetor($id)
	{
		$sql = "DELETE FROM setores WHERE id = :setor_id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':setor_id' => $id));
	}
	
	public function updSetor($id, $descricao, $codinteg) {
		// trata entrada de dados
		$id = strip_tags($id);
		$descricao = strip_tags($descricao);
		$codinteg = strip_tags($codinteg);
	
		$sql = "UPDATE setores set descricao = :descricao, codinteg = :codinteg WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':descricao' => $descricao, ':codinteg' => $codinteg, ':id' => $id));
	}
}