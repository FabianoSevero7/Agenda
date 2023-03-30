



<?php 
include('bibliotecas.php');



error_reporting(E_ALL);
ini_set('display_errors','on');
		
if(!empty($_GET) ){
	$id = $_GET ['id'];
		
		require_once ('database.php');
		$sql ='select * from compromissos where id=?';
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<link href="css/style.css" rel="stylesheet">


				<p class="alert alert-success" >   </p>
			<div class="page-header">
			<p> </p>	
			</div>
			<form class="form-horizontal" action= "altera.php" method="post">
				<input type = "hidden" name="id" value="<?php echo $id; ?>"/>
				<fieldset>
					<legend>Ver Compromisso</legend>
			
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
                                       <div class="form-group">
						<label class="col-md-4 control-label" for="descricao" >Descricao: </label>
						
							<?php echo $dados['descricao']; ?>
                                         </div>

					<div class="form-group text-center">
						<div class="col-md-8">
							<a href="ag1.php" class="btn btn-primary">Voltar</a> 
						</div> 
					</div>		
				</fieldset>
			</form> 
				
		<hr/>
		<div class= "foot well">
		<P>&copy; 2015 - JRB </P>
			</p>
		</div>
	</div>
</div>
</body>
</html>
