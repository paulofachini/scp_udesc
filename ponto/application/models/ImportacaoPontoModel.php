<?php
/**
 * Created by PhpStorm.
 * User: marcos.busana
 * Date: 25/06/14
 * Time: 20:27
 */

class ImportacaoPontoModel {

  function __construct($db) {
    try {
      $this->db = $db;
    } catch (PDOException $e) {
      exit('Database connection could not be established.');
    }
  }

  public function getAllConfiguracoes()
  {
    $sql = "SELECT id, chave, valor, label, mascara FROM configuracoes";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }

} 