            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Feridos cadastrados</h1>
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
                            <button type="button" class="btn btn-success" onclick="location.href='<?php echo URL; ?>calendarioferiados/cadastroferiado'">Novo feriado</button>&nbsp;
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Descri&ccedil;&atilde;o</th>
                                            <th>Data inicial</th>
                                            <th>Data final</th>
                                            <th>Calend&aacute;rio</th>
                                            <th>A&ccedil;&otilde;es</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	foreach ($feriados as $feriado) {
                                    		echo '
	                                        <tr class="odd gradeX">
	                                            <td>'.$feriado->id.'</td>
	                                            <td>'.$feriado->descricao.'</td>
            									<td>'.$feriado->dataini.'</td>
	                                            <td>'.$feriado->datafin.'</td>
	            								<td>'.$feriado->calendario.'</td>
	                                            <td class="center">
	            									<a href="'.URL.'calendarioferiados/editarferiado/'.$feriado->id.'"><img src="'.URL.'public/img/actions/edit.png" alt="Editar feriado" title="Editar feriado" /></a>&nbsp;
	            									<a href="'.URL.'calendarioferiados/deletarferiado/'.$feriado->id.'"><img src="'.URL.'public/img/actions/lixo.png" alt="Excluir feriado" title="Excluir feriado" /></a>
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