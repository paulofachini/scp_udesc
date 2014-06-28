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
          <div class="col-lg-6" style="width: 100%">
            <div style="margin-bottom: 100px">
                <form action="<?php echo URL; ?>Marcacoes/index" method="post">
                    <div style="width: 100px" class="pull-left">
                        <p>Ano</p>
                        <select class="form-control" name="ano">
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                        </select>
                    </div>
                    <div style="width: 100px; margin-left: 20px;" class="pull-left">
                        <p>M&ecirc;s</p>
                        <select class="form-control" name="mes">
                            <option value="1">Janeiro</option>
                            <option value="2">Fevereiro</option>
                            <option value="3">Marco</option>
                            <option value="4">Abril</option>
                            <option value="5">Maio</option>
                            <option value="6">Junho</option>
                            <option value="7">Julho</option>
                            <option value="8">Agosto</option>
                            <option value="9">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                    </div>
                    <div style="width: 100px; margin-left: 20px; padding-top: 20px;" class="pull-left">
                        <input type="submit" value="Buscar" class="btn btn-lg btn-success"/>
                    </div>
                </form>
            </div>
            <table class="table table-hover table-striped bold" style="width: 100%">
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
                  $oldDia =  new DateTime();
                  $arrTotal = array();
                  $numColunas  = 0;
                  $totalHorasMes  = 0;
                  foreach($arrMarcaoes as $maracao){

                    $hora = new DateTime($maracao->hora);
                    $dia = new DateTime($maracao->dia);

                    if($dia == $oldDia){
                      $arrTotal[] = DateTime::createFromFormat('H:i:s', $hora->format('H:i:s'));
                      echo '<td>'.$hora->format('H:i').'</td>';
                    }else{
                      if($contDias != 0){
                        $intervalo = '';
                        $numColunas  = (count($arrTotal) > $numColunas) ? count($arrTotal) : $numColunas;
                        if(!(count($arrTotal)%2)){
                          for($i =0; $i < count($arrTotal); $i+=2){
                            if($intervalo){
                              $diff = $arrTotal[$i]->diff($arrTotal[$i+1]);
                              $intervalo = addHora($intervalo, $diff->format('%H:%I:%S'));
                            }else{
                              $diff = $arrTotal[$i]->diff($arrTotal[$i+1]);
                              $intervalo = $diff->format('%H:%I:%S');
                            }

                          }
                          $totalHorasMes = ($intervalo) ? addHora($totalHorasMes, $intervalo) : $intervalo;
                        }else{
                          $intervalo = 'INV';
                        }
                        for($i =0; $i < ($intNumeroMaxMarcacao - count($arrTotal)); $i++){
                          echo ' <td>&nbsp;</td>';
                        }
                        echo '
                          <td>'.$intervalo.'</td>
                       </tr>';
                      }

                      $arrTotal = array();
                      $arrTotal[] = DateTime::createFromFormat('H:i:s', $hora->format('H:i:s'));
                      echo '
                      <tr>
                        <td>'.$dia->format('d/m/Y').'</td>
                        <td>'.$hora->format('H:i').'</td>';

                      $contDias++;
                    }
                    $oldDia = $dia;
                  }

                  $intervalo = '';
                  $numColunas  = (count($arrTotal) > $numColunas) ? count($arrTotal) : $numColunas;
                  if(!(count($arrTotal)%2)){
                    for($i =0; $i < count($arrTotal); $i+=2){
                      if($intervalo){
                        $diff = $arrTotal[$i]->diff($arrTotal[$i+1]);
                        $intervalo = addHora($intervalo, $diff->format('%H:%I:%S'));
                      }else{
                        $diff = $arrTotal[$i]->diff($arrTotal[$i+1]);
                        $intervalo = $diff->format('%H:%I:%S');
                      }

                    }
                      $totalHorasMes = ($intervalo && $totalHorasMes) ? addHora($totalHorasMes, $intervalo) : $intervalo;
                  }else{
                    $intervalo = '00:00';
                  }
                  for($i =0; $i < ($intNumeroMaxMarcacao - count($arrTotal)); $i++){
                    echo ' <td>&nbsp;</td>';
                  }
                  echo '
                      <td>'.$intervalo.'</td>
                    </tr>
                    <tr>
                      <td>Total de Horas</td>
                      <td>'.$totalHorasMes.'</td>
                    </tr>
                  </tbody>
                  ';
                echo '
                 <thead>
                  <tr>
                    <th>Dia</th>';
                for($i = 0; $i < $numColunas; $i++){
                    echo ($i%2)?'<th>Saida</th>':'<th>Entrada</th>';
                }
                echo '
                    <th>Total</th>
                  </tr>
                </thead>
                ';

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
<?php
function addHora($atual, $somar){
  $arrAtual = explode(':', $atual);
  $arrSomar = explode(':', $somar);

  $segAtual = transformaSeg($arrAtual);
  $segSomar = transformaSeg($arrSomar);
  return transformaHoras($segAtual+$segSomar);
}

function transformaSeg($array){
  $segundos = 0;

  $segundos += $array[0] * 3600;
  $segundos += $array[1] * 60;

  return $segundos;
}

function transformaHoras($segundos){

  $horas = floor( $segundos / 3600 ); //converte os segundos em horas e arredonda caso nescessario
  $segundos %= 3600; // pega o restante dos segundos subtraidos das horas
  $minutos = floor( $segundos / 60 );//converte os segundos em minutos e arredonda caso nescessario
  $segundos %= 60;// pega o restante dos segundos subtraidos dos minutos

  return "{$horas}:".($minutos > 9 ? $minutos : '0'.$minutos);
}