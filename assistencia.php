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
    <title>Ajuda</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link href="arquivos/css/gaia.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="arquivos/css/style.css" />
    <link rel="stylesheet" type="text/css" href="arquivos/css/style2.css" />
    <link rel="stylesheet" type="text/css" href="arquivos/css/style3.css" />
    <style type="text/css">
    .cor2{
        color:#ffffff !important;
    }
    .navbar{
        border-bottom:1px solid rgb(0,0,0);
        background-color:rgba(0,0,0);
    }
    @font-face{
        font-family: "helvetica";
        src: url("arquivos/fontes/helvetica/HELR45W.ttf");
    }
    ::-webkit-input-placeholder {
       color: rgba(128,128,128,0.6) !important;
    }
    .well{
        background-color:rgba(128,128,128,0.6)  !important;
        /*box-shadow: 5px 5px 5px 5px black;*/
    }
    a{
        color:#ff6600;
    }
    a:hover{
        color:#ff6600;
        border-bottom: 1px solid #ff6600;
    }
    </style>
</head>
<body>
    <?php 
    $tabela = $_SESSION['dados'];
    $qtde_linhas = $_SESSION['i'];
    for ($i=0; $i < $qtde_linhas; $i++) { 
        if (isset($tabela[$i][8])) {    
            include("includes/menuCliente.php");
            $condicao = "upload/Cliente/";
        } else if ($_SESSION['admin']==false) {
            include("includes/menuFuncionario.php");
            $condicao = "upload/Funcionario/";
        }else if($_SESSION['admin']==true){
            include("includes/menuADM.php");
            $condicao = "upload/Administrador/";
        }
    }
    ?>    
    <br><br><br>
    <div class="section">
        <div class="container">
            <div class="row">
                <?php
                    if (isset($_SESSION['erro'])) {
                    echo $_SESSION['erro'];
                    unset($_SESSION['erro']);
                    }
                ?>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h2><!--<img height="40px" src="img/glyphicons-341-globe.png">--> Assistência Técnica</h2>
                    <hr>
                </div> 
            </div>
        <div class="row">
            <div class="col-md-6">
                <form action="ProcessarAssistencia.php" method="post" style="text-align: left;" name="formulario">
                    <div class="form-group">
                    <label for="nome">Nome:</label> 
                    <input type="text" class="form-control" name="nome" value="<?php
                    $tabela = $_SESSION['dados'];
                    $qtde_linhas = $_SESSION['i'];
                    for ($i=0; $i < $qtde_linhas; $i++) {
                            echo $tabela[$i][0]." ".$tabela[$i][1]; 
                        }
                    ?>">
                    </div>
                    <div class="form-group" style="width:160px;">
                    <label for="data">Data desejada:</label>
                    <input type="date" class="form-control" name="data" min="<?php echo date('Y-m-d',strtotime("+3 day"));?>">
                    </div>
                    <label style="margin-top: -20px;position:absolute;"><code><?php echo "Data mínima para escolha ".date_format(new DateTime(date('Y-m-d',strtotime("+3 day"))),"d/m/Y");?></code></label>
                    <br>
                    <div class="form-group">
                    <label for="motivo">Motivo:</label>
                        <select name="motivo" id="" class="form-control" style="width:260px;">
                            <option value="Roteador quebrado">Roteador quebrado</option>
                            <option value="Internet lenta">Internet lenta</option>
                            <option value="Troca dos cabos de internet">Troca dos cabos de internet</option>
                            <option value="Troca de outros aparelhos">Troca de outros aparelhos</option>
                            <option value="Cancelar internet">Cancelar internet</option>
                            <option value="Outro motivo">Outro motivo</option>
                        </select>
                        <label for="desc">Deseja escrever algo? Utilize o campo abaixo.</label>
                    <textarea class="form-control" id="motivo" rows="7" name="desc" placeholder="Ex: Meu roteador esta com defeito e desejo que consertem." name="motivo"></textarea>
                    </div>
                    <button type="submit" style="color:#ffffff;" class="btn btn-primary" name="enviar">Enviar</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="col-md-offset-3"0>
                    <h3>Baixe PDF's que podem te auxiliar!</h3>
                    <ul style="margin-left:-25px">
                        <br>
                        <li><a href="arquivos/PI.pdf">Como instalar um roteador!</a></li>
                        <br>
                        <li><a href="arquivos/PI.pdf">Como instalar um roteador!</a></li>
                        <br>
                        <li><a href="arquivos/PI.pdf">Como instalar um roteador!</a></li>
                        <br>
                        <li><a href="arquivos/PI.pdf">Como instalar um roteador!</a></li>
                        <br>
                        <li><a href="arquivos/PI.pdf">Como instalar um roteador!</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalVia1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="modal-title" id="LabelModal">Recuperar conta</h5>
                </div>
                <div class="col-md-6">
                    <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            </div>
            <div class="modal-body">
            <form action="javascript:void(0)" method="post">
                <div class="form-group">
                <label for="message-text" class="col-form-label">CPF</label>
                <input type="text" class="form-control" placeholder="Ex: 000.000.000-00" name="cpf" maxlength=14 onKeyup="MaskCPF(this);" required>
                <label class="col-form-label" style="margin-top: -20px;"><code style="margin-top: -10px;">Informe seu CPF</code></label>
                </div>
            </div>
            <div class="modal-footer">
            <!--<button type="reset" class="btn btn-danger" data-dismiss="modal" style="color:#ffffff;background-color:red !important;border-color:red !important;">Cancelar</button>-->
            <button name="rec" type="submit" class="btn btn-outline-success btn-lg btn-block"style="color:green;border-color:green !important;">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
    <script src="arquivos/js/jquery.min.js" type="text/javascript"></script>
    <script src="arquivos/js/bootstrap.js" type="text/javascript"></script>

    <!--  js library for devices recognition -->
    <script type="text/javascript" src="arquivos/js/modernizr.js"></script>

    <!--  script for google maps   -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
    <script type="text/javascript" src="arquivos/js/gaia.js"></script>

</body>
</html>