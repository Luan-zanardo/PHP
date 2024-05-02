<?php
    $codigo = $_GET['codigo'];
    $titulo = $_GET['titulo'];
    $codcategoria = $_GET['codcategoria'];
    $codclassificacao = $_GET['codclassificacao'];
    $ano = $_GET['ano'];
    $edicao = $_GET['edicao'];
    $codautor = $_GET['codautor'];
    $editora = $_GET['editora'];
    $paginas = $_GET['paginas'];
    $valor = $_GET['valor'];
    
    $conectar = mysql_connect('localhost','root','');
    $db = mysql_select_db('livraria');
    $sql = "update livro set titulo = '$titulo', codcategoria = '$codcategoria', 
    codclassificacao = '$codclassificacao', ano = '$ano', edicao = '$edicao', 
    codautor = '$codautor', editora = '$editora', paginas = '$paginas', valor = '$valor' where codigo = '$codigo'";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Alterado com Sucesso!');
	<?php
		echo "location.href='cad_livro.php'";
	?>
</script>