			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar cadastro de pessoa</h1>
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
                                    <form role="form" id="cadpessoas" name="cadpessoas" action="<?php echo URL; ?>pessoas/updPessoa" method="post">
                                        <div class="form-group">
                                        <?php
                                    	foreach ($pessoas as $pessoa) {
										?>
											<label for="id">Id</label>
                                        	<p class="form-control-static"><?php echo $pessoa->id;?></p><br />
                                        	<input id="id" name="id" type="hidden" value="<?php echo $pessoa->id;?>">
                                            <label for="nome">Nome</label>
                                            <input id="nome" name="nome" class="form-control" value="<?php echo $pessoa->nome;?>">
                                            <label for="email">E-mail</label>
                                            <input id="email" name="email" class="form-control" value="<?php echo $pessoa->email;?>">
                                            <label for="setor">Setor</label>
                                            <select id="setor" name="setor" class="form-control">
                                            <?php
                                    			foreach ($setores as $setor) {
													$selected = ($setor->id == $pessoa->setor) ? "selected" : "";
													echo '<option value="'.$setor->id.'" '.$selected.'>'.$setor->descricao.'</option>';
                                                }
                                            ?>
                                            </select>
                                            <label for="tipopessoa">Tipo de pessoa</label>
                                            <select id="tipopessoa" name="tipopessoa" class="form-control">
                                            <?php
                                    			foreach ($tipospessoas as $tipopessoa) {
													$selected = ($tipopessoa->id == $pessoa->tipopessoa) ? "selected" : "";
													echo '<option value="'.$tipopessoa->id.'" '.$selected.'>'.$tipopessoa->descricao.'</option>';
                                                }
                                            ?>
                                            </select>
                                            <label for="senha">Senha</label>
                                            <input id="senha" name="senha" type="password" class="form-control"  value="######">
                                            <label for="codinteg">C&oacute;digo de integra&ccedil;&atilde;o</label>
                                            <input id="codinteg" name="codinteg" class="form-control" value="<?php echo $pessoa->codinteg;?>">
                                            <p class="help-block">C&oacute;digo para integra&ccedil;&atilde;o com o sistema de RH.</p>
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