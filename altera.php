<?php


include('bibliotecas.php');



error_reporting(E_ALL);
ini_set('display_errors','on');
		
if(!empty($_GET) ){
	$id = $_GET ['id'];
		require_once ('database.php'  );
		$sql ='select * from cadastro where id=?';
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
		$ok = true;
          require_once ('database.php'  );
			$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE cadastro SET nome =?, nascimento=?, telefone=?,email =? WHERE id = ?";
try {
			$q = $conexao->prepare($sql);
			$q->execute(array($nome,$nascimento,$telefone,$email,$id));
			
		}catch(PDOException $r){
			$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
           $msg= 'Problemas com o SGBD.'.$r->getMessage();
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > cadastro alterado com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > cadastro  não alterado. Erro.'.$msg.'</p>';
			}
			header('location:listagem.php?mensagem='.$msg);//redireciona para local especificado{

	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR"  lang="pt-BR" >


<head>

<title>altera.php</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<meta content="Agenda Web" name=fabiano> 
<link rel="shortcut icon" href="img/pilseta.gif">

<link href="css/style.css" rel="stylesheet">
</head>
<body>
<form class="form-horizontal" action= "altera.php" method="post">
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
					<div class="form-group text-center">
						<div class="col-md-8">
							<a href="listagem.php" class="btn btn-primary">Voltar</a> 
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
