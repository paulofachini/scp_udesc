<?php

try {
	$idPessoa = strip_tags($_POST['pessoa']);
	$ponto = explode(" ", strip_tags($_POST['ponto']));
	
	$fp = fopen("whipped/".md5(date("d/m/Y H:i:s")).".txt", "a");
	$escreve = fwrite($fp, $idPessoa.";".$ponto[0].";".$ponto[1]);
	fclose($fp);
	$msg = "Ponto registrado.";
} catch (Exception $e) {
	$msg = "ERRO ao registrar ponto.";
}



header('location: index.php?msg='.$msg);