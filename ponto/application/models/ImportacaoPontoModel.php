<?php

/**
 * Created by PhpStorm.
 * User: marcos.busana
 * Date: 25/06/14
 * Time: 20:27
 */
class ImportacaoPontoModel
{

    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * @param $pessoas_id int
     * @param $batida Datatime
     */
    public function addBatida($pessoas_id, $batida)
    {
        $sql = "
          INSERT INTO batida_ponto (bat_dia, situacao, pessoas_id)
            VALUES ( '" . $batida->format('Y-m-d 00:00:00') . "', '0', $pessoas_id)
          ON DUPLICATE KEY UPDATE
            `bat_dia` =  '" . $batida->format('Y-m-d 00:00:00') . "'";
        $query = $this->db->prepare($sql);
        $query->execute();


        $sql = "
      INSERT INTO batida_ponto_hora (hora, pessoas_id)
      VALUES ('" . $batida->format('Y-m-d H:i:s') . "', $pessoas_id );";

        $query = $this->db->prepare($sql);
        $query->execute();
    }

} 