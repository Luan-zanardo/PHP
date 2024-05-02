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
    $sql = "insert into autor (codigo,nome,endereco,cidade,estado,pais,nacionalidade) values ('$codigo','$nome','$endereco','$cidade','$estado','$pais','$nacionalidade')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='cad_autor.php'";
	?>
</script>
