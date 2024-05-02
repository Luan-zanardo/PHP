<?php
$conectar = mysql_connect('localhost','root','');
$db = mysql_select_db('livraria');
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html">
    <title>Pesquisa Categorias </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
    <script>
        function obterDadosModal(valor) {

            var retorno = valor.split("*");

            document.getElementById('codigo').value = retorno[0];
            document.getElementById('descricao').value = retorno[1];
        }
    </script>

    <!--Modal Cadastrar-->
    <div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar uma Categoria ...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="addcategoria.php" method="GET">
                        <input type="text" id="codigo" name="codigo" class="span3" value="" required placeholder="Codigo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="descricao" name="descricao" class="span3" value="" required placeholder="Descricao" style=" margin-bottom: -2px; height: 25px;"><br><br>
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
                    <h1>Alterar Categoria...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="altcategoria.php" method="GET">
                        <input type="text" id="codigo" name="codigo" class="span3" value="" required placeholder="Codigo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="descricao" name="descricao" class="span3" value="" required placeholder="Descricao" style=" margin-bottom: -2px; height: 25px;"><br><br>
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
                    <h1>Excluir uma Categoria...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="exccategoria.php" method="GET">
                        <button type="submit" class="btn btn-success btn-large" name="excluir" id="excluir" value="excluir" style="height: 35px">Excluir</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <h2>Lista de Categorias: </h2><br>
            <form action="cad_categoria.php" method="POST">
                <input type="text" name="descricao" id="descricao" placeholder="Descricao ..." class="span4" style="margin-bottom: -2px; height: 25px;">
                <button type="submit" name="pesquisar" id="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
                <a href="#myModalCadastrar">
                 <button type="button" name="gravar" id="gravar" class="btn btn-primary" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button></a>
            </form>
            <table border="1px" bordercolor="gray" class="table table-stripped">
                <tr>
                    <td><b>Codigo</b></td>
                    <td><b>Descricao</b></td>
                    <td><b>Operacao</b></td>
                </tr>
                <?php
                if ((isset($_POST['pesquisar'])) or isset($_POST['gravar']))
                {
              	    $consulta = "select * from categoria";

                   	if ($_POST['descricao'] != '')
                   	{
						$consulta = $consulta." where descricao like '%".$_POST['descricao']."%'";
                    }
					
					$resultado = mysql_query($consulta);
					echo $resultado;

					while ($dados = mysql_fetch_array($resultado))
                    {
						$strdados = $dados['codigo']."*".$dados['descricao'];
				    ?>
                    <tr>
                        <td><?php echo $dados['codigo']; ?></td>
                        <td><?php echo $dados['descricao']; ?></td>
                        <td>
			        	<?php
								echo "<a href='exccategoria.php?codigo=".$dados['codigo']."'><button class='btn btn-danger' type='button' id='excluir' name='excluir'>Excluir</button></a>";
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
