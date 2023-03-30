<?php 
include('bibliotecas.php');



error_reporting(E_ALL);
ini_set('display_errors','on');
		
if(!empty($_POST) ){
	$id = $_GET ['id'];
		
		require_once ('database.php');
		$sql ='select * from cadastro where id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute(array($id));
		$dados = $consulta->fetch(PDO::FETCH_ASSOC);




}

if(!empty($_POST) ){
$nome = $_POST['nome'];
$dia = $_POST['dia'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$nascimento=$ano."-".$mes."-".$dia;
require_once ('database.php');
		$sql ='INSERT INTO cadastro(nome,nascimento,telefone,email) values(?,?,?,?)';
	

	try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($nome,$nascimento,$telefone,$email));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > cadastro inserido com sucesso.  </p>';
				}else{
				$msg='<p class="alert alert-danger" > cadastro  não inseridos. Erro.'.$r->getMessage().'</p>';
		

	}
			header('location:listagem.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>listagem php</title>
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
		<tr><th>Nome</th><th>Nascimento</th><th>Telefone</th><th>Email</th><th>Ações</th><th>Ações</th><th>Ações</th><th>Ações</th></tr>
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
<img  src="img/l.png" width="" height="" alt="" target="blank" title="ver" /><!--ver--></a></td>


<td>


<a href="perfil.php?id='.$value['id'].'"><img  src="img/perfil.png" width="" height="" alt=""target="blank" title="Inserir" /><!--
inserir--></a>



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
