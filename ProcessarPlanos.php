<?php
session_start();
if (isset($_POST['enviar'])) {
    $mega = isset($_POST["mega"])?$_POST["mega"]:"";
    $pre = isset($_POST["preco"])?$_POST["preco"]:"";
    $preco = str_replace(",", ".", $pre);
    $dow = isset($_POST["dow"])?$_POST["dow"]:"";
    $up = isset($_POST["up"])?$_POST["up"]:"";
    $desc= isset($_POST["desconto"])?$_POST["desconto"]:"";
    $desconto = str_replace(",", ".", $desc);
    $tipo = isset($_POST["tipo"])?$_POST["tipo"]:"";
    

    if ($mega != "" && $preco != "" && $dow != "" && $up != "") {
        include("conexaoBD.php");
        $sql = "INSERT INTO planos(mega, preco, down, up, desconto, tipo) VALUES ('$mega',$preco,'$dow','$up','$desconto','$tipo')";
        $resultado = mysqli_query($conn,$sql);

        if ($resultado != 0) {
            $planos = "SELECT  *FROM `planos`;";
            $resultadot = mysqli_query($conn,$planos); 
            $tabelaT = array();
            $t = 0;
            while($registro = mysqli_fetch_array($resultadot)){
                $tabelaT[$t][0] = $registro['id'];
                $t++;
            } 
            $_SESSION['planos'] = $tabelaT;
            $_SESSION['t'] = $t;

            $planosR = "SELECT  *FROM `planos` WHERE `tipo` = 'radio'";
            $resultadoR = mysqli_query($conn,$planosR); 
            $tabelaR = array();
            $r = 0;
            while($registro = mysqli_fetch_array($resultadoR)){
                $tabelaR[$r][0] = $registro['id'];
                $tabelaR[$r][1] = $registro['mega'];
                $tabelaR[$r][2] = $registro['preco'];
                $tabelaR[$r][3] = $registro['down'];
                $tabelaR[$r][4] = $registro['up'];	
                $tabelaR[$r][5] = $registro['desconto'];
                $tabelaR[$r][6] = $registro['tipo'];
                $r++;
            } 
            $_SESSION['planos_radio'] = $tabelaR;
            $_SESSION['r'] = $r;
            ################################################

            $planosC = "SELECT  *FROM `planos` WHERE `tipo` = 'Cabo'";
            $resultadoC = mysqli_query($conn,$planosC); 
            $tabelaC = array();
            $c = 0;
            while($registro = mysqli_fetch_array($resultadoC)){
                $tabelaC[$c][0] = $registro['id'];
                $tabelaC[$c][1] = $registro['mega'];
                $tabelaC[$c][2] = $registro['preco'];
                $tabelaC[$c][3] = $registro['down'];
                $tabelaC[$c][4] = $registro['up'];   
                $tabelaC[$c][5] = $registro['desconto'];
                $tabelaC[$c][6] = $registro['tipo'];
                $c++;
            } 
            $_SESSION['planos_cabo'] = $tabelaC;
            $_SESSION['c'] = $c;
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Plano Adicionado com sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-iidden='true'>&times;</span></button></div>";
            header("location: planos.php");
        }else{
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Erro ao adicionar plano<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-iidden='true'>&times;</span></button></div>";
            header("location: planos.php");
        }
    }else{
        $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Campos vazios<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-iidden='true'>&times;</span></button></div>";
        header("location: planos.php");
    }
}else if(isset($_POST['del'])){
    $id = isset($_POST["id"])?$_POST["id"]:"";
    include("conexaoBD.php");
    
    $sql = "DELETE FROM `planos` WHERE `id`=$id";
    //echo $sql;
    $resultado = mysqli_query($conn,$sql);

    if ($resultado != 0) {
        $sql = "INSERT INTO planos(mega, preco, down, up, desconto, tipo) VALUES ('$mega',$preco,'$dow','$up','$desconto','$tipo')";
        $resultado = mysqli_query($conn,$sql);

        $planos = "SELECT  *FROM `planos`;";
        $resultadot = mysqli_query($conn,$planos); 
        $tabelaT = array();
        $t = 0;
        while($registro = mysqli_fetch_array($resultadot)){
            $tabelaT[$t][0] = $registro['id'];
            $t++;
        } 
        $_SESSION['planos'] = $tabelaT;
        $_SESSION['t'] = $t;

        $planosR = "SELECT  *FROM `planos` WHERE `tipo` = 'radio'";
        $resultadoR = mysqli_query($conn,$planosR); 
        $tabelaR = array();
        $r = 0;
        while($registro = mysqli_fetch_array($resultadoR)){
            $tabelaR[$r][0] = $registro['id'];
            $tabelaR[$r][1] = $registro['mega'];
            $tabelaR[$r][2] = $registro['preco'];
            $tabelaR[$r][3] = $registro['down'];
            $tabelaR[$r][4] = $registro['up'];	
            $tabelaR[$r][5] = $registro['desconto'];
            $tabelaR[$r][6] = $registro['tipo'];
            $r++;
        } 
        $_SESSION['planos_radio'] = $tabelaR;
        $_SESSION['r'] = $r;
        ################################################

        $planosC = "SELECT  *FROM `planos` WHERE `tipo` = 'Cabo'";
        $resultadoC = mysqli_query($conn,$planosC); 
        $tabelaC = array();
        $c = 0;
        while($registro = mysqli_fetch_array($resultadoC)){
            $tabelaC[$c][0] = $registro['id'];
            $tabelaC[$c][1] = $registro['mega'];
            $tabelaC[$c][2] = $registro['preco'];
            $tabelaC[$c][3] = $registro['down'];
            $tabelaC[$c][4] = $registro['up'];   
            $tabelaC[$c][5] = $registro['desconto'];
            $tabelaC[$c][6] = $registro['tipo'];
            $c++;
        } 
        $_SESSION['planos_cabo'] = $tabelaC;
        $_SESSION['c'] = $c;
        $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Plano deletado com sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-iidden='true'>&times;</span></button></div>";
        header("location: planos.php");
    }else{
        $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Erro ao deletar plano<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-iidden='true'>&times;</span></button></div>";
            //header("location: planos.php");
    }

}else if(isset($_POST["concordo"])){
    $id = $_SESSION["id"];
    $tabela = $_SESSION['dados'];
    $qtde_linhas = $_SESSION['i'];
    
    include("conexaoBD.php");

    for ($i=0; $i < $qtde_linhas; $i++) {
        $usuario = $tabela[$i][8]; 
    }

    $plan = "SELECT u.plano,p.mega,p.preco,p.down,p.up,p.desconto,p.tipo FROM usuarios u, planos p WHERE u.plano=p.id and u.email='$usuario'";
    $rs = mysqli_query($conn,$plan); 
    $table = array();
    $p = 0;
    while($registro = mysqli_fetch_array($rs)){
        $table[$p][0] = $registro[0];
        $table[$p][1] = $registro[1];
        $table[$p][2] = $registro[2];
        $table[$p][3] = $registro[3];
        $table[$p][4] = $registro[4];	
        $table[$p][5] = $registro[5];
        $table[$p][6] = $registro[6];
        $p++;
    } 
    $_SESSION['plan'] = $table;
    $_SESSION['p'] = $p;

    for ($i=0; $i < count($id); $i++) { 
        $pedido = $id[$i];
    }

    $antigo = "SELECT * FROM `planos` WHERE `id`=$pedido";
    $ra = mysqli_query($conn,$antigo); 
    $tableA = array();
    $a = 0;
    while($registro = mysqli_fetch_array($ra)){
        $tableA[$a][0] = $registro['id'];
        $tableA[$a][1] = $registro['mega'];
        $tableA[$a][2] = $registro['preco'];
        $tableA[$a][3] = $registro['down'];
        $tableA[$a][4] = $registro['up'];  	
        $tableA[$a][5] = $registro['desconto'];
        $tableA[$a][6] = $registro['tipo'];
        $a++;
    } 
    $_SESSION['tableA'] = $tableA;
    $_SESSION['a'] = $a;
   
    header("location: finalizarplano.php");
   
}else if(isset($_POST["concluir"])){
    if(!isset($_SESSION["id"])){
        $planos = $_SESSION['plan'];
        $qtde = $_SESSION['p'];
        for ($i=0; $i < $qtde; $i++) { 
            $id = $planos[$i][0];
        }
    }else{
        $id = $_SESSION["id"];
    }
    $tabela = $_SESSION['dados'];
    $qtde_linhas = $_SESSION['i'];
    
    include("conexaoBD.php");

    for ($i=0; $i < $qtde_linhas; $i++) {
        $usuario = $tabela[$i][8]; 
    }
    
    for ($i=0; $i < count($id); $i++) { 
        $pedido = $id[$i];
    }
    $sql = "UPDATE `usuarios` SET `plano`=$pedido WHERE `email`='$usuario'";
    $rs = mysqli_query($conn,$sql);
    //echo $sql;
    if ($rs != 0) {
        $novo = "SELECT preco,desconto FROM `planos` WHERE `id`=$pedido";
        $rn = mysqli_query($conn,$novo); 
        $tableN = array();
        $n = 0;
        while($registro = mysqli_fetch_array($rn)){
            $tableN[$n][2] = $registro['preco'];
            $tableN[$n][5] = $registro['desconto'];
            $n++;
        } 
        $_SESSION['tableN'] = $tableN;
        $_SESSION['n'] = $n;
        var_dump( $_SESSION['tableN']);
        header("location: boleto_bradesco.php");
    }else{
        $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Erro ao selecionar o plano. Por favor, entre em contato conosco<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-iidden='true'>&times;</span></button></div>";
        //header("location: planos.php");
    }
}
?>