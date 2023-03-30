<?php 

 
error_reporting(E_ALL);
ini_set('display_errors','on');
include('bibliotecas.php');

if(!empty($_POST) ){
$nome= $_POST['nome'];
$email= $_POST['email'];
$telefone= $_POST['telefone'];
$descricao= $_POST['descricao'];
$dia = $_POST['dia'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$nascimento=$ano."-".$mes."-".$dia;
//$value=$_POST['opcao'];

require_once ('database.php');
$error='';
		$sql ='INSERT INTO compromissos (nome,email,telefone,nascimento,descricao) values(?,?,?,?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($nome,$email,$telefone,$nascimento,$descricao));                   
		}catch(PDOException $r){
			$error .= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
        $error .= 'Problemas com o SGBD.'.$r->getMessage();
		$ok= False; 
		
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > compromissos inserido com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger"> compromissos nao inserido. Erro.'.urlencode($error).'</p>';
			}
			
header('location:ag1.php?mensagem='.$msg);//redireciona para local especificado
	
		}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <title>lista de compromissos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<link href="css/style.css" rel="stylesheet">
</head>

  
				
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
		$sql ='select * from compromissos ';
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
		<tr><th>Nome</th><th>Email</th><th>Telefone</th><th>data</th><th>Descricao</th><th>opcao</th><th>Acoes</th><th>Acoes</th><th>Acoes</th></tr>
		</thead>
		<tbody>
		<?php
		foreach($dados as $value){
			

echo'<tr><td>'.$value['nome'].'</td><td>'.$value['email'].'</td><td>'.$value['telefone'].'</td><td>'.$value['nascimento'].'</td>
<td>'.$value['descricao'].'</td></td>
<td>
<a href="altera2.php?id='.$value['id'].'">
	ALTERAR</a>
</td>
<td>
<a href="ag1deleta.php?id='.$value['id'].'">
DELETAR</a>
</td>



<td>
<a href="ver2.php?id='.$value['id'].'">
ver</a>
</td>


	


<td>
<a href="Agenda.php?id='.$value['id'].'">
inserir</a>
</td>



</tr>';	



	

		}
		?>




		</tbody>
		</table>
		
		<hr/>
		<div class= "foot well">
		<P>&copy; 2015 -Billy </P>
			</p>
		</div>
	</div>
</div>
</body>
</html>








































