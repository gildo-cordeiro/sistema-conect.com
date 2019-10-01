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
    <title>Usuários</title>
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
            <?php
                if (isset($_SESSION['erro'])) {
                    echo "<br>";
                    echo $_SESSION['erro'];
                    unset($_SESSION['erro']);
                    }
            ?> 
            <ul class="nav nav-tabs">
                <li class="active" id="tab1"><a style="font-family:'Century Gothic';" data-toggle="tab" href="#clientes">Clientes</a></li>
                <li class="nome" id="tab2"><a  style="font-family:'Century Gothic';" data-toggle="tab" href="#fun">Funcionários</a></li>
                <!--<li><a data-toggle="tab" href="#pla">Cadastrar Planos</a></li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="clientes">
                    <hr>
                    <form action="ProcessarConsultas.php" method="post">
                        <div class="form-group col-md-4 col-sm-6">
                            <label for="client">Pesquise por clientes:</label>
                            <input type="text" class="form-control" id="client" name="cliente">
                            <label style="margin-top: -20px;position:absolute;"><code style="font-size:10px;color:#ff6600;">Utilize: Nome, E-mail ou CPF (CPF no formato: 000.000.000-00)</code></label>
                        </div>
                        <div class="form-group col-md-2  col-sm-6" style="margin-top:22px;">
                            <button type="submit" class="btn btn-outline-success btn-md btn-block" name="PesquisarCliente" >Pesquisar <img src="img/lup.png" alt=""></button>
                        </div>
                        <div class="form-group col-md-2  col-sm-6" style="margin-top:22px;">
                            <button type="submit" class="btn btn-outline-success btn-md btn-block" name="RecarregarCliente">Recarregar <img src="img/glyphicons-82-refresh.png" alt=""></button>
                        </div>
                        <div class="form-group col-md-2 col-sm-6" style="margin-top:22px;">
                            <a style="color:#ff6600 !important;" type="button" href="javascript:void(0);"data-toggle='modal' data-target='#Modal' data-whatever='@mdo' class="btn btn-outline-success btn-md btn-block" name="RecarregarFun">Trocar Plano <img src="img/glyphicons-31-pencil.png" alt=""></a>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                                <table class="table  table-striped table-hover">
                                    <caption class="text-center" style="font-family:'Century Gothic';background-color:#ff3300;color:#ffffff;font-size:12pt;font-weight:bolder;">DADOS DO CLIENTE</caption>
                                    <thead style="color:#000000;font-family:'Century Gothic';">
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">CPF</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">CEP</th>
                                            <th scope="col">Cidade</th>
                                            <th scope="col">Endereço</th>
                                            <th scope="col">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(isset($_SESSION['TabelaCliente'])){
                                        $tabelacl = $_SESSION['TabelaCliente'];
                                        $qtde_linhas = $_SESSION['linha'];
                                        for ($i=0; $i < $qtde_linhas; $i++) { 
                                            echo "<tr>";
                                            echo "<td>".$tabelacl[$i][0]." ".$tabelacl[$i][1]."</td>";
                                            echo "<td>".$tabelacl[$i][2]."</td>";
                                            echo "<td>".$tabelacl[$i][3]."</td>";
                                            echo "<td>".$tabelacl[$i][8]."</td>";
                                            echo "<td>".$tabelacl[$i][4]."</td>";
                                            echo "<td>".$tabelacl[$i][7]."</td>";
                                            echo "<td>".$tabelacl[$i][6]."</td>";
                                            echo "<td>".$tabelacl[$i][5]."</td>";
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
                <div class="tab-pane" id="fun">       
                    <hr>  
                    <form action="ProcessarConsultas.php" method="post">        
                        <div class="form-group col-md-4 col-sm-6">
                            <label for="fun">Pesquise por funcionários:</label>
                            <input type="text" class="form-control" id="fun" name="fun">
                            <label style="margin-top: -20px;position:absolute;"><code style="font-size:10px;color:#ff6600;">Utilize: Nome, E-mail ou CPF (CPF no formato: 000.000.000-00)</code></label>
                        </div>
                        <div class="form-group col-md-2  col-sm-6" style="margin-top:22px;">
                            <button type="submit" class="btn btn-outline-success btn-md btn-block" name="PesquisarFun">Pesquisar <img src="img/lup.png" alt=""></button>
                        </div>
                        <div class="form-group col-md-2  col-sm-6" style="margin-top:22px;">
                            <button type="submit" class="btn btn-outline-success btn-md btn-block" name="RecarregarFun">Recarregar <img src="img/glyphicons-82-refresh.png" alt=""></button>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                                <table class="table  table-striped table-hover">
                                    <caption class="text-center" style="font-family:'Century Gothic';background-color:#ff3300;color:#ffffff;font-size:12pt;font-weight:bolder;">DADOS DO FUNCIONÁRIO</caption>
                                    <thead style="color:#000000;font-family:'Century Gothic';">
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">CPF</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(isset($_SESSION['tabelafun'])){
                                        $tabelaf = $_SESSION['tabelafun'];
                                        $qtde = $_SESSION['f'];
                                        for ($i=0; $i < $qtde; $i++) { 
                                            echo "<tr>";
                                            echo "<td>".$tabelaf[$i][0]." ".$tabelaf[$i][1]."</td>";
                                            echo "<td>".$tabelaf[$i][2]."</td>";
                                            echo "<td>".$tabelaf[$i][3]."</td>";
                                            echo "<td>".$tabelaf[$i][4]."</td>";
                                            echo "</tr>";
                                        }
                                    }else{
                                        echo "<tr>";
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
    </div>
</div>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="modal-title" id="LabelModal" style="font-family:'Century Gothic';color:#ff3300;">Trocar plano do usuário</h3>
                </div>
                <div class="col-md-6">
                    <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
          </div>
          <div class="modal-body">
            <form action="processarCliente.php" method="post">
            <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label" style="font-family:'Century Gothic';">ID Plano:</label>
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
            <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label" style="font-family:'Century Gothic';">Usuário:</label>
                <?php
                 if(isset( $_SESSION['cliente'])){
                    $planos = $_SESSION['cliente'];
                    $qtde = $_SESSION['quant'];
                    echo "<select name='usuario' class='form-control' style='font-family:'Century Gothic';'>";
                    for ($i=0; $i < $qtde; $i++) { 
                        echo "<option value='".$planos[$i][8]."'>".$planos[$i][8]."</option>";
                    }
                    echo "</select>";
                }
                ?>
                <!--<label class="col-form-label" style="margin-top: -20px;"><code style="margin-top: -10px;">Informe seu CPF</code></label>-->
            </div>
        </div>
          <div class="modal-footer">
            <!--<button type="reset" class="btn btn-danger" data-dismiss="modal" style="color:#ffffff;background-color:red !important;border-color:red !important;">Cancelar</button>-->
            <button name="aplicar" type="submit" class="btn btn-outline-success btn-lg btn-block" style="color:#ff6600;border-color:#ff6600 !important;">Aplicar novo plano</button>
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