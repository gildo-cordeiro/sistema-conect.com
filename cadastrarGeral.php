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
    <title>Cadastrar</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link href="arquivos/css/gaia.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style2.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style3.css" />
    <script  type="text/javascript" src="arquivos/js/MascarasCampo.js"></script>
    <style>
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
        
        .toLem{
                margin-top:-18px !important;
            }
        button{
            color: #ffffff !important;
        }
        .btn, .btn-primary{
            background-color:#ff6600 !important;
            border-color:#ff6600 !important;
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
        } else if ($_SESSION['adm']==false) {
            include("includes/menuFuncionario.php");
            $condicao = "upload/Funcionario/";
        }else if($_SESSION['adm']==true){
            include("includes/menuADM.php");
            $condicao = "upload/Administrador/";
        }
    }
?>   <br><br><br>
<div class="section">
    <div class="container">
        <div class="col-md-12">
            <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#cliente" data-toggle="tab" style="font-family:'Century Gothic';">Cadastrar Cliente</a></li>
                        <li><a href="#funcionario" data-toggle="tab">Cadastrar Funcionario</a></li>
                        <!--<li><a href="#Administrador" data-toggle="tab">Cadastrar Administrador</a></li>-->
                    </ul>
                    <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="cliente">
                    <?php
                            if (isset($_SESSION['erro'])) {
                                echo "<br>";
                                echo $_SESSION['erro'];
                                unset($_SESSION['erro']);
                                }
                        ?> 
                        <form action="processarCliente.php" method="post" style="text-align: left;" name="formulario" id="form1">
                                <script>
                                    function ValidarCampos1(){
                                        var nome = document.getElementById('nome').value;var name = document.getElementById('Name').value;
                                        var cpf = document.getElementById('cpf').value;var telefone = document.getElementById('telefone').value;
                                        if ((nome == "") || (Name == "")  || (cpf == "") || (telefone == "")) {
                                            alert('Preencha todos os campos!');
                                            return false;
                                        }else{
                                            ValidarCampos2();
                                            ValidarCampos3();
                                            return true;
                                        }
                                    }
                                </script>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><h3 style="font-family:'Century Gothic';">Dados Pessoais:</h3></label>
                                    </div>
                                    <div class="form-group">
                                    <label for="nome" style="font-family:'Century Gothic';">Nome:</label>
                                    <input type="text" class="form-control" id="nome" style="font-family:'Century Gothic';" placeholder="Ex: Gildo" name="nome">
                                    </div>
                                    <div class="form-group">
                                    <label for="Name" style="font-family:'Century Gothic';">Sobre Nome:</label>
                                    <input type="text" class="form-control" style="font-family:'Century Gothic';" id="Name" placeholder="Ex: Cordeiro Duarte" name="SobreName">
                                    </div>
                                    <div class="form-group cpf-mask">
                                    <label for="cpf" style="font-family:'Century Gothic';">CPF:</label>
                                    <input type="text" style="font-family:'Century Gothic';" class="form-control" id="cpf" placeholder="Ex: 000.000.000-00" name="cpf" maxlength=14 onKeyup="MaskCPF(this);">
                                    </div>
                                    <div class="form-group">
                                    <label for="telefone" style="font-family:'Century Gothic';">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" style="font-family:'Century Gothic';"placeholder="Ex: (DDD)XXXXXXXXX" name="telefone" maxlength=11 onKeyup="num(this);">
                                    </div> 
                                </div>
                            <script>
                                function ValidarCampos2(){
                                    var cep = document.getElementById('cep').value; var estado = document.getElementById('estado').value; var endereco = document.getElementById('endereco').value;
                                    var cidade = document.getElementById('cidade').value;
                                    if ((cep == "") || (estado == "") || (endereco == "") || (cidade == "")) {
                                        alert('Preencha todos os campos!');
                                        return false;
                                    }else{
                                        return true;
                                    }
                                }
                            </script>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><h3 style="font-family:'Century Gothic';">Localização:</h3></label>
                                    </div>
                                    <div class="form-group">
                                    <label for="cep" style="font-family:'Century Gothic';">CEP:</label>
                                    <input type="text" style="font-family:'Century Gothic';" class="form-control" id="cep" placeholder="Ex: 00000-000" name="cep" maxlength=9 onKeyup="MaskTelCEP(this);">
                                    </div>
                                    <div class="form-group">
                                    <label for="estado" style="font-family:'Century Gothic';">Estado:</label>
                                    <input type="text" class="form-control" id="estado" placeholder="Ex: Rio Grande do Norte" name="estado">
                                    </div>
                                    <div class="form-group">
                                    <label for="endereco" style="font-family:'Century Gothic';">Endereço:</label>
                                    <input type="text"  style="font-family:'Century Gothic';"class="form-control" id="endereco" placeholder="Ex: Rua 52 de José, 667, Centro" name="endereco">
                                    </div>
                                    <div class="form-group">
                                    <label for="cidade" style="font-family:'Century Gothic';">Cidade:</label>
                                    <input type="text" style="font-family:'Century Gothic';" class="form-control" id="cidade" placeholder="Ex: New York" name="cidade">
                                    </div>
                                </div>
                            <script>
                                function ValidarCampos3(){
                                    var email = document.getElementById('email').value; var senha = document.getElementById('senha').value; 
                                    var confirSenha = document.getElementById('confirSenha').value; 
                                    if ((email == "") || (senha == "") || (confirSenha == "")) {
                                        alert('Preencha todos os campos!');
                                        return false;
                                    }else{
                                        if (senha != confirSenha) {
                                            alert('Campos de senhas com valores diferentes.');
                                            return false;
                                        }else{
                                            return true;
                                        }
                                    }
                                }
                            </script>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><h3 style="font-family:'Century Gothic';">Dados de Login:</h3></label>
                                    </div> 
                                    <div class="form-group">
                                    <label for="email" style="font-family:'Century Gothic';">E-mail:</label>
                                    <input type="email" style="font-family:'Century Gothic';"class="form-control" id="email" placeholder="E-mail:" name="email">
                                    </div>
                                    <div class="form-group">
                                    <label for="senha" style="font-family:'Century Gothic';">Senha:</label>
                                    <input type="password" style="font-family:'Century Gothic';"class="form-control" id="senha" placeholder="Password:" name="senha">
                                    </div>
                                    <div class="form-group">
                                    <label for="confirSenha" style="font-family:'Century Gothic';">Confirma Senha:</label>
                                    <input type="password" style="font-family:'Century Gothic';"class="form-control" id="confirSenha" placeholder="Password:" name="confirSenha">
                                    </div>
                                </div> <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" style="color:#ffffff;" class="btn btn-primary" name="cadastrarcl" onclick="return ValidarCampos1();">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!------------------------------------->
                    <div class="tab-pane fade" id="funcionario">
                        <?php
                            if (isset($_SESSION['erro'])) {
                                echo "<br>";
                                echo $_SESSION['erro'];
                                unset($_SESSION['erro']);
                                }
                        ?>
                        <form action="processarCliente.php" method="post" style="text-align: left;" name="formulario" id="form2">
                            <script>
                                function ValidarCampos6(){
                                    var nome = document.getElementById('nome2').value;var name = document.getElementById('Name2').value;
                                    var cpf = document.getElementById('cpf2').value;var telefone = document.getElementById('telefone2').value;
                                    if (nome == "" || Name == ""  || cpf == "" || telefone == "") {
                                        alert('Preencha todos os campos');
                                        return false;
                                    }else{
                                        if (ValidarCampos7()){
                                            return true;
                                        }else{
                                            return false;
                                        }
                                    }
                                }
                            </script>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><h3 style="font-family:'Century Gothic';">Dados Pessoas:</h3></label>
                                </div>
                                <div class="form-group">
                                <label for="nome" style="font-family:'Century Gothic';">Nome:</label>
                                <input type="text" style="font-family:'Century Gothic';"class="form-control" id="nome2" placeholder="Ex: Gildo" name="nome">
                                </div>
                                <div class="form-group">
                                <label for="Name" style="font-family:'Century Gothic';">Sobre Nome:</label>
                                <input type="text" class="form-control" id="Name2" placeholder="Ex: Cordeiro Duarte" name="SobreName">
                                </div>
                                <div class="form-group cpf-mask">
                                <label for="cpf" style="font-family:'Century Gothic';">CPF:</label>
                                <input type="text" style="font-family:'Century Gothic';"class="form-control" id="cpf2" placeholder="Ex: 000.000.000-00" name="cpf" maxlength=14 onKeyup="MaskCPF(this);">
                                </div>
                                <div class="form-group">
                                <label for="telefone" style="font-family:'Century Gothic';">Telefone:</label>
                                <input type="text" class="form-control" id="telefone2" placeholder="Ex: (DDD)XXXXXXXXX" name="telefone" maxlength=11 onKeyup="num(this);">
                                </div> 
                            </div>
                            <script>
                                function ValidarCampos7(){
                                    var email = document.getElementById('email2').value; var senha = document.getElementById('senha2').value; 
                                    var confirSenha = document.getElementById('confirSenha2').value; 
                                    if (email == "" || senha == "" || confirSenha == "") {
                                        alert('Preencha todos os campos!');
                                        return false;
                                    }else{
                                        if (senha != confirSenha) {
                                            alert('Campos de senhas com valores diferentes.');
                                            return false;
                                        }else{
                                            return true;
                                        }
                                    }
                                }
                            </script>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><h3 style="font-family:'Century Gothic';">Dados de Login:</h3></label>
                                </div> 
                                <div class="form-group">
                                <label for="email" style="font-family:'Century Gothic';">E-mail:</label>
                                <input type="email" style="font-family:'Century Gothic';" class="form-control" id="email2" placeholder="E-mail:" name="email">
                                </div>
                                <div class="form-group">
                                <label for="senha" style="font-family:'Century Gothic';">Senha:</label>
                                <input type="password" style="font-family:'Century Gothic';" class="form-control" id="senha2" placeholder="Password:" name="senha">
                                </div>
                                <div class="form-group">
                                <label for="confirSenha" style="font-family:'Century Gothic';">Confirma Senha:</label>
                                <input type="password" style="font-family:'Century Gothic';" class="form-control" id="confirSenha2" placeholder="Password:" name="confirSenha">
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-10">
                                    <?php  
                                    if ($_SESSION['admin']==true){
                                        echo "<label class='pull-left' style='margin-left:14px;font-family:'Century Gothic';'><input type='checkbox' name='opcao'>Administrador</label>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" style="margin-left:14px;color:#ffffff;" class="btn btn-primary" name="cadastrarfun" onclick="return ValidarCampos6();">Cadastrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
    <script src="arquivos/js/jquery.min.js" type="text/javascript"></script>
    <script src="arquivos/js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="arquivos/js/gaia.js"></script>
    <script type="text/javascript" src="arquivos/js/modernizr.js"></script>
    <script type="text/javascript" src="arquivos/js/scroll.js"></script>
</body>
</html>