
<?php


include('bibliotecas.php');



error_reporting(E_ALL);
ini_set('display_errors','on');
		
if(!empty($_GET) ){
	        $id = $_GET ['id'];
		require_once ('database.php');
		$sql ='select * from tarefa where id=?';
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $q = $conexao->prepare($sql);
		$q->execute(array($id));
		$dados =$q->fetch(PDO::FETCH_ASSOC);


	
}
if(!empty($_POST) ){
$id =$_POST ['id'];

$tema=$_POST['tema'];


$assunto=$_POST['assunto'];
		$ok = true;
          require_once ('database.php'  );
			$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE tarefa SET tema =?,assunto=? WHERE id = ?";
try {
			$q = $conexao->prepare($sql);
			$q->execute(array($tema,$assunto,$id));
			
		}catch(PDOException $r){
			$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
           $msg= 'Problemas com o SGBD.'.$r->getMessage();
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > Ata alterado com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > Ata  não alterado. Erro.'.$msg.'</p>';
			}
			header('location:mostrar.php?mensagem='.$msg);//redireciona para local especificado{

	}

?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>altera1</title>
  <meta name="viewport" content="">
  <meta name="description" content="">
  <meta name="author" content="">
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<form  action= "altera1.php" method="post">
				<input type = "hidden" name="id" value="<?php echo $id;
?>"/>
				<fieldset>
					<legend>alterar  dados da Ata</legend>
			
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="tema" >Tema: </label>
						
							
						
	                                 <input type = "text" name="tema" value="<?php echo $dados['tema']; ?>"/>
					</div>

                                        <div class="form-group">
						<label class="col-md-4 control-label" for="assunto"> Assunto: </label>
					<input type = "text" name="assunto" value="<?php  echo $dados['assunto']; ?>"/>	
						
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


