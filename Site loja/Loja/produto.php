<?php

session_start();
$conectar = mysql_connect('localhost', 'root', '');
$banco = mysql_select_db('loja');

if(isset($_POST['cadastrar']))
{
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codcategoria = $_POST['codcategoria'];
    $codclassificacao = $_POST['codclassificacao'];
    $codmarca = $_POST['codmarca'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $preco = $_POST['preco'];

    //inclui arquivos fotos (endereço da pasta no computador)
    $foto1 = $_FILES['foto1'];
    $foto2 = $_FILES['foto2'];
    $foto3 = $_FILES['foto3'];

    //criar pasta e mover arquivos imagens
    $diretorio = "fotos/";

    $exensao1 = strtolower(substr($_FILES['foto1']['name'], -4));
    $novo_nome1 = md5(time()).$exensao1;
    move_uploaded_file($_FILES['foto1']['tmp_name'], $diretorio.$novo_nome1);
    
    $exensao2 = strtolower(substr($_FILES['foto2']['name'], -6));
    $novo_nome2 = md5(time()).$exensao2;
    move_uploaded_file($_FILES['foto2']['tmp_name'], $diretorio.$novo_nome2);

    $exensao3 = strtolower(substr($_FILES['foto3']['name'], -8));
    $novo_nome3 = md5(time()).$exensao3;
    move_uploaded_file($_FILES['foto3']['tmp_name'], $diretorio.$novo_nome3);

    $sql = "insert into produto (codigo,descricao,codcategoria,codclassificacao,codmarca,cor,tamanho,preco,foto1,foto2,foto3)
            values ('$codigo','$descricao','$codcategoria','$codclassificacao','$codmarca','$cor','$tamanho','$preco','$novo_nome1','$novo_nome2','$novo_nome3')";

    $resultado = mysql_query($sql);

    if($resultado === TRUE)
    {
        echo 'Cadastro realizado com Sucesso';
    }
    else
    {
        echo 'Erro ao gravar dados.';
    }
}

if(isset($_POST['alterar']))
{
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codcategoria = $_POST['codcategoria'];
    $codclassificacao = $_POST['codclassificacao'];
    $codmarca = $_POST['codmarca'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $preco = $_POST['preco'];

    $sql = "update produto set descricao='$descricao', tamanho='$tamanho', preco='$preco'
    where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if($resultado === TRUE)
    {
        echo 'Dados alterados com sucesso!';
    }
    else
    {
        echo 'Erro ao alterar dados.';
    }
}

if(isset($_POST['excluir']))
{
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codcategoria = $_POST['codcategoria'];
    $codclassificacao = $_POST['codclassificacao'];
    $codmarca = $_POST['codmarca'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $preco = $_POST['preco'];

    $sql = "delete from produto where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if($resultado === TRUE)
    {
        echo 'Exclusão realizada com Sucesso';
    }
    else
    {
        echo 'Erro ao excluir dados.';
    }
}

if(isset($_POST['alterar']))
{
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codcategoria = $_POST['codcategoria'];
    $codclassificacao = $_POST['codclassificacao'];
    $codmarca = $_POST['codmarca'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $preco = $_POST['preco'];

    $sql = "update produto set descricao='$descricao', tamanho='$tamanho', preco='$preco'
    where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if($resultado === TRUE)
    {
        echo 'Dados alterados com sucesso!';
    }
    else
    {
        echo 'Erro ao alterar dados.';
    }
}

if(isset($_POST['pesquisar']))
{
    $sql = mysql_query("select codigo,descricao,codcategoria,codclassificacao,codmarca,cor,tamanho,preco,foto1, foto2 FROM produto");

    echo "<b>produtos Cadastrados: </b><br><br>";

    while ($dados = mysql_fetch_object($sql))
    {
        echo "Codigo: " .$dados->codigo." ";
        echo "Descricao: " .$dados->descricao." ";
        echo "Cod Modelo: " .$dados->codcategoria." ";
        echo "codclassificacao: " .$dados->codclassificacao." ";
        echo "codmarca: " .$dados->codmarca." ";
        echo "cor: " .$dados->cor." "; 
        echo "tamanho: " .$dados->tamanho." ";
        echo "preco R$: " .$dados->preco."<br>";
        echo '<img src="fotos/'.$dados->foto1.'"height="100" width="100" />'."";
        echo '<img src="fotos/'.$dados->foto2.'"height="100" width="100" />'."<br><br>";
    }
}
?>