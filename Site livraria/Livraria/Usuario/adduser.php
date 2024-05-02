<?php
    $codigo = $_GET['codigo'];
    $nome = $_GET['nome'];
    $login = $_GET['login'];
    $senha = $_GET['senha'];
    
    $conectar = mysql_connect('localhost','root','');
    $db = mysql_select_db('livraria');
    $sql = "insert into usuario (codigo,nome,login,senha) values ('$codigo','$nome','$login','$senha')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='cad_usuarios.php'";
	?>
</script>
