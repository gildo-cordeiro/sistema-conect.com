<?php
include("conexaoBD.php");
session_start();
if (!isset($_SESSION['autenticar'])) {
    session_destroy();
    header("location: login.php");
}else{
    if(!$_SESSION['autenticar']){
        session_destroy();
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Planos de Internet</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link href="arquivos/css/gaia.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style2.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style3.css" />
    <script language="javascript">
        function numerico(obj , e) {
            var tecla = (window.event) ? e.keyCode : e.which;
            if (tecla == 8 || tecla == 0)
                return true;
            if (tecla != 44 && tecla < 48 || tecla > 57)
                return false;
        }
        function mostrar(elemente,el) {
            var classe = document.getElementById(elemente).className;
            if (classe == 'esconder') {
                document.getElementById(elemente).className = 'mostra';
                document.getElementById(el).innerHTML ='Visualizar -';
            }else{
                document.getElementById(elemente).className = 'esconder';
                document.getElementById(el).innerHTML ='Visualizar +';
            }
        }
    </script>
    <style>
    .cor2{
        color:#ffffff !important;
    }
    .navbar{
        border-bottom:1px solid rgba(0,0,0,0.3);
        background-color:rgb(0,0,0);
    }
    @font-face{
        font-family: "Century Gothic";
    }
    .esconder {
        height: 350px; /* limita a altura aqui, assim irá limitar o texto*/
        overflow: hidden;
        /*border-bottom:1px solid #ff3300;*/
    }
    .mostra{
        height: auto; /* limita a altura aqui, assim irá limitar o texto*/
    }
    #check{
        visibility:hidden;
    }
    </style>
</head>
<body >
<?php 
    $tabela = $_SESSION['dados'];
    $qtde_linhas = $_SESSION['i'];
    for ($i=0; $i < $qtde_linhas; $i++) { 
        if (isset($tabela[$i][8])) {    
            include("includes/menuCliente.php");
        } else if ($_SESSION['admin']==false) {
            include("includes/menuFuncionario.php");
        }else if($_SESSION['admin']==true){
            include("includes/menuADM.php");
        }
    }
?> 
<br><br><br>

<div class="section">
    <div class='container'>
        <div class='row'>
            <div class='col-xs-12 col-sm-4 col-md-12'>
                <p style="font-family:'Century Gothic';"><strong>Categoria.</strong></p>
                <h3 style="font-family:'Century Gothic';"><strong>Residencial ou empresarial - Rádio<strong></h3>
            </div>
        </div>
    </div>
    <?php
        if (isset($_SESSION['erro'])) {
        echo $_SESSION['erro'];
        unset($_SESSION['erro']);
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="esconder" id="radio">
                <div class="col-md-12">
                    <div>
                    <?php
                    if(isset($_SESSION['planos_radio'])){
                    $planos_radio = $_SESSION['planos_radio'];
                    $qtdeR = $_SESSION['r'];
                    for ($i=0; $i < $qtdeR; $i++) { 
                    echo "
                        <div class='col-md-6 col-xs-12 col-sm-4'>
                            <div class='card card-member' style='border-bottom: 5px solid rgb(255,102,0);'>
                                <span class='spanPlan' style='font-family:'Century Gothic';'>R$ ".$planos_radio[$i][5]." DE DESCONTO</span>
                                <div class='content' style='border-left: 1px solid rgba(0,0,0,0.1);border-top: 1px solid rgba(0,0,0,0.1);'>
                                <!--cabeçalho---->
                                    <form action='planos2.php' method='post'>
                                    <div class='col-xs-12 col-sm-4 col-md-8'>
                                        <p style='font-size:30px;color:#ff3300;font-family:'Century Gothic';'><strong>".$planos_radio[$i][1]."</strong></p>
                                        <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> WiFi</strong> Fora de casa</p>
                                        <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> Modem</strong> com WiFi</p>
                                        <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> Conect Play</strong></p>";
                                        //if (isset($_SESSION['admin'])) {
                                            echo "<p style='font-family:'Century Gothic';'><input type='checkbox' style='font-family:'Century Gothic';' name='id[]' id='check' checked value='".$planos_radio[$i][0]."'><strong>ID: ".$planos_radio[$i][0]."</strong></p>";
                                        //}
                                    echo "
                                    </div>
                                    <div class='col-xs-12 col-sm-4 col-md-4'> 
                                    <p style='font-size:30px;font-family:'Century Gothic';'><strong>".$planos_radio[$i][2]."</strong></p>
                                    <p style='margin-top:-35px; margin-left:40px;font-family:'Century Gothic';'><strong>\MÊS</strong><sup></p>";
                                    if (isset($_SESSION['admin'])) {
                                       
                                    }else{
                                        echo "<input type='submit' class='btn btn-primary' style='color:#ffffff;text-transform:capitalize;' name='pedido' value='Fazer &nbsp;Pedido'>";
                                    }
                                    echo "
                                    </div>  
                                    </form>
                                    <br><br><br><br><br><br><br><br><br><br><br>
                                        <div class='card-body'>
                                            <p class='card-text' style='text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';position:absolute;'>Nos Combos de 104,90/mês</p>
                                            <p class='card-text' style='text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';'>Download: até ".$planos_radio[$i][3]."Mbps. Upload: até ".$planos_radio[$i][4]."Mbps</p>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            }
                        }
                            ?>
                            </div>
                        </div> 
                        <!---->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="javascript:void(0)" role="button" class="btn btn-primary" style="color:#ffffff;margin-top:-35px;" id="rad" onclick="mostrar('radio',this);";>Visualizar +</a>
            </div>
        </div>
    </div>
    <br>
    <div class='container'>
        <div class='row'>
            <div class='col-xs-12 col-sm-4 col-md-12'>
                <p style="font-family:'Century Gothic';"><strong>Categoria.</strong></p>
                <h3 style="font-family:'Century Gothic';"><strong>Residencial ou empresarial - Cabo<strong></h3>
            </div>
        </div>
    </div>
    <div class='container'>
        <div class='row'>
            <div class="esconder" id="cabo">
                <div class='col-md-12'>
                    <div>
                    <?php
                    if (isset($_SESSION['planos_cabo'])) {
                    $planos_cabo = $_SESSION['planos_cabo'];
                    $qtde = $_SESSION['c'];
                    for ($i=0; $i < $qtde; $i++) { 
                    echo "
                        <div class='col-md-6 col-xs-12 col-sm-4'>
                            <div class='card card-member' style='border-bottom: 5px solid rgb(255,102,0);'>
                                <span class='spanPlan' style='font-family:'Century Gothic';'>R$ ".$planos_cabo[$i][5]." DE DESCONTO</span>
                                <div class='content' style='border-left: 1px solid rgba(0,0,0,0.1);border-top: 1px solid rgba(0,0,0,0.1);'>
                                <!--cabeçalho---->
                                <form action='planos2.php' method='post'>
                                    <div class='col-xs-12 col-sm-4 col-md-8'>
                                        <p style='font-size:30px;color:#ff3300;font-family:'Century Gothic';'><strong>".$planos_cabo[$i][1]."</strong></p>
                                        <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> WiFi</strong> Fora de casa</p>
                                        <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> Modem</strong> com WiFi</p>
                                        <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> Conect Play</strong></p>";
                                        //if (isset($_SESSION['admin'])) {
                                            echo "<p style='font-family:'Century Gothic';'><input type='checkbox' style='font-family:'Century Gothic';' name='id[]' id='check' checked value='".$planos_cabo[$i][0]."'><strong>ID: ".$planos_cabo[$i][0]."</strong></p>";
                                        //}
                                    echo "
                                    </div>
                                    <div class='col-xs-12 col-sm-4 col-md-4'> 
                                    <p style='font-size:30px;font-family:'Century Gothic';'><strong>".$planos_cabo[$i][2]."</strong></p>
                                    <p style='margin-top:-40px; margin-left:40px;font-family:'Century Gothic';'><strong>\MÊS</strong><sup></p>";
                                    if (isset($_SESSION['admin'])) {
                                        

                                    }else{
                                        echo "<input type='submit' class='btn btn-primary' style='color:#ffffff;text-transform:capitalize;' name='pedido' value='Fazer &nbsp;Pedido'>";
                                    } 
                                    echo "
                                    </div>  
                                    </form>
                                    <br><br><br><br><br><br><br><br><br><br><br>
                                        <div class='card-body'>
                                            <p class='card-text' style='text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';position:absolute;'>Nos Combos de 104,90/mês</p>
                                            <p class='card-text' style='text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';'>Download: até ".$planos_cabo[$i][3]."Mbps. Upload: até ".$planos_cabo[$i][4]."Mbps</p>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            }
                        }
                            ?>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="javascript:void(0)" role="button" class="btn btn-primary"  style="color:#ffffff;" id='cab' onclick="mostrar('cabo',this);";>Visualizar +</a>
            </div>
        </div>
    </div>
</div>
<?php 
if(isset($_SESSION['admin'])){
    echo "
    <hr style='border:0.5px solid #ff6600;'>
    <div class='container'>
        <div>
            <br>
            <button class='btn btn-primary col-xs-12 col-sm-12 col-md-5 col-md-offset-1' style='color:#ffffff;' data-toggle='modal' data-target='#ModalVia' data-whatever='@mdo'>Novos planos</button>
            <button class='btn btn-primary col-xs-12 col-sm-12 col-md-5 col-md-offset-1' style='color:#ffffff;' data-toggle='modal' data-target='#ModalDel' data-whatever='@mdo'>Deletar planos</button>
        </div>
    </div>";
    }
?>

    <br><br><br><br>
    <div class="modal fade" id="ModalVia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="modal-title" id="LabelModal" style="font-family:'Century Gothic';color:#ff3300;">Cadastrar novos planos</h3>
                </div>
                <div class="col-md-6">
                    <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
          </div>
          <div class="modal-body">
            <form action="ProcessarPlanos.php" method="post">
              <div class="form-group">
                <label for="message-text" class="col-form-label" style="font-family:'Century Gothic';">Megabytes:</label>
                <select name="mega" class="form-control" style="font-family:'Century Gothic';">
                    <option value="15 Mega">15 Mega</option>
                    <option value="25 Mega">25 Mega</option>
                    <option value="45 Mega">45 Mega</option>
                    <option value="45 Mega">60 Mega</option>
                    <option value="45 Mega">75 Mega</option>
                    <option value="45 Mega">90 Mega</option>
                    <option value="45 Mega">105 Mega</option>
                </select>
                <label for="message-text" class="col-form-label" style="font-family:'Century Gothic';">Preço:</label>
                <input type="text" name="preco" class="form-control" placeholder="R$ 00,00" style="font-family:'Century Gothic';" onkeypress="return numerico(this, event);">
                
                <label for="message-text" class="col-form-label" style="font-family:'Century Gothic';">Desconto:</label>
                <br>
                <div class="radio-inline">
                    <label><input type="radio" name="desconto" value="25,00" checked>25,00</label>
                </div>
                <div class="radio-inline">
                    <label><input type="radio" name="desconto" value="50,00">50,00</label>
                </div>
                <div class="radio-inline">
                    <label><input  type="radio" name="desconto" value="75,00">75,00</label>
                </div>
                <br><br>
                <label for="message-text" class="col-form-label" style="font-family:'Century Gothic';">Tipo:</label>
                <br>
                <div class="radio-inline">
                    <label><input  type="radio" name="tipo" style="font-family:'Century Gothic';" value="Radio"checked>Radio</label>
                </div>
                <div class="radio-inline">
                    <label><input  type="radio" name="tipo" style="font-family:'Century Gothic';" value="Cabo">Cabo</label>
                </div>
                <br><br>
                <div class="col-md-6">
                    <label for="message-text" class="col-form-label" style="font-family:'Century Gothic';">Download</label>
                    <input type="number" name="dow" class="form-control" style="font-family:'Century Gothic';">
                </div>
                <div class="col-md-6">
                    <label for="message-text" class="col-form-label" style="font-family:'Century Gothic';">Upload</label>
                    <input type="number" name="up" class="form-control" style="font-family:'Century Gothic';">
                </div>
                <br><br><br>
                <!--<label class="col-form-label" style="margin-top: -20px;"><code style="margin-top: -10px;">Informe seu CPF</code></label>-->
              </div>
          </div>
          <div class="modal-footer">
            <!--<button type="reset" class="btn btn-danger" data-dismiss="modal" style="color:#ffffff;background-color:red !important;border-color:red !important;">Cancelar</button>-->
            <button name="enviar" type="submit" class="btn btn-outline-success btn-lg btn-block"style="color:#ff6600;border-color:#ff6600 !important;">Enviar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="modal-title" id="LabelModal" style="font-family:'Century Gothic';color:#ff3300;">Dletar plano</h3>
                </div>
                <div class="col-md-6">
                    <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
          </div>
          <div class="modal-body">
            <form action="ProcessarPlanos.php" method="post">
              <div class="form-group">
                <label for="message-text" class="col-form-label" style="font-family:'Century Gothic';">Identificadores:</label>
                <?php
                 if(isset( $_SESSION['planos'])){
                    $planos = $_SESSION['planos'];
                    $qtde = $_SESSION['t'];
                    echo "<select name='id' class='form-control' style='font-family:'Century Gothic';'>";
                    for ($i=0; $i < $qtde; $i++) { 
                        echo "<option value='".$planos[$i][0]."'>".$planos[$i][0]."</option>";
                    }
                    echo "</select>";
                }
                ?>
                <!--<label class="col-form-label" style="margin-top: -20px;"><code style="margin-top: -10px;">Informe seu CPF</code></label>-->
              </div>
          </div>
          <div class="modal-footer">
            <!--<button type="reset" class="btn btn-danger" data-dismiss="modal" style="color:#ffffff;background-color:red !important;border-color:red !important;">Cancelar</button>-->
            <button name="del" type="submit" class="btn btn-outline-success btn-lg btn-block"style="color:#ff6600;border-color:#ff6600 !important;">Deletar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php include("includes/footer.php")?>
    <script src="arquivos/js/jquery.min.js" type="text/javascript"></script>
    <script src="arquivos/js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="arquivos/js/modernizr.js"></script>
    <script type="text/javascript" src="arquivos/js/gaia.js">
    </script><script type="text/javascript" src="arquivos/js/scroll.js"></script>
</body>
</html>