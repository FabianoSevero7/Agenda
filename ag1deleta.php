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
if(!empty($_POST) ){

$id = $_POST['id'];

require_once ('database.php');
       
		$sql ='DELETE FROM compromissos WHERE id =?';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($id));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > dados deletado com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > dados  não deletado. Erro.'.$r->getMessage().'</p>';
			}
			header('location:ag1.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>
<p>tem certa que deseja deletar?</p>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Deletar compromisso</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">



				</li>
			</ul>
					
			</div>
			<form class="form-horizontal" action= "ag1deleta.php" method="post">
				<input type = "hidden" name="id" value="<?php echo $id; ?>"/>
                



				<fieldset>
					<legend>Deletar Compromisso</legend>
			
					<div class="form-group">
						<label class="col-md-4 control-label" for="nome" >Nome: </label>
						
							<?php echo $dados['nome']; ?>
						
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="email" >Email: </label>
						
							<?php echo ($dados['email']); ?>
						
					</div>
	

<div class="form-group">
						<label class="col-md-4 control-label" for="telefone" >Telefone: </label>
						
							<?php echo ($dados['telefone']); ?>
						
					</div>
	
<div class="form-group">
						<label class="col-md-4 control-label" for="descricao" >Descricao: </label>
						
							<?php echo ($dados['descricao']); ?>
						
					</div>
	

















							
						
					</div>
					<div class="form-group text-center">
						<div class="col-md-8">
							<a href="ag1.php" class="btn btn-primary">Voltar</a> 
						</div> 
					</div>		
				</fieldset>
<input type = "submit" name="" value="apagar"/>
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



