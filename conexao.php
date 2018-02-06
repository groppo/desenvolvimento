<?php
$usuario="root";
$senha="";
$banco="sistema";
$conexao=mysqli_connect("localhost",$usuario,$senha,$banco);
if(!$conexao)
{
	echo"erro na conexão";
}
?>