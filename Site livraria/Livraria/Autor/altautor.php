<?php
    $codigo = $_GET['codigo'];
    $nome = $_GET['nome'];
    $endereco = $_GET['endereco'];
    $cidade = $_GET['cidade'];
    $estado = $_GET['estado'];
    $pais = $_GET['pais'];
    $nacionalidade = $_GET['nacionalidade'];
    
    $conectar = mysql_connect('localhost','root','');
    $db = mysql_select_db('livraria');
    $sql = "update autor set nome = '$nome', endereco = '$endereco', cidade = '$cidade', 
            estado = '$estado', pais = '$pais', nacionalidade = '$nacionalidade' 
    where codigo = '$codigo'";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Alterado com Sucesso!');
	<?php
		echo "location.href='cad_autor.php'";
	?>
</script>