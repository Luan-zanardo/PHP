<?php
$conectar = mysql_connect('localhost', 'root', '');
$banco = mysql_select_db('loja');

if(isset($_POST['cadastrar']))
{
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "insert into marca (codigo, nome)
            values ('$codigo', '$nome')";
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

    $sql = "delete from marca where codigo = '$codigo'";
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
    $nome = $_POST['nome'];

    $sql = "update marca set nome = '$nome' where codigo = '$codigo'";

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
    $sql = mysql_query("select * from marca");
    
    if($sql != TRUE)
    {
        echo "Desculpe, mas sua pesquisa não retornou resultados";
    }
    else
    {
        echo "Resultado da pesquisa das marcas: "."<br><br>";
        while($resultado = mysql_fetch_array($sql))
        {
            echo "Codigo: ".($resultado['codigo'])."<br>
                 nome: ".utf8_encode($resultado['nome'])."<br><br>";
        }
    }
}