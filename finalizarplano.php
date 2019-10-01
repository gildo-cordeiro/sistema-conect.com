<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finalizar plano</title>
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
        .caixa{
            margin: 0 auto;
            margin-top:60px;
            padding-left: 10px;
            padding-right: 10px;
            height:600px !important;
            border: 1px solid #808080;
            border-radius: 6px;
            width:100%;
        }
        .plano{
            margin-top:25px;
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
<div class="section">
    <div class='container'>
        <div class='content'>
            <div class="caixa">
                <div class="plano">
                    <div class='col-md-12'>
                        <div class="row">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2">
                                    <h1 style="font-family:'Century Gothic';">Antigo</h1>
                                </div><div class="col-md-4 col-md-offset-2">
                                    <h1 style="font-family:'Century Gothic';">Novo</h1>
                                </div>
                            </div>
                            
                                <?php
                                if (isset($_SESSION['plan'])) {
                                $planos = $_SESSION['plan'];
                                $qtde = $_SESSION['p'];
                                for ($i=0; $i < $qtde; $i++) { 
                                echo "
                                <div class='col-md-6 col-xs-12 col-sm-4'>
                                    <div class='card card-member' style='border-bottom: 5px solid rgb(255,102,0);'>
                                        <span class='spanPlan' style='font-family:'Century Gothic';'>R$ ".$planos[$i][5]." DE DESCONTO</span>
                                        <div class='content' style='border-left: 1px solid rgba(0,0,0,0.1);border-top: 1px solid rgba(0,0,0,0.1);'>
                                        <!--cabeçalho---->
                                            <div class='col-xs-12 col-sm-4 col-md-8'>
                                                <p style='font-size:30px;color:#ff3300;font-family:'Century Gothic';'><strong>".$planos[$i][1]."</strong></p>
                                                <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> WiFi</strong> Fora de casa</p>
                                                <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> Modem</strong> com WiFi</p>
                                                <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> Conect Play</strong></p>";
                                            echo "
                                            </div>
                                            <div class='col-xs-12 col-sm-4 col-md-4'> 
                                                <p style='font-size:30px;font-family:'Century Gothic';'><strong>".$planos[$i][2]."</strong></p>
                                                <p style='margin-top:-40px; margin-left:40px;font-family:'Century Gothic';'><strong>\MÊS</strong><sup></p>                                   
                                            </div>  
                                            <br><br><br><br><br><br><br><br><br>
                                                <div class='card-body'>
                                                    <p class='card-text' style='text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';position:absolute;'>Nos Combos de 104,90/mês</p>
                                                    <p class='card-text' style='text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';'>Download: até ".$planos[$i][3]."Mbps. Upload: até ".$planos[$i][4]."Mbps</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                    }
                                }
                            ?>
                            <?php
                            if (isset($_SESSION['tableA'])) {
                            $antigo = $_SESSION['tableA'];
                            $qtde = $_SESSION['a'];
                            for ($i=0; $i < $qtde; $i++) { 
                            echo "
                            <div class='col-md-6 col-xs-12 col-sm-4'>
                                <div class='card card-member' style='border-bottom: 5px solid rgb(255,102,0);'>
                                    <span class='spanPlan' style='font-family:'Century Gothic';'>R$ ".$antigo[$i][5]." DE DESCONTO</span>
                                    <div class='content' style='border-left: 1px solid rgba(0,0,0,0.1);border-top: 1px solid rgba(0,0,0,0.1);'>
                                    <!--cabeçalho---->
                                        <div class='col-xs-12 col-sm-4 col-md-8'>
                                            <p style='font-size:30px;color:#ff3300;font-family:'Century Gothic';'><strong>".$antigo[$i][1]."</strong></p>
                                            <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> WiFi</strong> Fora de casa</p>
                                            <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> Modem</strong> com WiFi</p>
                                            <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> Conect Play</strong></p>";
                                        echo "
                                        </div>
                                        <div class='col-xs-12 col-sm-4 col-md-4'> 
                                            <p style='font-size:30px;font-family:'Century Gothic';'><strong>".$antigo[$i][2]."</strong></p>
                                            <p style='margin-top:-40px; margin-left:40px;font-family:'Century Gothic';'><strong>\MÊS</strong><sup></p>                                   
                                        </div>  
                                        <br><br><br><br><br><br><br><br><br>
                                            <div class='card-body'>
                                                <p class='card-text' style='text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';position:absolute;'>Nos Combos de 104,90/mês</p>
                                                <p class='card-text' style='text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';'>Download: até ".$antigo[$i][3]."Mbps. Upload: até ".$antigo[$i][4]."Mbps</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                                    }
                                }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <br><br>
                                <form action='processarPlanos.php' method='post'>
                                    <button name="concluir" type="submit" class="btn btn-outline-success btn-lg btn-block"style="color:#ff6600;border-color:#ff6600 !important;font-family:'Century Gothic';'">Finalizar</button>
                                </form>
                            </div>
                        </div>
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