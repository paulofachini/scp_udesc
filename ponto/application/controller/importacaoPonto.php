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

    if(file_exists("../leitora/horas.txt")){
      $conteudo = file("../leitora/horas.txt");
      foreach($conteudo as $registro){
        $reg = explode(';',$registro);
        $codPessoa = $reg[0];
        $horaBatida = $reg[1];
        $objDate = new DateTime($horaBatida);
        $importacaoPontoModel->addHora($codPessoa, $objDate);
      }

    }
    //$arquivo =

    $ImportacaoPonto = $importacaoPontoModel->getAllConfiguracoes();
  }

}
