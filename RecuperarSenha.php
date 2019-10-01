<?php
if (isset($_POST["rec"])) {
include("conexaoBD.php");
	//pega a variavel via post
	$email = isset($_POST['mail'])?$_POST['mail']:'';
	if ($email != "") {
		//busca no db o usuario com o email 
		$result = mysqli_query($conn,"SELECT * FROM usuarios WHERE email='$email'");
		//conta quantos tem
		//faz um while para vc coloar os dados nas variavels
		while($Row_email = mysqli_fetch_array($result)){
			echo $rowemail = $Row_email['email'];
			echo $rowsenha = $Row_email['senha'];
			
				
			//enviar um email para variavel email juntamente com a variável senha;
			$mensage ="Você solicitou a recuperação de senhha confira seu dados.";
			$mensage .="E-mail= " . $rowemail;
			$mensage .="Senha:" . $rowsenha;

			mail($rowemail, "Conect.com, recuperação de senha", $mensage);

			echo "<script>alert(Sua senha foi enviada para o e-mail seu E-mail.),window.open('recuperar_senha_enviado.php','_self')</script>";
			}
		/*}else{
			echo "<script>alert('E-mail não cadastrado em nosso sistema'),window.open('recuperar_senha.php','_self')</script>";
		}*/
	}
}
?>