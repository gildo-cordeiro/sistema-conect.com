<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajuda</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link href="arquivos/css/gaia.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style2.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style3.css" />
    <script>
        function mostrar(elemente,el) {
        var classe = document.getElementById(elemente).className;
        if (classe == 'esconder') {
            document.getElementById(elemente).className = 'mostra';
            document.getElementById(el).src="img/glyphicons-602-chevron-down.png";
        }else{
            document.getElementById(elemente).className = 'esconder';
            document.getElementById(el).src="img/glyphicons-224-chevron-right.png";
        } 
    }
    </script>
    <script type="text/javascript" src="arquivos/js/MascarasCampo.js"></script>
    <style>
    .cor2{
        color:#ffffff !important;
    }
    .navbar{
        border-bottom:1px solid rgb(0,0,0);
        background-color:rgba(0,0,0);
    }
    @font-face{
        font-family: "Century Gothic";
    }
    .esconder {
        display: none;
    }
    .mostra{
        display: block;
    }
    hr{
        border-color:rgba(128,128,128,0.6); 
    }
    </style>
</head>
<body>
    <?php 
    if (isset($_SESSION['dados'])) {
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
    }else{
        include("includes/menuLogin.php");
    }
    ?>    
    <br><br><br>
    <div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><span  style="font-family:'Century Gothic';">Estou tendo problemas com</span></h2>
            </div> 
        </div>
        <div class="container">
            <hr>
            <div class="col-md-8 ml-auto">
                <h3 style="font-family:'Century Gothic';"><span>Acesso a conta e senha</span></h3>
                <p class="description" style="font-size:15px;font-family:'Century Gothic'!important;">Redefinições, Esqueci minha senha, Esqueci meu Login</p>
                <div id="info" class="esconder">
                    <ul class="list-group">
                        <li class="list-group-item" style="text-align:justify;">Se você está com problemas para redfinir senha <a href="javascript:void(0)" data-toggle="modal" data-target="#ModalVia" data-whatever="@mdo" style="color:#ff6600;">clique aqui</a>, e em seguida aparecerá
                        um janela onde deve informa seu E-mail. Logo após a verificação sua senha será enviada para o E-mail informado.
                        Este processo também pode ser feito na tala de Login.</li>
                        <br>
                        <li class="list-group-item" style="text-align:justify;">Se você esqueceu seu E-mail e senha <a href="javascript:void(0)" style="color:#ff6600;" data-toggle="modal" data-target="#ModalVia1" data-whatever="@mdo">clique aqui</a>, em seguida informe seu CPF e recuperaremos sua conta.</li>
                        <br>
                        <li class="list-group-item" style="text-align:justify;">Não é possivel mudar o E-mail utilizado no cadastro, devido a motivos de <strong>segurança</strong> esta informação deve
                        prevalecer imutavel. Caso ainda deseje mudar, por favor crie uma nova conta.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 mr-auto">
                <a href="javascript:void(0)" style="margin-left: 40%;" onclick="mostrar('info','img');";> 
                    <img id="img" style="margin-top:40px;" src="img/glyphicons-224-chevron-right.png"> 
                </a>
            </div>   
        </div>
        <hr>
        <div class="container">
            <div class="col-md-8 ml-auto">
                <h3 style="font-family:'Century Gothic';">Erro ao cadastrar meus dados</h3>
                <p class="description" style="font-size:15px;font-family:'Century Gothic';">CPF, E-mail, nome etc.</p>
                <div id="info2" class="esconder">
                    <ul class="list-group">
                        <li class="list-group-item" style="text-align:justify;">Verifique se informou os dados corretamente (Letras, numeros ou datas no campo adequado).</li>
                        <br>
                        <li class="list-group-item" style="text-align:justify;">Antes de criar uma nova conta, lembre-se que o E-mail não deve 
                        esta cadastrado no sistema, caso você ja tenha cadastro. Para voltar a tela de cadastro <a href="cadastro.php" style="color:#ff6600;">clique aqui.</a>
                        <br>
                        <strong><span style="color:red;">OBS.:</span> Caso você esteja logado e clicar na opção acima, fará você deslogar do sistema.</strong></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 mr-auto">
                <a href="#" style="margin-left: 40%;">
                    <img style="margin-top:40px;" id="img2" src="img/glyphicons-224-chevron-right.png" onclick="mostrar('info2','img2');">
                </a>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="col-md-8">
                <h3 style="font-family:'Century Gothic';">Fale conosco</h3>
                <p class="description" style="font-size:15px;font-family:'Century Gothic';">Entre em conato via E-mail.</p>
                <div id="info3" class="esconder">
                    <ul class="list-group">
                        <li class="list-group-item" style="text-align:justify;">Para mais informações entre em contato conosco: <br><strong>gildocordeiro2.0@gmail.com</strong> ou <strong>mhenrique008@gmail.com</strong></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <a href="#" style="margin-left: 40%;">
                    <img style="margin-top:40px;" id="img3" src="img/glyphicons-224-chevron-right.png" onclick="mostrar('info3','img3');">
                </a>
            </div>
        </div>
        <hr>
    </div>
</div>

<!--Modal recuperar senha-->
<div class="modal fade" id="ModalVia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="modal-title" id="LabelModal">Recuperar senha</h5>
                </div>
                <div class="col-md-6">
                    <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
          </div>
          <div class="modal-body">
            <form action="RecuperarSenha.php" method="post">
              <div class="form-group">
                <label for="message-text" class="col-form-label">E-mail</label>
                <input type="email" class="form-control" name="mail" id="valor" placeholder="Ex.: gildo@gmail.com" required>
                <label class="col-form-label" style="margin-top: -20px;"><code style="margin-top: -10px;">Insira o E-mail cadastrado para receber a senha por E-mail</code></label>
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
    <!--Modal para recuperar e-mail e senha pelo cpf-->
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
    <script type="text/javascript" src="arquivos/js/modernizr.js"></script>
    <script type="text/javascript" src="arquivos/js/gaia.js"></script>

</body>
</html>