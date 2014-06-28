<?php

class RegistroFeriasModel {

	function __construct($db) {
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public function getAllRegistroFerias()
	{
		$sql = "SELECT id, dataini, datafin, descricao, pessoa_id FROM registroferias ORDER BY dataini DESC";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function getRegistroFeriasByPessoaId($id)
	{
		$sql = "SELECT id, dataini, datafin, descricao, pessoa_id FROM registroferias WHERE pessoa_id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
		return $query->fetchAll();
	}
	
	public function addregistroferias($descricao, $datini, $datfin, $idpessoa) {
		$idpessoa = strip_tags($idpessoa);
		$descricao = strip_tags($descricao);
		$datini = strip_tags($datini);
		$datfin = strip_tags($datfin);
		
		$datini = explode('/', $datini);
		$datini = $datini[2].'-'.$datini[1].'-'.$datini[0];
		
		$datfin = explode('/', $datfin);
		$datfin = $datfin[2].'-'.$datfin[1].'-'.$datfin[0];
		
		$sql = "INSERT INTO registroferias (dataini, datafin, descricao, pessoa_id)
				VALUES (:dataini, :datafin, :descricao, :pessoa_id)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':dataini' => $datini, ':datafin' => $datfin, ':descricao' => $descricao, ':pessoa_id' => $idpessoa));
	}
	
	public function deleteFerias($id)
	{
		$sql = "DELETE FROM registroferias WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
	}
	
}