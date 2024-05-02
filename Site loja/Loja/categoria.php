<?php
$conectar = mysql_connect('localhost', 'root', '');
$banco = mysql_select_db('loja');

if(isset($_POST['cadastrar']))
{
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];

    $sql = "insert into categoria (codigo, descricao)
            values ('$codigo', '$descricao')";
    $resultado = mysql_query($sql);

    if($resultado != TRUE)
    {
         echo "Falha ao gravar dados informados"; 
    }
    else
    {
        echo "Dados cadastros com sucesso"; 
    }
}

if(isset($_POST['excluir']))
{
    $codigo = $_POST['codigo'];

    $sql = "delete from categoria where codigo = '$codigo'";
    $resultado = mysql_query($sql);

    if($resultado != TRUE)
    {
        echo "Falha ao excluir os dados informados"; 
    }
    else
    {
        echo "Dados excluido com sucesso"; 
    }
}

if (isset($_POST['alterar']))
{
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];

    $sql = "update categoria set descricao = '$descricao' where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE)
    {
        echo 'Dados alterados com Sucesso';
    }
    else
    {
        echo 'Erro ao alterar dados';
    }
}

if(isset($_POST['pesquisar']))
{
    $sql = mysql_query("select * from categoria");
    
    if($sql != TRUE)
    {
        echo "Desculpe, mas sua pesquisa não retornou resultados";
    }
    else
    {
        echo "Resultado da pesquisa das categorias: "."<br><br>";
        while($resultado = mysql_fetch_array($sql))
        {
            echo "Codigo: ".($resultado['codigo'])."<br>
                 Descricao: ".utf8_encode($resultado['descricao'])."<br><br>";
        }
    }
}