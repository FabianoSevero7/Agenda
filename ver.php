




﻿<?php 
include('bibliotecas.php');



error_reporting(E_ALL);
ini_set('display_errors','on');
		
if(!empty($_GET) ){
	$id = $_GET ['id'];
		
		require_once ('database.php');
		$sql ='select * from cadastro where id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute(array($id));
		$dados = $consulta->fetch(PDO::FETCH_ASSOC);	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ver</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>

	<link rel="stylesheet"   href="estilo.css"  type="text/css"/>

<style>

</style>

</head>

<body>

			
			<form class="form-horizontal" action= "altera.php" method="post">
				<input type = "hidden" name="id" value="<?php echo $id; ?>"/>
				<fieldset>
					<legend>Ver dados do cadastro</legend>
			<div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="nome" >Nome: </label>
						
							<?php echo $dados['nome']; ?>
						
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="nascimento" >Nascimento: </label>
						
							<?php echo databr($dados['nascimento']); ?>
						
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="telefone" >Telefone: </label>
						
							<?php echo $dados['telefone']; ?>
						
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="email" >Email: </label>
						
							<?php echo $dados['email']; ?>
						
						
					</div>
					
</div>

<div>
<center><img src ="fotos/<?php echo $id; ?>.jpg"align="top" width="160" height="160" border="1"><center/>
</div>		


<div class="form-group text-center">
						<div class="col-md-8">
							<a href="listagem.php" class="btn btn-primary">Voltar</a> 
						</div> 
                       </div>
				</fieldset>
			</form> 
				
		<hr/>
		<div class= "foot well">
		<P>&copy; 2015 - FS </P>
			</p>
		</div>
	</div>
</div>
</body>
</html>
