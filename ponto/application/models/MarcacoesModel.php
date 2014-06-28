<?php

/**
 * Created by PhpStorm.
 * User: marcos.busana
 * Date: 26/06/14
 * Time: 10:53
 */
class MarcacoesModel
{
    /**
     * @var PDO
     */
    private $db;

    function __construct($db)
    {
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
    function getMarcaoes($idPessoa, $mes, $ano)
    {
        // @TODO implementar busca no banco das maracoes da pessoa
        $data = new DateTime('' . $ano . '-' . $mes . '-01 00:00:00');

        $sql = "SELECT hora,  DATE_FORMAT(hora,'%Y-%m-%d') as dia
              FROM batida_ponto_hora
              WHERE
                pessoas_id = " . $idPessoa . " AND
                hora between '" . $data->format('Y-m-d 00:00:00') . "' AND '" . $data->format('Y-m-t 23:59:59') . "'
              ORDER BY hora
              ";
        $query = $this->db->prepare($sql);

        $query->execute();
        return $query->fetchAll();

    }

    function getNumeMarcacao($idPessoa, $mes, $ano)
    {
        $data = new DateTime('' . $ano . '-' . $mes . '-01 00:00:00');

        $sql = "SELECT COUNT(*) as num
            FROM batida_ponto_hora
            WHERE
              pessoas_id = " . $idPessoa . " AND
              hora between '" . $data->format('Y-m-d 00:00:00') . "' AND '" . $data->format('Y-m-t 23:59:59') . "'
            GROUP BY DATE_FORMAT(hora,'%Y-%m-%d')
            ORDER BY 1 DESC
              ";
        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->rowCount() ? $query->fetch()->num : 0;
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


    public function deletaHoras($pessoas_id, $mes, $ano)
    {
        $data = new DateTime('' . $ano . '-' . $mes . '-01 00:00:00');

        $sql = "DELETE
            FROM batida_ponto_hora
            WHERE
              pessoas_id = " . $pessoas_id . " AND
              hora between '" . $data->format('Y-m-d 00:00:00') . "' AND '" . $data->format('Y-m-t 23:59:59') . "'
              ";
        $query = $this->db->prepare($sql);

        $query->execute();

    }
}
