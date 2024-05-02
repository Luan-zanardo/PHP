<?php
    $codigo= $_GET['codigo'];
    $nome  = $_GET['nome'];
    $login = $_GET['login'];
    $senha = $_GET['senha'];
    
    $conectar = mysql_connect('localhost','root','');
    $db = mysql_select_db('livraria');
    $sql = "update usuario set nome = '$nome', login = '$login', senha = '$senha'  where codigo = '$codigo'";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Alterado com Sucesso!');
	<?php
		echo "location.href='cad_usuarios.php'";
	?>
</script>
