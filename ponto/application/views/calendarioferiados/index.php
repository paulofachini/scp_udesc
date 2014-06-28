            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Calend&aacute;rios cadastrados</h1>
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
                            <button type="button" class="btn btn-success" onclick="location.href='<?php echo URL; ?>calendarioferiados/cadastrocalendario'">Novo calend&aacute;rio</button>&nbsp;
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Ano</th>
                                            <th>Descri&ccedil;&atilde;o</th>
                                            <th>A&ccedil;&otilde;es</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	foreach ($calfer as $cf) {
                                    		echo '
	                                        <tr class="odd gradeX">
	                                            <td>'.$cf->id.'</td>
	                                            <td>'.$cf->ano.'</td>
	                                            <td>'.$cf->descricao.'</td>
	                                            <td class="center">
	            									<a href="'.URL.'calendarioferiados/listaferiado"><img src="'.URL.'public/img/actions/calendar.png" alt="Feriados" title="Feriados" /></a>&nbsp;
	            									<a href="'.URL.'calendarioferiados/editarcalendario/'.$cf->id.'"><img src="'.URL.'public/img/actions/edit.png" alt="Editar calend&aacute;rio" title="Editar calend&aacute;rio" /></a>&nbsp;
	            									<a href="'.URL.'calendarioferiados/deletarcalendario/'.$cf->id.'"><img src="'.URL.'public/img/actions/lixo.png" alt="Excluir calend&aacute;rio" title="Excluir calend&aacute;rio" /></a>
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