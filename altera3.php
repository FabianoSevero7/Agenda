<?php


include('bibliotecas.php');



error_reporting(E_ALL);
ini_set('display_errors','on');
		
if(!empty($_GET) ){
	        $id = $_GET ['id'];
		require_once ('database.php'  );
		$sql ='select * from descricao where id=?';
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $q = $conexao->prepare($sql);
		$q->execute(array($id));
		$dados = $q->fetch(PDO::FETCH_ASSOC);

	
}
if(!empty($_POST) ){
$id = $_POST ['id'];
$tema = $_POST['tema'];
$descricao=$_POST['descricao'];
		$ok = true;
          require_once ('database.php'  );
			$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE descricao SET tema =?,descricao=? WHERE id = ?";
try {
			$q = $conexao->prepare($sql);
			$q->execute(array($tema,$descricao,$id));
			
		}catch(PDOException $r){
			$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
           $msg= 'Problemas com o SGBD.'.$r->getMessage();
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > alterado com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" >   não alterado. Erro.'.$msg.'</p>';
			}
			header('location:mostrar.php?mensagem='.$msg);//redireciona para local especificado{

	}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Editar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<form class="form-horizontal" action= "altera1.php" method="post">
				<input type = "hidden" name="id" value="<?php echo $id; ?>"/>
				<fieldset>
					<legend>alterar  dados da Ata</legend>
			
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="tema" >Tema: </label>
						
							
							<input type = "text" name="tema" value="<?php echo $dados['tema']; ?>"/>
						
					</div>

<div class="form-group">
						<label class="col-md-4 control-label" for="descricao" >Descricao: </label>
						
							
							<input type = "text" name="descricao" value="<?php echo $dados['descricao']; ?>"/>
						
					</div>

					<div class="form-group text-center">
						<div class="col-md-8">
							<a href="mostrar.php" class="btn btn-primary">Voltar</a> 
															</div> 
					</div>		
				</fieldset>
<input type = "submit" name="gravar" value="Gravar"/>
			</form> 

				
		<hr/>
		<div class= "foot well">
		<P>&copy; 2015 - Fabiano </P>
			</p>
		</div>
	</div>
</div>
</body>
</html>
