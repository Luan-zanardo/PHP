<?php
$conectar = mysql_connect('localhost','root','');
$db = mysql_select_db('livraria');
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html">
    <title>Pesquisa Livros </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
    <script>
        function obterDadosModal(valor) {

            var retorno = valor.split("*");

            document.getElementById('codigo').value = retorno[0];
            document.getElementById('titulo').value = retorno[1];
            document.getElementById('codcategoria').value = retorno[2];
            document.getElementById('codclassificacao').value = retorno[3];
            document.getElementById('ano').value = retorno[4];
            document.getElementById('edicao').value = retorno[5];
            document.getElementById('codautor').value = retorno[6];
            document.getElementById('editora').value = retorno[7];
            document.getElementById('paginas').value = retorno[8];
            document.getElementById('fotocapa').value = retorno[9];
            document.getElementById('valor').value = retorno[10];
            $codigo = $_GET['codigo'];
        }
    </script>

    <!--Modal Cadastrar-->
    <div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar um Livro ...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="addlivro.php" method="POST" enctype="multipart/form-data">
                        <input type="text" id="codigo" name="codigo" class="span3" value="" required placeholder="Codigo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="titulo" name="titulo" class="span3" value="" required placeholder="Titulo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codcategoria" name="codcategoria" class="span3" value="" required placeholder="Cod categoria" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codclassificacao" name="codclassificacao" class="span3" value="" required placeholder="Cod classificacao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="ano" name="ano" class="span3" value="" required placeholder="Ano" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="edicao" name="edicao" class="span3" value="" required placeholder="Edicao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codautor" name="codautor" class="span3" value="" required placeholder="Cod autor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="editora" name="editora" class="span3" value="" required placeholder="Editora" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="paginas" name="paginas" class="span3" value="" required placeholder="Paginas" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="file" id="fotocapa" name="fotocapa" class="span3" value="" required placeholder="Foto capa" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="valor" name="valor" class="span3" value="" required placeholder="Valor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-success btn-large" id="cadastrar" name="cadastrar" value="cadastrar" style="height: 35px">Cadastrar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <!--Modal Alterar-->
    <div class="modal fade" id="myModalAlterar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h1>Alterar Livros...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="altlivro.php" method="GET">
                        <input type="text" id="codigo" name="codigo" class="span3" value="" required placeholder="Codigo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="titulo" name="titulo" class="span3" value="" required placeholder="Titulo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codcategoria" name="codcategoria" class="span3" value="" required placeholder="Cod categoria" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codclassificacao" name="codclassificacao" class="span3" value="" required placeholder="Cod classificacao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="ano" name="ano" class="span3" value="" required placeholder="Ano" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="edicao" name="edicao" class="span3" value="" required placeholder="Edicao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codautor" name="codautor" class="span3" value="" required placeholder="Cod autor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="editora" name="editora" class="span3" value="" required placeholder="Editora" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="paginas" name="paginas" class="span3" value="" required placeholder="Paginas" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="valor" name="valor" class="span3" value="" required placeholder="Valor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-success btn-large" name="alterar" id="alterar" value="alterar" style="height: 35px">Alterar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
     <!--Modal Excluir-->
    <div class="modal fade" id="myModalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Excluir um Livro...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="exclivro.php" method="GET">
                        <button type="submit" class="btn btn-success btn-large" name="excluir" id="excluir" value="excluir" style="height: 35px">Excluir</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Pesquisar-->
    <div class="container">
        <div class="row">
            <h2>Lista de Livros: </h2><br>
            <form action="cad_livro.php" method="POST">
                <input type="text" name="titulo" id="titulo" placeholder="Titulo ..." class="span4" style="margin-bottom: -2px; height: 25px;">
                <button type="submit" name="pesquisar" id="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
                <a href="#myModalCadastrar">
                 <button type="button" name="gravar" id="gravar" class="btn btn-primary" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button></a>
            </form>
            <table border="1px" bordercolor="gray" class="table table-stripped">
                <tr>
                    <td><b>Codigo</b></td>
                    <td><b>Titulo</b></td>
                    <td><b>Codcategoria</b></td>
                    <td><b>Codclassificacao</b></td>
                    <td><b>Ano</b></td>
                    <td><b>Edicao</b></td>
                    <td><b>Codautor</b></td>
                    <td><b>Editora</b></td>
                    <td><b>Paginas</b></td>
                    <td><b>Foto capa</b></td>
                    <td><b>Valor</b></td>
                </tr>
                <?php
                if ((isset($_POST['pesquisar'])) or isset($_POST['gravar']))
                {
              	    $consulta = "select * from livro";

                   	if ($_POST['titulo'] != '')
                   	{
						$consulta = $consulta." where livro like '%".$_POST['titulo']."%'";
                    }
					
					$resultado = mysql_query($consulta);
					echo $resultado;

					while ($dados = mysql_fetch_array($resultado))
                    {
						$strdados = $dados['codigo']."*".$dados['titulo']."*".$dados['codcategoria']."*".$dados['codclassificacao']."*".$dados['ano']."*".$dados['edicao']."*".$dados['codautor']."*".$dados['editora']."*".$dados['paginas']."*".$dados['fotocapa']."*".$dados['valor'];
				    ?>
                    <tr>
                        <td><?php echo $dados['codigo']; ?></td>
                        <td><?php echo $dados['titulo']; ?></td>
                        <td><?php echo $dados['codcategoria']; ?></td>
                        <td><?php echo $dados['codclassificacao']; ?></td>
                        <td><?php echo $dados['ano']; ?></td>
                        <td><?php echo $dados['edicao']; ?></td>
                        <td><?php echo $dados['codautor']; ?></td>
                        <td><?php echo $dados['editora']; ?></td>
                        <td><?php echo $dados['paginas']; ?></td>
                        <td><?php echo '<img src="fotos/'.$dados['fotocapa'].'"height="100" width="75" />'." "; ?></td>
                        <td><?php echo $dados['valor']; ?></td>
                        <td>
			        	<?php
								echo "<a href='exclivro.php?codigo=".$dados['codigo']."'><button class='btn btn-danger' type='button' id='excluir' name='excluir'>Excluir</button></a>";
							?>
                            <a href="#myModalAlterar" onclick="obterDadosModal('<?php echo $strdados ?>')">
                                <button type='button' id='alterar' name='alterar' class='btn btn-primary' data-toggle='modal' data-target='#myModalAlterar'>Alterar</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
					mysql_close($conectar);
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Biblioteca requerida -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>