
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>inserir php</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
   <link rel="shortcut icon" href="img/pilseta.gif">

<a href="inseri.php">voltar</a>
<!--<hr/>-->  
				</li>
			</ul>
			<div class="page-header">
			<?php
			if (isset($_GET) and !empty($_GET['mensagem'])){
				echo $_GET ['mensagem'];
				}
			?>
			</div>
			<p>
			<?php error_reporting(E_ALL);
		ini_set('display_errors','on');
		require_once ('database.php');
		$sql ='select * from cadastro';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
		//print_r($dados);
		//var_dump($dados);
		//foreach($dados as $d){
			//echo'<p>'.$d['Nome'].'</p>';
		//}
		?>
		<table border="1">
		<thead>
		<tr><th>Nome</th><th>Nascimento</th><th>Telefone</th><th>Email</th><th>Ações</th></tr>
		</thead>
		<tbody>
		<?php
		foreach($dados as $value){
			echo'<tr><td>'.$value['nome'].'</td><td>'.$value['nascimento'].'</td><td>'.$value['telefone'].'</td><td>'.$value['email'].'</td>
			<td>
			
<a href="altera.php?id='.$value['id'].'"><img  src="img/ver.png" width="16" height="16" alt="1" target="blank" title="alterar"/><!--
alterar-->
			</a>
			</td>
			
<td>
	<a href="deleta.php?id='.$value['id'].'"><img  src="img/d.png" width="" height="" alt=""target="blank" title="Deletar" /><!--
deletar--></a>
	
						</td>


<td>
	<a href="ver.php?id='.$value['id'].'">
<img  src="img/l.png" width="" height="" alt="" target="blank" title="ver" /><!--ver-->		
			</a>
			</td>


			</tr>';	



	

		}
		?>
		</tbody>
		</table>
		
		<hr/>
		<div class= "foot well">
		<P>&copy; 2015-Fabiano </P>
			</p>
		</div>
	</div>
</div>
</body>
</html>
