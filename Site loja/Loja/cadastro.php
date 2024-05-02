<?php
$conectar = mysql_connect('localhost', 'root', '');
$banco = mysql_select_db('loja');

if(isset($_POST['cadastrar']))
{
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = mysql_query("insert into usuario (codigo, nome, login, senha)
                       values ('$codigo', '$nome', '$login', '$senha')");
    $resultado = mysql_query($sql);

    if ($resultado) 
    {
        echo "Falha ao gravar os dados informados";
    } else 
    {
        echo "Dados cadastrados com sucesso";
    }
}

if(isset($_POST['excluir']))
{
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = mysql_query("delete from usuario where codigo = $codigo");
    $resultado = mysql_query($sql);

    if($resultado)
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
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "update usuario set nome='$nome',login = '$login', senha = '$senha'
            where codigo = '$codigo'";

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
    $sql = mysql_query("select codigo, nome, login from usuario");
    
    if($sql != TRUE)
    {
        echo "Desculpe, mas sua pesquisa não retornou resultados";
    }
    else
    {
        echo "Resultado da pesquisa dos usuarios: "."<br><br>";
        while($resultado = mysql_fetch_array($sql))
        {
            echo "Codigo: ".($resultado['codigo'])."<br>".
                 "Nome: ".utf8_encode($resultado['nome'])."<br>".
                 "Login: ".utf8_encode($resultado['login'])."<br><br>";
        }
    }
}