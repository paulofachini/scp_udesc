            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Setores</h1>
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
                            <button type="button" class="btn btn-success" onclick="location.href='<?php echo URL; ?>setores/cadastro'">Novo</button>&nbsp;
                            <button type="button" class="btn btn-primary" onclick="location.href='<?php echo URL; ?>setores/importararquivo'">Importar de arquivo</button>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Descri&ccedil;&atilde;o</th>
                                            <th>C&oacute;digo de integra&ccedil;&atilde;o</th>
                                            <th>A&ccedil;&otilde;es</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	foreach ($setores as $setor) {
                                    		echo '
	                                        <tr class="odd gradeX">
	                                            <td>'.$setor->id.'</td>
	                                            <td>'.$setor->descricao.'</td>
	                                            <td>'.$setor->codinteg.'</td>
	                                            <td class="center">
	            									<a href="'.URL.'setores/editar/'.$setor->id.'"><img src="'.URL.'public/img/actions/edit.png" ></a>&nbsp;
	            									<a href="'.URL.'setores/deletar/'.$setor->id.'"><img src="'.URL.'public/img/actions/lixo.png" ></a>
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