<div class="row">
  <div class="col-lg-12">
      <h1 class="page-header">Marcacao</h1>
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
              <div style="width: 100px" class="pull-left">
                  <p>Ano</p>
                  <select class="form-control">
                      <option>2014</option>
                      <option>2013</option>
                      <option>2012</option>
                  </select>
              </div>
              <div style="width: 100px; margin-left: 20px;" class="pull-left">
                  <p>M&ecirc;s</p>
                  <select class="form-control">
                      <option>Janeiro</option>
                      <option>Fevereiro</option>
                      <option>Marco</option>
                      <option>Abril</option>
                      <option>Maio</option>
                      <option>Junho</option>
                      <option>Julho</option>
                      <option>Agosto</option>
                      <option>Setembro</option>
                      <option>Outubro</option>
                      <option>Novembro</option>
                      <option>Dezembro</option>
                  </select>
              </div>

              <table class="table table-hover table-striped bold">
              <thead>
                <tr>
                  <th>Dia</th>
                  <th>Entrada</th>
                  <th>Saida Almo&ccedil;o</th>
                  <th>Entrada Almo&ccedil;o</th>
                  <th>Saida</th>
                  <th>Total</th>
                </tr>
              </thead>
              <?php
                if(count($arrMarcaoes) == 0){
              ?>
              <tbody>
                <tr>
                    <td colspan="6">nenhum registro</td>
                </tr>
              </tbody>

              <?php
                }else{
                  echo '<tbody>';
                  $contDias = 0;
                  foreach($arrMarcaoes as $maracao){
                    $dia = $maracao->dia;
                    $hora = $maracao->hora;

                    if($dia == $oldDia){
                      echo '<td>'.$hora.'</td>';

                    }else{
                      if($contDias != 0){
                        echo '</tr>';
                      }
                      echo '
                      <tr>
                        <td>'.$dia.'</td>
                        <td>'.$dia.'</td>';

                      $contDias++;
                    }
                    $oldDia = $maracao->dia;
                  }
                  echo '</tbody>';
                }
              ?>
            </table>
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