<?php
if (isset($_POST["enviar"])) {
    session_start();
    $nome = isset($_POST["nome"])?$_POST["nome"]:"";
    $data = isset($_POST["data"])?$_POST["data"]:"";
    $motivo = isset($_POST["motivo"])?$_POST["motivo"]:"";
    $desc = isset($_POST["desc"])?$_POST["desc"]:"";

    $tabela = $_SESSION['dados'];
    $qtde_linhas = $_SESSION['i'];
    for ($i=0; $i < $qtde_linhas; $i++) {
        $usuario = $tabela[$i][8]; 
    }

    include("conexaoBD.php");

    if ($nome != "" && $data != "" && $motivo != "" && $desc != "") {
        $sql = "INSERT INTO `assistencia`(`nome`, `data`, `motivo`, `descricao`, `usuario`) VALUES ('$nome','$data','$motivo','$desc','$usuario')";
        //echo $sql;
        $rs = mysqli_query($conn,$sql);

        if ($rs != 0) {
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Solicitação enviada<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: assistencia.php");
        }else{
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Erro ao solicitar assinstência técnica<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: assistencia.php");
        }
    }else{
        $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Campos vazios<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("location: assistencia.php");
    }
}else if(isset($_POST["Pesquisar"])){
    session_start();
    $nome = isset($_POST["nome"])?$_POST["nome"]:"";

    if ($nome != "") {
        include("conexaoBD.php");
        $sql = "SELECT * FROM `assistencia` WHERE nome LIKE '$nome%'";

        $rs = mysqli_query($conn,$sql); 
        $table = array();
        $a = 0;
        while($registro = mysqli_fetch_array($rs)){
            $table[$a][0] = $registro["id"];
            $table[$a][1] = $registro["nome"];
            $table[$a][2] = $registro["data"];
            $table[$a][3] = $registro["motivo"];
            $table[$a][4] = $registro["descricao"];	
            $table[$a][5] = $registro["usuario"];
            $a++;
        }
        $_SESSION['assist'] = $table;
        $_SESSION['a'] = $a;
        header("location:ConsultaAssist.php");
    }
   
}else if(isset($_POST["Atualizar"])){
    session_start();
    include("conexaoBD.php");
    $sql = "SELECT * FROM `assistencia`";

    $rs = mysqli_query($conn,$sql); 
    $table = array();
    $a = 0;
    while($registro = mysqli_fetch_array($rs)){
        $table[$a][0] = $registro["id"];
        $table[$a][1] = $registro["nome"];
        $table[$a][2] = $registro["data"];
        $table[$a][3] = $registro["motivo"];
        $table[$a][4] = $registro["descricao"];	
        $table[$a][5] = $registro["usuario"];
        $a++;
    }
    $_SESSION['assist'] = $table;
    $_SESSION['a'] = $a;
    header("location:ConsultaAssist.php");
}
?>