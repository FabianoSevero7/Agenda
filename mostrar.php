


<?php 
include('bibliotecas.php');



error_reporting(E_ALL);
ini_set('display_errors','on');
		
if(!empty($_POST) ){
	$id = $_GET ['id'];
		
		require_once ('database.php');
		$sql ='select * from tarefa where id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute(array($id));
		$dados = $consulta->fetch(PDO::FETCH_ASSOC);	
}

if(!empty($_POST) ){
$tema = $_POST['tema'];

$assunto = $_POST['assunto'];
require_once ('database.php');
		$sql ='INSERT INTO tarefa(tema,assunto) values(?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($tema,$assunto));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > Ata inserida com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > Ata  não inserida. Erro.'.$r->getMessage().'</p>';
			}
			header('location:mostrar.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR"  lang="pt-BR" >

<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<meta content="Agenda Web" name=fabiano> 
<link rel="shortcut icon" href="img/pilseta.gif">


<body>

			
					
			
				
	
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
		$sql ='select * from tarefa';
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
		<tr>
<th>tema da reuniao</th><th>assunto</th><th>Ações</th><th>Acões</th><th>Ações</th><th>Ações</th>
</tr>
<!--<hr/>-->		</thead>
		<tbody>


		<?php
		foreach($dados as $value){
			echo'<tr><td>'.$value['tema'].'</td><td>'.$value['assunto'].'</td><td>
						
<a href="altera1.php?id='.$value['id'].'"><img  src="img/ver.png" width="" height="" alt="" target="blank" title="alterar"/><!--
alterar-->			</a>
			</td>
			
<td>
	
<a href="d1.php?id='.$value['id'].'"><img  src="img/d.png" width="" height="" alt=""target="blank" title="Deletar" /><!--
deletar--></a>
			</td>



<td>
<a href="ver1.php?id='.$value['id'].'">
<img  src="img/l.png" width="" height="" alt="" target="blank" title="ver" /><!--ver-->			</a>
</td>


<td>
<a href="tarefas.php?id='.$value['id'].'">
<img  src="img/perfil.png" width="" height="" alt="" target="blank" title="inserir" /><!--inserir-->			</a>
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



