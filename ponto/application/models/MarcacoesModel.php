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
   * @return array
   */
  function getMarcaoes($idPessoa, $mes, $ano){
    // @TODO implementar busca no banco das maracoes da pessoa

  }
} 