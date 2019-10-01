<?php
if (isset($_POST["enviar"])) {
    session_start();
    include("conexaoBD.php");
    $sql = "select *from usuarios";
    $result = mysqli_query($conn,$sql);

    $tabela = array();
    $i = 0;

    while($regist = mysqli_fetch_array($result)){
        $usuario = $regist['email'];
        $sql2 = "SELECT u.nome, u.sobreNome, u.cpf, u.Data_Entrada, COUNT(a.id) AS total FROM usuarios u, assistencia a WHERE u.email=a.usuario AND u.email='$usuario'";
        echo $sql2;
        $rs = mysqli_query($conn,$sql2);
        

        while ($registro = mysqli_fetch_array($rs)) {
            $tabela[$i][0] = $registro[0];
            $tabela[$i][1] = $registro[1];
            $tabela[$i][2] = $registro[2];
            $tabela[$i][3] = $registro[3];
            $tabela[$i][4] = $registro[4];
            $i++;
        }
    } 
    $_SESSION["historico"] = $tabela;
    $_SESSION["row"] = $i;
    header("location:perfil.php");
}

?>