<?php

/**
 * Created by PhpStorm.
 * User: marcos.busana
 * Date: 25/06/14
 * Time: 20:20
 */
class ImportacaoPonto extends Controller
{

    public function index()
    {
        $importacaoPontoModel = $this->loadModel('ImportacaoPontoModel');
        $strDir = "../leitora/whipped/";
        if (is_dir($strDir)) {
            if ($dh = opendir($strDir)) {
                while (($file = readdir($dh)) !== false) {
                    if (filetype($strDir . $file) == 'file' && stripos($file, 'txt') !== false) {
                        //Paga o conteudo do arquivo
                        $conteudo = file_get_contents($strDir . $file);
                        $registro = $conteudo[0];
                        $reg = explode(';', $registro);

                        //Paga os registros em cada possi��o
                        $codPessoa = $reg[0];
                        $horaBatida = $reg[1] . ' ' . $reg[2];
                        $objDate = new DateTime($horaBatida);

                        //salva a batida
                        $importacaoPontoModel->addBatida($codPessoa, $objDate);

                        //remove o arquivo
                        //unlink($strDir . $file);
                    }
                }
            }
        }
    }

}
