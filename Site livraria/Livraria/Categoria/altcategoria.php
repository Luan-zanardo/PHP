<?php
    $codigo= $_GET['codigo'];
    $descricao  = $_GET['descricao'];
    
    $conectar = mysql_connect('localhost','root','');
    $db = mysql_select_db('livraria');
    $sql = "update categoria set descricao = '$descricao' where codigo = '$codigo'";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Alterado com Sucesso!');
	<?php
		echo "location.href='cad_categoria.php'";
	?>
</script>
