<?php


include('bibliotecas.php');



error_reporting(E_ALL);
ini_set('display_errors','on');
		
if(!empty($_GET) ){
	$id = $_GET ['id'];
		require_once ('database.php'  );
		$sql ='select * from compromissos where id=?';
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  $q = $conexao->prepare($sql);
		$q->execute(array($id));
		$dados = $q->fetch(PDO::FETCH_ASSOC);

$n=explode("-",$dados['nascimento']);
$dia=$n[2];
$mes=$n[1];
$ano=$n[0];
echo"dia";
echo"mes";
echo"ano";
	
}
if(!empty($_POST) ){
$id = $_POST ['id'];
$nome = $_POST['nome'];
$dia = $_POST['dia'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];

$telefone = $_POST['telefone'];
$email = $_POST['email'];

$nascimento=$ano."-".$mes."-".$dia;
$descricao=$_POST['descricao'];
		$ok = true;
          require_once ('database.php'  );
			$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE compromissos SET nome = ?, nascimento=?, telefone=?,email =?,descricao=? WHERE id = ?";
try {
			$q = $conexao->prepare($sql);
			$q->execute(array($nome,$nascimento,$telefone,$email,$descricao,$id));
			
		}catch(PDOException $r){
			$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
           $msg= 'Problemas com o SGBD.'.$r->getMessage();
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > compromisso alterado com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > compromisso  não alterado. Erro.'.$msg.'</p>';
			}
			header('location:ag1.php?mensagem='.$msg);//redireciona para local especificado{

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
<form class="form-horizontal" action= "altera2.php" method="post">
				<input type = "hidden" name="id" value="<?php echo $id; ?>"/>
				<fieldset>
					<legend>alterar  dados do cadastro</legend>
			
					<div class="form-group">
						<label class="col-md-4 control-label" for="nome" >Nome: </label>
						
						
					<input type = "text" name="nome" value="<?php echo $dados['nome']; ?>"/>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="nascimento" >Nascimento: </label>
				       <input type="text" name="dia" size="2" maxlength="2" placeholder="dd"    value="<?php echo $dia ; ?>">   
                                       <input type="text" name="mes" size="2" maxlength="2" placeholder="mm"    value="<?php echo $mes; ?>">
                                       <input type="text" name="ano" size="4" maxlength="4" placeholder="aaaa"  value="<?php echo $ano; ?>">
								
							<!--<input type = "text" name="nascimento" value="<?php echo $dados['nascimento']; ?>"/>-->
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="telefone" >Telefone: </label>
						
							<input type = "text" name="telefone" value="<?php echo $dados['telefone']; ?>"/>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="email" >Email: </label>
						
							<!--<?php echo $dados['email']; ?>-->
							<input type = "text" name="email" value="<?php echo $dados['email']; ?>"/>
						
					</div>

<div class="form-group">
						<label class="col-md-4 control-label" for="descricao" >Descricao: </label>
						
							
							<input type = "text" name="descricao" value="<?php echo $dados['descricao']; ?>"/>
						
					</div>

					<div class="form-group text-center">
						<div class="col-md-8">
							<a href="ag1.php" class="btn btn-primary">Voltar</a> 
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
