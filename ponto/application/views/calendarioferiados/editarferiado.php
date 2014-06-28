			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar feriado</h1>
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
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" id="cadsetores" name="cadsetores" action="<?php echo URL; ?>calendarioferiados/updFeriado" method="post">
                                        <div class="form-group">
                                        <?php
                                    	foreach ($feriados as $feriado) {
										?>
                                        	<label for="id">Id</label>
                                        	<p class="form-control-static"><?php echo $feriado->id;?></p><br />
                                            <input id="id" name="id" type="hidden" value="<?php echo $feriado->id;?>">
                                            <label for="descricao">Descri&ccedil;&atilde;o</label>
                                            <input id="descricao" name="descricao" class="form-control" value="<?php echo $feriado->descricao;?>">
                                            <label for="datini">Data inicial</label>
                                            <input id="datini" name="datini" class="form-control" value="<?php echo $feriado->dataini;?>">
                                            <label for="datfin">Data final</label>
                                            <input id="datfin" name="datfin" class="form-control" value="<?php echo $feriado->datafin;?>">                                            
                                            <label for="calendario">Calend&aacute;rio</label>
                                            <select id="calendario" name="calendario" class="form-control">
                                            <?php
                                    			foreach ($calfer as $cf) {
													$selected = ($cf->id == $feriado->calendario) ? "selected" : "";
													echo '<option value="'.$cf->id.'" '.$selected.'>'.$cf->descricao.'</option>';
                                                }
                                            ?>
                                            </select>
                                        <?php
                                    	}
										?>
                                        </div>
                                        <button type="submit" class="btn btn-default">Salvar</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->