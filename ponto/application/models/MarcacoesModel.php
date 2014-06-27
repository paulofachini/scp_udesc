<?php
/**
 * Created by PhpStorm.
 * User: marcos.busana
 * Date: 26/06/14
 * Time: 10:53
 */

class MarcacoesModel {

  function __construct($db) {
    try {
      $this->db = $db;
    } catch (PDOException $e) {
      exit('Database connection could not be established.');
    }
  }

  /**
   * @param $idPessoa int
   * @param $mes int(2)
   * @param $ano int(4)
   */
  function getMarcaoes($idPessoa, $mes, $ano){
    // @TODO implementar busca no banco das maracoes da pessoa
      $data = new DateTime('' . $ano . '-' . $mes . '-01 00:00:00');

      $sql = "SELECT hora
              FROM batida_ponto_hora
              WHERE
                pessoas_id = " . $idPessoa . " AND
                hora between '" . $data->format('Y-m-d 00:00:00') . "' AND '" . $data->format('Y-m-t 23:59:59') . "'
              ";
      $query = $this->db->prepare($sql);
      var_dump($query);
      return $query->fetchAll();

  }
} 