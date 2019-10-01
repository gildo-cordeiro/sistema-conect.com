<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastrar Cliente</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link href="arquivos/css/gaia.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style.css" />
    
    <script  type="text/javascript" src="arquivos/js/MascarasCampo.js"></script>
</head>
<body>    
<div class="section section-header" id="home">
    <div class="parallax"  style="height:400px;">
        <div class="image" style="background-image: url('img/imagem1.jpg');"></div>
        <div class="container">
        <a href="index.php">
        <img src="img/logo.png" style="position:absolute;" height="30%" alt="Inicio">
        </a>
            <div class="content">
                <div class="title-area">
                    <h1 class="title-modern"  style="letter-spacing: 20px;">CADASTRAR</h1>
                    <h2 class="title-modern"  style="letter-spacing: 20px;">USUARIOS</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="col-md-12">
        <?php
            if (isset($_SESSION['erro'])) {
                echo "<br>";
                echo $_SESSION['erro'];
                unset($_SESSION['erro']);
                }
        ?>
        <h2 class="title">Cadastrar Cliente</h2>
                <form action="processarCliente.php" method="post" style="text-align: left;" name="formulario" id="form">
                    <div class="conntainer">
                    
                    <script>
                        function ValidarCampos1(){
                            let nome = document.getElementById('nome').value;let name = document.getElementById('Name').value;
                            let cpf = document.getElementById('cpf').value;let telefone = document.getElementById('telefone').value;
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
                                <label><h3>Dados Pessoais:</h3></label>
                            </div>
                            <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" placeholder="Ex: Gildo" name="nome">
                            </div>
                            <div class="form-group">
                            <label for="Name">Sobre Nome:</label>
                            <input type="text" class="form-control" id="Name" placeholder="Ex: Cordeiro Duarte" name="SobreName">
                            </div>
                            <div class="form-group cpf-mask">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" placeholder="Ex: 000.000.000-00" name="cpf" maxlength=14 onKeyup="MaskCPF(this);">
                            </div>
                            <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="text" class="form-control" id="telefone" placeholder="Ex: (DDD)XXXXXXXXX" name="telefone" maxlength=11 onKeyup="num(this);">
                            </div> 
                        </div>
                    </div>
                    <div class="conntainer">
                    <script>
                        function ValidarCampos2(){
                            let cep = document.getElementById('cep').value; let estado = document.getElementById('estado').value; let endereco = document.getElementById('endereco').value;
                            let cidade = document.getElementById('cidade').value;
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
                                <label><h3>Localização:</h3></label>
                            </div>
                            <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" class="form-control" id="cep" placeholder="Ex: 00000-000" name="cep" maxlength=9 onKeyup="MaskTelCEP(this);">
                            </div>
                            <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" id="estado" placeholder="Ex: Rio Grande do Norte" name="estado">
                            </div>
                            <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" placeholder="Ex: Rua 52 de José, 667, Centro" name="endereco">
                            </div>
                            <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" placeholder="Ex: New York" name="cidade">
                            </div>
                        </div>
                    </div>
                    <div class="conntainer">
                    <script>
                        function ValidarCampos3(){
                            let email = document.getElementById('email').value; let senha = document.getElementById('senha').value; 
                            let confirSenha = document.getElementById('confirSenha').value; 
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
                                <label><h3>Dados de Login:</h3></label>
                            </div> 
                            <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" id="email" placeholder="E-mail:" name="email">
                            </div>
                            <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" id="senha" placeholder="Senha:" name="senha">
                            </div>
                            <div class="form-group">
                            <label for="confirSenha">Confirma Senha:</label>
                            <input type="password" class="form-control" id="confirSenha" placeholder="Senha:" name="confirSenha">
                            </div>
                        </div>
                        <button type="submit" style="margin-left:2%;margin-top:10%;color:#ffffff;" class="btn btn-primary" name="cadastrar" onclick="return ValidarCampos1();">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
    <script src="arquivos/js/jquery.min.js" type="text/javascript"></script>
    <script src="arquivos/js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="arquivos/js/gaia.js"></script>
</body>
</html>