<?php 
	require '../ponto/application/config/config.php';
	require 'connection.php';
	
	$conn = new Connection();
	
	$sql = "SELECT pes.id, pes.nome, pes.codinteg, pes.email, setor.descricao as setor, tp.descricao as tipo
				FROM pessoas pes
				INNER JOIN setores setor ON (setor.id = pes.setor)
				INNER JOIN tipopessoas tp ON (tp.id = pes.tipopessoa)
				";
	$query = $conn->db->prepare($sql);
	$query->execute();
	$pessoas = $query->fetchAll();
	
	//var_dump($pessoas);
	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo URL; ?>public/css/sb-admin.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    	<?php
            if(isset($_GET['msg'])) {
	            echo ' 
	            <div class="alert alert-info alert-dismissable">
	            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                '.$_GET['msg'].'
	            </div>
	            ';
            }
            ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    	<center>
                        <img src="bateponto.png" alt="sisponto" height="200" width="200">
                        </center>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="login" name="login" action="geraarquivo.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <select id="pessoa" name="pessoa" class="form-control">
                                            <?php
                                    			foreach ($pessoas as $pessoa) {
													echo '<option value="'.$pessoa->id.'">'.$pessoa->nome.'</option>';
                                                }
                                            ?>
                                            </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="ponto" name="ponto" type="txt" value="<?php echo date("d-m-Y H:i");?>">
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Bate ponto</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo URL; ?>public/js/jquery-1.10.2.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
    <script src="<?php echo URL; ?>public/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo URL; ?>public/js/sb-admin.js"></script>

</body>

</html>
