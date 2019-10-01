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
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Assistência Tecnica</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link href="arquivos/css/gaia.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style2.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style3.css" />
    <style>
        .cor2{
            color:#ffffff !important;
        }
        .navbar{
            border-bottom:1px solid rgba(0,0,0,0.3);
            background-color:rgb(0,0,0);
        }
        button{
            color:#ff6600 !important;
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
        } else if ($_SESSION['admin']==false) {
            include("includes/menuFuncionario.php");
        }else if($_SESSION['admin']==true){
            include("includes/menuADM.php");
        }
    }
?> 
<br><br><br><br>
<div class="section">
    <div class="container">
        <div class="row">
            <hr>
            <form action="ProcessarAssistencia.php" method="post">
                <div class="form-group col-md-4 col-sm-6">
                    <label for="client">Solicitações de assistência tecnica:</label>
                    <input type="text" class="form-control" id="client" name="nome" placeholder="Nome do solicitante">
                    <!--<label style="margin-top: -20px;position:absolute;"><code style="font-size:10px;color:#ff6600;">Utilize: Nome, E-mail ou CPF (CPF no formato: 000.000.000-00)</code></label>-->
                </div>
                <div class="form-group col-md-2  col-sm-6" style="margin-top:22px;">
                    <button type="submit" class="btn btn-outline-success btn-md btn-block" name="Pesquisar" >Pesquisar <img src="img/lup.png" alt=""></button>
                </div>
                <div class="form-group col-md-2  col-sm-6" style="margin-top:22px;">
                    <button type="submit" class="btn btn-outline-success btn-md btn-block" name="Atualizar">Atualizar <img src="img/glyphicons-82-refresh.png" alt=""></button>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                        <table class="table  table-striped table-hover">
                            <caption class="text-center" style="font-family:'Century Gothic';background-color:#ff3300;color:#ffffff;font-size:12pt;font-weight:bolder;">DADOS DAS SOLITAÇÕES</caption>
                            <thead style="color:#000000;font-family:'Century Gothic';">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome do Solicitante</th>
                                    <th scope="col">Data desejada</th>
                                    <th scope="col">Motivo</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Usuário</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(isset($_SESSION['assist'])){
                                $assist = $_SESSION['assist'];
                                $qtde_linhas = $_SESSION['a'];
                                for ($i=0; $i < $qtde_linhas; $i++) { 
                                    echo "<tr>";
                                    echo "<td>".$assist[$i][0]."</td>";
                                    echo "<td>".$assist[$i][1]."</td>";
                                    echo "<td>".date_format(new DateTime($assist[$i][2]),"d/m/Y")."</td>";
                                    echo "<td>".$assist[$i][3]."</td>";
                                    echo "<td>".$assist[$i][4]."</td>";
                                    echo "<td>".$assist[$i][5]."</td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr>";
                                echo "<td>--</td>";
                                echo "<td>--</td>";
                                echo "<td>--</td>";
                                echo "<td>--</td>";
                                echo "<td>--</td>";
                                echo "<td>--</td>";
                                echo "<td>--</td>";
                                echo "<td>--</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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