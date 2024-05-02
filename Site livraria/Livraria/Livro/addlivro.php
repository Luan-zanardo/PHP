<?php
    $codigo = $_POST['codigo'];
    $titulo = $_POST['titulo'];
    $codcategoria = $_POST['codcategoria'];
    $codclassificacao = $_POST['codclassificacao'];
    $ano = $_POST['ano'];
    $edicao = $_POST['edicao'];
    $codautor = $_POST['codautor'];
    $editora = $_POST['editora'];
    $paginas = $_POST['paginas'];
    $valor = $_POST['valor'];

    $fotocapa = $_FILES['fotocapa'];
    $diretorio = "Fotos/";

    $exensao = strtolower(substr($_FILES['fotocapa']['name'], -4));
    $novo_nome = md5(time()).$exensao;
    move_uploaded_file($_FILES['fotocapa']['tmp_name'], $diretorio.$novo_nome);
    
    $conectar = mysql_connect('localhost','root','');
    $db = mysql_select_db('livraria');
    $sql = "insert livro (codigo,titulo,codcategoria,codclassificacao,ano,edicao,codautor,editora,paginas,fotocapa,valor)
            values ('$codigo','$titulo','$codcategoria','$codclassificacao','$ano','$edicao','$codautor','$editora','$paginas','$novo_nome','$valor')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='cad_livro.php'";
	?>
</script>
