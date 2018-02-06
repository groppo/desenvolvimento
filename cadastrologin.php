<!doctype>
<html lang="pt-br">
	<meta charset="utf-8">
	<head><title>Login</title>	
	<style>
	#login{
		width: 330px;
		height: 150px;
	}
	</style>
	
<?php
session_start(); // Criar variáveis globais 

include "conexao.php";

if (isset($_POST["cadastrar"]))
{
	$login=$_REQUEST["login"];
	$senha=$_REQUEST["senha"];
	$senhaconfirmada=$_REQUEST["senhaconfirmada"];
	
	if($senha==$senhaconfirmada)
	{
		$inserir=mysqli_query($conexao, "insert into usuario(email,senha) values('$login','$senha') ");
		
		if(!$inserir)
		{
			echo"Erro ao cadastrar.";
		}
		else
		{
			echo"<script>alert('Usuário Cadastrado')
		    location.href='login.php'</script>";
		}
	}
	else
	{
		echo"A senhas não coincidem."; 
	}
	
}	
if(isset($_POST["cancelar"]))
{
	session_destroy();
	header("Location:login.php");
}
		
?>
	
	</head>
	<body>
		<h1>Cadastro de Login</h1>
		<br>
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
			<fieldset id="login">
			<legend>Usuarios</legend>
			<label>Login:</label>
			<input type="text" maxlength="50" size="50" name="login"/><br><br>
			<label>Senha:</label>
			<input type="password" maxlength="10" size="10" name="senha"/><br><br>
			<label>Confirmar a Senha:</label>
			<input type="password" maxlength="10" size="10" name="senhaconfirmada"/><br><br>
			<input type="submit" name="cadastrar" value="Cadastrar"/>
			<input type="submit" name="cancelar" value="Cancelar"/>
			</fieldset>
			<br>
		</form>	
	</body>

</html>