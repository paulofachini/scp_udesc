<style type="text/css">
  body {
    padding-top: 20px;
  }

  .footer {
    border-top: 1px solid #eee;
    margin-top: 40px;
    padding-top: 40px;
    padding-bottom: 40px;
  }

  /* Main marketing message and sign up button */
  .jumbotron {
    text-align: center;
    background-color: transparent;
  }

  .jumbotron .btn {
    font-size: 21px;
    padding: 14px 24px;
  }

  /* Customize the nav-justified links to be fill the entire space of the .navbar */
  .nav-justified {
    background-color: #eee;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  .nav-justified > li > a {
    padding-top: 15px;
    padding-bottom: 15px;
    color: #777;
    font-weight: bold;
    text-align: center;
    border-bottom: 1px solid #d5d5d5;
    background-color: #e5e5e5;
    /* Old browsers */
    background-repeat: repeat-x;
    /* Repeat the gradient */
    background-image: -moz-linear-gradient(top, #f5f5f5 0%, #e5e5e5 100%);
    /* FF3.6+ */
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #e5e5e5));
    /* Chrome,Safari4+ */
    background-image: -webkit-linear-gradient(top, #f5f5f5 0%, #e5e5e5 100%);
    /* Chrome 10+,Safari 5.1+ */
    background-image: -ms-linear-gradient(top, #f5f5f5 0%, #e5e5e5 100%);
    /* IE10+ */
    background-image: -o-linear-gradient(top, #f5f5f5 0%, #e5e5e5 100%);
    /* Opera 11.10+ */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#e5e5e5', GradientType=0);
    /* IE6-9 */
    background-image: linear-gradient(top, #f5f5f5 0%, #e5e5e5 100%);
    /* W3C */
  }

  .nav-justified > .active > a, .nav-justified > .active > a:hover, .nav-justified > .active > a:focus {
    background-color: #ddd;
    background-image: none;
    box-shadow: inset 0 3px 7px rgba(0, 0, 0, .15);
  }

  .nav-justified > li:first-child > a {
    border-radius: 5px 5px 0 0;
  }

  .nav-justified > li:last-child > a {
    border-bottom: 0;
    border-radius: 0 0 5px 5px;
  }

  @media (min-width: 768px) {
    .nav-justified {
      max-height: 52px;
    }

    .nav-justified > li > a {
      border-left: 1px solid #fff;
      border-right: 1px solid #d5d5d5;
    }

    .nav-justified > li:first-child > a {
      border-left: 0;
      border-radius: 5px 0 0 5px;
    }

    .nav-justified > li:last-child > a {
      border-radius: 0 5px 5px 0;
      border-right: 0;
    }
  }

  /* Responsive: Portrait tablets and up */
  @media screen and(min-width: 768px) {
    /* Remove the padding we set earlier */
    .masthead, .marketing, .footer {
      padding-left: 0;
      padding-right: 0;
    }
  }

  .control-label {
    width: 250px;
    text-align: left;
  }

  .form-group {
    padding-bottom: 30px;
  }
</style>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Configura&ccedil;&#245;es</h1>
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
            <form role="form" id="cadtipospessoas" name="cadtipospessoas" action="<?php echo URL; ?>configuracoes/editConfiguracoes" method="post">
              <div class="form-group">
                <?php
                foreach ($configuracoes as $conf) {
                ?>
                  <div class="form-group" style="clear: left">
                    <label class="control-label pull-left"><?php echo utf8_encode($conf->label);?></label>

                    <div class="controls">
                      <input id="<?php echo $conf->chave;?>" name="<?php echo $conf->chave;?>" value="<?php echo $conf->valor;?>"  type="text" class="form-control pull-left" style="width: 80px;" value="8:00"/>
                    </div>
                  </div>
                <?
                }
                ?>
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