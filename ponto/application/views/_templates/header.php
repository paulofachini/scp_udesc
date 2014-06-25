<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisPonto - Sistema para gest&atilde;o de ponto eletr&ocirc;nico</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Page-Level Plugin CSS - Forms -->
    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo URL; ?>public/css/sb-admin.css" rel="stylesheet">
    <!-- IE -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<!-- other browsers -->
	<link rel="icon" type="image/x-icon" href="favicon.ico" />
</head>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo URL; ?>">
                	<img src="<?php echo URL; ?>public/img/sisponto6060.png" alt="sisponto" height="30" width="30">
                	&nbsp;SisPonto v0.1
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    	Usu&aacute;rio logado: <?php echo $_SESSION['perfil']['nome']; ?>
                    </a>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo URL; ?>pessoas/editar/<?php echo $_SESSION['perfil']['id']; ?>"><i class="fa fa-user fa-fw"></i> Meu Cadastro</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL; ?>pessoas/logout"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
		<?php require 'application/views/_templates/menu.php'; ?>
        </nav>
        <div id="page-wrapper">
