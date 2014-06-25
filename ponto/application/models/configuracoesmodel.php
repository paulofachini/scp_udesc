<?php

class ConfiguracoesModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param PDO $db
     */
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

    public function updateConfiguracoes($chave, $valor)
    {
      $chave       = strip_tags($chave);
      $valor       = strip_tags($valor);

        $sql = "
        UPDATE configuracoes
        SET
          valor = '".$valor."'
        WHERE
          chave = '".$chave."' ";

        $query = $this->db->prepare($sql);

        $query->execute();
    }
}
