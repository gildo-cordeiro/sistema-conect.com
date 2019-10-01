<?php
session_start();
if (isset($_POST["PesquisarCliente"])) {
    $cliente = isset($_POST["cliente"])?$_POST["cliente"]:"";

    if($cliente != ""){
        include("conexaoBD.php");
        $sql = "SELECT * FROM `usuarios` WHERE nome like '$cliente%' OR cpf='$cliente' OR email = '$cliente%'";

        $rs = mysqli_query($conn,$sql);
        $tabela = array();
        $i = 0;

        while($row = mysqli_fetch_array($rs)){
            $tabela[$i][0] = $row['nome'];
            $tabela[$i][1] = $row['sobreNome'];
            $tabela[$i][2] = $row['cpf'];
            $tabela[$i][3] = $row['tel'];
            $tabela[$i][4] = $row['cep'];
            $tabela[$i][5] = $row['estado'];
            $tabela[$i][6] = $row['endereco'];
            $tabela[$i][7] = $row['cidade'];
            $tabela[$i][8] = $row['email'];
            $i++;
        }
        $_SESSION["TabelaCliente"] = $tabela;
        $_SESSION["linha"] = $i;
        header("location:clientes.php");
    }else{
        header("location:clientes.php");
    }
}else if(isset($_POST["RecarregarCliente"])){
    $cliente = isset($_POST["cliente"])?$_POST["cliente"]:"";

    include("conexaoBD.php");
    $sql = "SELECT * FROM `usuarios`";

    $rs = mysqli_query($conn,$sql);
    $tabela = array();
    $i = 0;

    while($row = mysqli_fetch_array($rs)){
        $tabela[$i][0] = $row['nome'];
        $tabela[$i][1] = $row['sobreNome'];
        $tabela[$i][2] = $row['cpf'];
        $tabela[$i][3] = $row['tel'];
        $tabela[$i][4] = $row['cep'];
        $tabela[$i][5] = $row['estado'];
        $tabela[$i][6] = $row['endereco'];
        $tabela[$i][7] = $row['cidade'];
        $tabela[$i][8] = $row['email'];
        $i++;
    }
    $_SESSION["TabelaCliente"] = $tabela;
    $_SESSION["linha"] = $i;
    header("location:clientes.php");

}else if(isset($_POST["PesquisarFun"])){
    $fun = isset($_POST["fun"])?$_POST["fun"]:"";

    if($fun != ""){
        include("conexaoBD.php");
        $sql = "SELECT * FROM `fun` WHERE nome like '$fun%' OR cpf='$fun%' OR email = '$fun%'";

        $rs = mysqli_query($conn,$sql);
        $tabelafun = array();
        $f = 0;

        while($rowfun = mysqli_fetch_array($rs)){
            $tabelafun[$f][0] = $rowfun['nome'];
            $tabelafun[$f][1] = $rowfun['sobreNome'];
            $tabelafun[$f][2] = $rowfun['cpf'];
            $tabelafun[$f][3] = $rowfun['tel'];
            $tabelafun[$f][4] = $rowfun['email'];
            $f++;
        }
        $_SESSION["tabelafun"] = $tabelafun;
        $_SESSION["f"] = $f;
        header("location:clientes.php");
    }
}else if(isset($_POST["RecarregarFun"])){
    $fun = isset($_POST["fun"])?$_POST["fun"]:"";

    include("conexaoBD.php");
    $sql = "SELECT * FROM `fun`";

    $rs = mysqli_query($conn,$sql);
    $tabelafun = array();
    $f = 0;

    while($rowfun = mysqli_fetch_array($rs)){
        $tabelafun[$f][0] = $rowfun['nome'];
        $tabelafun[$f][1] = $rowfun['sobreNome'];
        $tabelafun[$f][2] = $rowfun['cpf'];
        $tabelafun[$f][3] = $rowfun['tel'];
        $tabelafun[$f][4] = $rowfun['email'];
        $f++;
    }
    $_SESSION["tabelafun"] = $tabelafun;
    $_SESSION["f"] = $f;
    header("location:clientes.php");
}else{
    header("location:clientes.php");
}


?>