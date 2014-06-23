            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pessoas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
            if(isset($_SESSION['msg'])) {
	            echo ' 
	            <div class="alert '.$_SESSION['msg']['cod'].' alert-dismissable">
	            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                '.$_SESSION['msg']['msg'].'
	            </div>
	            ';
	            $_SESSION['msg'] = null;
            }
            ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-heading">
                            <button type="button" class="btn btn-success" onclick="location.href='<?php echo URL; ?>pessoas/cadastro'">Novo</button>&nbsp;
                            <button type="button" class="btn btn-primary" onclick="location.href='<?php echo URL; ?>pessoas/cadastro'">Importar de arquivo</button>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Setor</th>
                                            <th>Tipo de pessoa</th>
                                            <th>C&oacute;digo de integra&ccedil;&atilde;o</th>
                                            <th>A&ccedil;&otilde;es</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	foreach ($pessoas as $pessoa) {
                                    		echo '
	                                        <tr class="odd gradeX">
	                                            <td>'.$pessoa->id.'</td>
            									<td>'.$pessoa->nome.'</td>
	            								<td>'.$pessoa->email.'</td>
	            								<td>'.$pessoa->setor.'</td>
	                                            <td>'.$pessoa->tipo.'</td>
	                                            <td>'.$pessoa->codinteg.'</td>
	                                            <td class="center">
	            									<a href="'.URL.'pessoas/editar/'.$pessoa->id.'"><img src="'.URL.'public/img/actions/edit.png" ></a>&nbsp;
	            									<a href="'.URL.'pessoas/deletar/'.$pessoa->id.'"><img src="'.URL.'public/img/actions/lixo.png" ></a>
	            								</td>
	                                        </tr>
	                                        ';
                                    	}
                                    	?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
