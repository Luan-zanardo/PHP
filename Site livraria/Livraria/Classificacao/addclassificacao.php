<?php
    $codigo = $_GET['codigo'];
    $descricao = $_GET['descricao'];
    
    $conectar = mysql_connect('localhost','root','');
    $db = mysql_select_db('livraria');
    $sql = "insert into classificacao (codigo,descricao) values ('$codigo','$descricao')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='cad_classificacao.php'";
	?>
</script>