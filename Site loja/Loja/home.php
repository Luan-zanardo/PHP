<?php
//conectar com bando dados
$connect = mysql_connect('localhost','root','');
$db = mysql_select_db('loja');
?>

<html>
    <head>
        <title> Pesquisa veículos</title>
        <link rel="stylesheet" href="home.css" >
        <style type="text/css">
        </style>
    </head>
    <body>
        
        <div class="container">
            <form name="formulario" method="post" action="Home.php">
            <a href="cadastro.html">
                <img class="imagem" src="https://cdn-icons-png.flaticon.com/512/1946/1946436.png" width=" 50px" height="50px"alt="Logo do Google">
            </a>
            <h1 align="center" >GAME OVER</h1>
            <h2  align="center" >PESQUISA</h2>
            <label for="">Categorias: </label>
                <select class="input" name="categoria">
                    <option value="" selected="selected"></option>
                    <?php
                    $query = mysql_query("select codigo, descricao from categoria");
                    while($categorias = mysql_fetch_array($query))
                    {
                        ?>
                        <option value="<?php echo $categorias['codigo']?>">
                            <?php echo $categorias['descricao']?>
                        </option>
                        <?php 
                    }
                    ?>
                </select>

                <label for="">Classificacoes: </label>
                <select class="input" name="classificacao">
                    <option value="" selected="selected"></option>
                    <?php
                    $query = mysql_query("select codigo, nome from classificacao");
                    while($classificacoes = mysql_fetch_array($query))
                    {
                        ?>
                        <option value="<?php echo $classificacoes['codigo']?>">
                            <?php echo $classificacoes['nome']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>

                <label for="">Marcas: </label>
                <select class="input" name="marca">
                    <option value="" selected="selected"></option>
                    <?php
                    $query = mysql_query("select codigo, nome from marca");
                    while($marcas = mysql_fetch_array($query))
                    {
                        ?>
                        <option value="<?php echo $marcas['codigo']?>">
                            <?php echo $marcas['nome']  ?></option>
                        <?php 
                    }
                    ?>
                </select>
                <div class="pesquisarButton" align="center" >
                    <input class="input" type="submit" name="pesquisar" value="Pesquisar">
                </div>
            </form>
        </div>
        <br><br>
    <?php
        if (isset($_POST['pesquisar']))
        {
            $sql_categorias  = "select * from categorias ";
            $sql_classificacao  = "select * from classificacao ";
            $sql_marcas  = "select * from marca ";
            $pega_categorias = mysql_query($sql_categorias);
            $pega_classificacao = mysql_query($sql_classificacao);
            $pega_marcas = mysql_query($sql_marcas);

            $classificacao = (empty($_POST['classificacao'])) ? 'null' : $_POST['classificacao'];
            $marca = (empty($_POST['marca'])) ? 'null' : $_POST['marca'];
            $categoria = (empty($_POST['categoria'])) ? 'null' : $_POST['categoria'];

            if ($marca <> 'null') {
                $marcasql = "and marca.codigo = $marca";
            } else {
                $marcasql = '';
            }
            if ($classificacao <> 'null') {
                $classificacaosql = "and classificacao.codigo = $classificacao";
            } else {
                $classificacaosql = '';
            }
            if ($categoria <> 'null') {
                $categoriasql = "and categoria.codigo = $categoria";
            } else {
                $categoriasql = '';
            }

            $sql_produtos = "SELECT produto.descricao, classificacao.nome, produto.cor, produto.tamanho, produto.preco, produto.foto1
                            FROM classificacao, produto, marca, categoria
                            WHERE produto.codmarca = marca.codigo
                            and produto.codclassificacao = classificacao.codigo
                            and produto.codcategoria = categoria.codigo
                            $marcasql $classificacaosql $categoriasql";
            $seleciona_produto = mysql_query($sql_produtos);

            if(mysql_num_rows($seleciona_produto) == 0)
            {
            echo '<h1>Desculpe, mas sua busca nao retornou resultados ... </h1>';
            }
            else
            {
            echo "<div class='boxContainer' align='center'>";
            echo "<ul>";
                while($resultado = mysql_fetch_array($seleciona_produto))
                {
                echo "<div class='box' align='center'>
                        <tr><td>".utf8_encode($resultado['descricao'])."</td><br>
                        <td>".utf8_encode($resultado['cor'])."</td><br>
                        <td>".utf8_encode($resultado['tamanho'])."</td><br>
                        <td>".utf8_encode($resultado['preco'])."</td></tr><br><br>
                        <td><img class='photo' src='fotos/" . $resultado['foto1'] . "' height='130' width='180' /></td><br>
                    </div>";
                }
            }
            echo "</div>";
        }
    ?>
    </body>
</html>