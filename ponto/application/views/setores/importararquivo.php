           <link href="<?php echo URL; ?>public/css/uploadify.css" rel="stylesheet">
           
           
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
                            <button type="button" class="btn btn-primary" onclick="location.href='<?php echo URL; ?>setores/importararquivo'">Importar</button>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
								<form>
									<div id="queue"></div>
									<input id="file_upload" name="file_upload" type="file" multiple="true" >
								</form>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>