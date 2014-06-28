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
                                    <form role="form" id="cadsetores" name="cadsetores" action="<?php echo URL; ?>calendarioferiados/addCalendario" method="post">
                                        <div class="form-group">
                                            <label for="ano">Ano</label>
                                            <input id="ano" name="ano" class="form-control">
                                            <p class="help-block">Ano que o calend&aacute;rio representa.</p>
                                            <label for="descricao">Descri&ccedil;&atilde;o</label>
                                            <input id="descricao" name="descricao" class="form-control">
                                            <p class="help-block">Descri&ccedil;&atilde;o do calend&aacute;rio.</p>
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