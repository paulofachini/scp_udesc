
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Registro de f&eacute;rias</h1>
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
                        <div class="row">
                			<div class="col-lg-12">        	
                        	<div class="col-lg-6">
                        	<select id="pessoaselect" name="pessoaselect" class="form-control" onchange="changeTest();">
                        	<option value="#####">Selecione a pessoa</option>
                            <?php
                            
                            	foreach ($pessoas as $pessoa) {
									$selected = ($pessoa->id == $id) ? "selected" : "";
									echo '<option value="'.$pessoa->id.'" '.$selected.'>'.$pessoa->nome.'</option>';
                                }
                             
                            ?>
                            </select>
                            </div>
                            <div class="col-lg-6">
                            <?php
                            	if(empty($id)===false) { 
                            		echo "<button type=\"button\" class=\"btn btn-success\" onclick=\"location.href='".URL."registroferias/registraperiodoferias/".$id."' \">Novo registro</button>&nbsp;";
                            	}
                            ?>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Data inicial</th>
                                            <th>Data final</th>
                                            <th>Descri&ccedil;&atilde;o</th>
                                            <th>A&ccedil;&otilde;es</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	if(empty($registroferias)===false) {
	                                    	foreach ($registroferias as $rf) {
	                                    		echo '
		                                        <tr class="odd gradeX">
		                                            <td>'.$rf->id.'</td>
		                                            <td>'.$rf->dataini.'</td>
		                                            <td>'.$rf->datafin.'</td>
		            								<td>'.$rf->descricao.'</td>
		                                            <td class="center">
		            									<a href="'.URL.'registroferias/editar/'.$rf->id.'"><img src="'.URL.'public/img/actions/edit.png" ></a>&nbsp;
		            									<a href="'.URL.'registroferias/deletar/'.$rf->id.'"><img src="'.URL.'public/img/actions/lixo.png" ></a>
		            								</td>
		                                        </tr>
		                                        ';
	                                    	}
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