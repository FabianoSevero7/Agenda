<?php 
include('bibliotecas.php');



error_reporting(E_ALL);
ini_set('display_errors','on');
		
if(!empty($_GET) ){
	$id = $_GET ['id'];
		
		require_once ('database.php');

		$sql ='select * from tarefa where id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute(array($id));
		$dados = $consulta->fetch(PDO::FETCH_ASSOC);	
}
if(!empty($_POST) ){

$id = $_POST['id'];

require_once ('database.php');
       
		$sql ='DELETE FROM tarefa WHERE id =?';
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
			header('location:mostrar.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Consulta marca</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">



				</li>
			</ul>
					
			</div>
			<form class="form-horizontal" action= "d1.php" method="post">
				<input type = "hidden" name="id" value="<?php echo $id; ?>"/>
                



				<fieldset>
					<legend>deletar dados da Ata</legend>
			
					<div class="form-group">
						<label class="col-md-4 control-label" for="tema" >tema da reuniao: </label>
						
							<?php echo $dados['tema']; ?>
						
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="assunto" >assunto: </label>
						
							<?php echo ($dados['assunto']); ?>
						
					</div>
								
						
					</div>
					<div class="form-group text-center">
						<div class="col-md-8">
							<a href="mostrar.php" class="btn btn-primary">Voltar</a> 
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


