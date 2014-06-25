<?php
class PessoasModel {
	
	function __construct($db) {
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}
	
	public function getAllPessoas() {
		$sql = "SELECT pes.id, pes.nome, pes.codinteg, pes.email, setor.descricao as setor, tp.descricao as tipo 
				FROM pessoas pes
				INNER JOIN setores setor ON (setor.id = pes.setor) 
				INNER JOIN tipopessoas tp ON (tp.id = pes.tipopessoa)
				";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function getPessoaById($id) {
		$sql = "SELECT id, nome, codinteg, email, setor, tipoPessoa 
				FROM pessoas
				WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
		return $query->fetchAll();
	}
	
	public function addPessoa($nome, $email, $setor, $tipopessoa, $senha, $codinteg) {
		// trata entrada de dados
		$nome = strip_tags($nome);
		$email = strip_tags($email);
		$setor = strip_tags($setor);
		$tipopessoa = strip_tags($tipopessoa);
		$codinteg = strip_tags($codinteg);
		$senha = strip_tags($senha);
	
		$sql = "INSERT INTO pessoas (nome, email, setor, tipopessoa, password, codinteg) 
				VALUES (:nome, :email, :setor, :tipopessoa, :password, :codinteg)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':nome' => $nome, 
							  ':email' => $email,
							  ':setor' => $setor,
							  ':tipopessoa' => $tipopessoa,
							  ':password' => sha1($senha),
							  ':codinteg' => $codinteg
						));
	}
	
	public function deletePessoa($id)
	{
		$sql = "DELETE FROM pessoas WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
	}
	
	public function updPessoa($id, $nome, $email, $setor, $tipopessoa, $senha, $codinteg) {
		// trata entrada de dados
		$id         = strip_tags($id);
		$nome       = strip_tags($nome);
		$email      = strip_tags($email);
		$setor      = strip_tags($setor);
		$tipopessoa = strip_tags($tipopessoa);
		$senha      = strip_tags($senha);
		$codinteg   = strip_tags($codinteg);
	
		$sql = "UPDATE pessoas 
				SET 
					nome = :nome, 
					email = :email, 
					setor = :setor, 
					tipopessoa = :tipopessoa, 
					".($password!="######"?"password = :password, " : "")." 
					codinteg = :codinteg 
				WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(
				array(':nome'         => $nome, 
						':email'      => $email, 
						':setor'      => $setor,
						':tipopessoa' => $tipopessoa,
						':password'   => sha1($password),
						':codinteg'   => $codinteg,
						':id'         => $id
				));
	}
	
	public function validaLogin($email, $senha) {
		// trata entrada de dados
		$email = strip_tags($email);
		$senha = strip_tags($senha);
		
		$sql = "SELECT id, nome, codinteg, email, setor, tipoPessoa
				FROM pessoas
				WHERE 
					email = :email AND
					password = :senha
				";
		$query = $this->db->prepare($sql);
		$query->execute(array(':email' => $email, ':senha' => sha1($senha)));
		return $query->fetchAll(); 
	}
}