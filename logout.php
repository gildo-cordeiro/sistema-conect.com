<?php
    session_start(); // Inicia a sessão
    session_destroy(); // Destrói a sessão limpando todos os valores salvos
    header("location: index.php");// Redireciona o visitante
?>