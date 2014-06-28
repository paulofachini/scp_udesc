<?php

class CalendarioferiadosModel
{
	function __construct($db) {
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}
	
	public function getAllCalendarios()
	{
		$sql = "SELECT id, ano, descricao FROM calendarios ORDER BY ano DESC";
		$query = $this->db->prepare($sql);
		$query->execute();
	
		return $query->fetchAll();
	}
	
	public function getCalendarioById($id)
	{
		$sql = "SELECT id, ano, descricao FROM calendarios WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
		return $query->fetchAll();
	}
	
	public function addCalendario($ano, $descricao) {
		$descricao = strip_tags($descricao);
		$ano = strip_tags($ano);
		
		$sql = "INSERT INTO calendarios (descricao, ano) VALUES (:descricao, :ano)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':descricao' => $descricao, ':ano' => $ano));
	}
	
	public function deleteCalendario($id)
	{
		$sql = "DELETE FROM calendarios WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
	}
	
	public function updCalendario($id, $ano, $descricao) {
		$id = strip_tags($id);
		$descricao = strip_tags($descricao);
		$ano = strip_tags($ano);
		
		$sql = "UPDATE calendarios SET descricao = :descricao, ano = :ano WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':descricao' => $descricao, ':ano' => $ano, ':id' => $id));
	}
	
	public function getAllFeriados() {
		$sql = "
				SELECT 
					cad.id, DATE_FORMAT(cad.dataini, '%d/%m/%Y') as dataini, DATE_FORMAT(cad.datafin, '%d/%m/%Y') as datafin, 
					cad.descricao, cal.ano as calendario, Month(datafin) as mes 
				FROM 
					calendarios cal
					INNER JOIN calendariosdet cad ON (cal.id = cad.calendario) 
				ORDER BY 
					cad.dataini DESC";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function getFeriadoById($id) {
		$sql = "SELECT id, DATE_FORMAT(dataini, '%d/%m/%Y') as dataini, DATE_FORMAT(datafin, '%d/%m/%Y') as datafin, descricao, calendario FROM calendariosdet WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
		return $query->fetchAll();
	}
	
	public function updFeriado($id, $descricao, $datini, $datfin, $calendario) {
		$id = strip_tags($id);
		$descricao = strip_tags($descricao);
		$datini = strip_tags($datini);
		$datfin = strip_tags($datfin);
		$calendario = strip_tags($calendario);
		
		$datini = explode('/', $datini);
		$datini = $datini[2].'-'.$datini[1].'-'.$datini[0];
		
		$datfin = explode('/', $datfin);
		$datfin = $datfin[2].'-'.$datfin[1].'-'.$datfin[0];
		
		$sql = "UPDATE calendariosdet SET dataini = :dataini, datafin = :datafin, descricao = :descricao, calendario = :calendario 
				WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':dataini' => $datini, ':datafin' => $datfin, ':descricao' => $descricao, ':calendario' => $calendario, ':id' => $id));
	}
	
	public function addFeriado($descricao, $datini, $datfin, $calendario) {
		$id = strip_tags($id);
		$descricao = strip_tags($descricao);
		$datini = strip_tags($datini);
		$datfin = strip_tags($datfin);
		$calendario = strip_tags($calendario);
		
		$datini = explode('/', $datini);
		$datini = $datini[2].'-'.$datini[1].'-'.$datini[0];
		
		$datfin = explode('/', $datfin);
		$datfin = $datfin[2].'-'.$datfin[1].'-'.$datfin[0];
	
		$sql = "INSERT INTO calendariosdet (dataini, datafin, descricao, calendario) 
				VALUES (:dataini, :datafin, :descricao, :calendario)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':dataini' => $datini, ':datafin' => $datfin, ':descricao' => $descricao, ':calendario' => $calendario));
	}
	
	public function deleteFeriado($id)
	{
		$sql = "DELETE FROM calendariosdet WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
	}
	
	public function ehFeriado($data) {
		$data = explode('/', $data);
		$data = $data[2].$data[1].$data[0];
		$sql = "SELECT count(*) as conta FROM calendariosdet 
				WHERE 
					DATE_FORMAT(dataini,'%Y%m%d') >= :datini and 
					DATE_FORMAT(datafin,'%Y%m%d') <= :datfin 
				";
		$query = $this->db->prepare($sql);
		$query->execute(array(':datini' => $data, ':datfin' => $data));
		$result = $query->fetchAll();
		foreach ($result as $rs) {
			return $rs->conta > 0 ? true : false;
		}
		return false;
	}
}