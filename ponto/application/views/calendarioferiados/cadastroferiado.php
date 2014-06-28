			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro de calend&aacute;rio</h1>
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
                                    <form role="form" id="cadsetores" name="cadsetores" action="<?php echo URL; ?>calendarioferiados/addFeriado" method="post">
                                        <div class="form-group">
                                            <label for="descricao">Descri&ccedil;&atilde;o</label>
                                            <input id="descricao" name="descricao" class="form-control" >
                                            <label for="datini">Data inicial</label>
                                            <input id="datini" name="datini" class="form-control" >
                                            <label for="datfin">Data final</label>
                                            <input id="datfin" name="datfin" class="form-control" >                                            
                                            <label for="calendario">Calend&aacute;rio</label>
                                            <select id="calendario" name="calendario" class="form-control">
                                            <?php
                                    			foreach ($calfer as $cf) {
													echo '<option value="'.$cf->id.'" >'.$cf->descricao.'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-default">Salvar</button>
                                        <button type="reset" class="btn btn-default">Limpar</button>
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