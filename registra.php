<?php

// Configurando o anúncio (report) de erros (php.ini)
error_reporting(E_ALL);		// prod: E_INFO
ini_set('display_errors', 'on');  // prod: off
date_default_timezone_set('America/Sao_Paulo');

require_once('email.func.php');

	if ( !empty($_POST) ){
		# recebe as variáveis do formulário
		$nome = $_POST['nome'];
	
		$email = $_POST['email'];
		# inicializa variáveis de controle
		$error = '';
		$ok='';
		$e='';
		# testa se vazio 
		if (empty($nome)){
			$error .= 'O nome não pode estar vazio.';
		
		
		}
		if (empty($email)){
			$error .= 'O email não pode estar vazio.';
		}
		# filtra caracteres não-permitidos
		$nome = strip_tags(filter_var($nome));
		
		$email = strip_tags(filter_var($email, FILTER_VALIDATE_EMAIL));
		# Se caracteres não permitidos,
		# incrementa $error com as mensagens
		if (!$nome){
			$error .= 'O nome tem caracteres não permitidos.';
		
		
		}
		if (!$email){
			$error .= 'O email não é válido.';
		}
		$hashopt = [
			'cost' => 5 // default = 10
		];
		$ehash = password_hash($email, PASSWORD_DEFAULT,$hashopt);
		# Para ficar profissional, precisa verificar 
		# a data de expiracão do hash
		#
		# usuário não pode estar ativo se não confirmou o email
		$ativo = false;
		$senha = '';
		# tenta inserir
		require_once('database.php');
		
		try {
			# se $error não estiver vazia,
			# gera exceção e não executa insert
			if (!empty($error)){
				throw new Exception($e);
			}
			$sql = 'INSERT INTO cad (nome,email,email_hash,ativo) VALUES (?,?,?,?)';
			$insercao = $conexao->prepare($sql);
			$ok = $insercao->execute(array($nome,$email,$ehash,$ativo));

			$enviado = envia_email($nome,$email,$ehash);
			
			if(!$enviado) {
				$error .= 'A mensagem não pôde ser enviada.';
				//.$mail->ErrorInfo;
			}
		exit();

		} catch (PDOException $err){
			# entra aqui se houver exceção PDO
			$error .= $err->getMessage();
		} catch (Error $e) {
			$error .= $e->getMessage();
		} catch (Throwable $t) {
			// Executed only in PHP 7, will not match in PHP 5.x
			# entra aqui se houver exceção geral
			$error .= $t->getMessage();
		} catch (Exception $e){
			// Executed only in PHP 5.x, will not be reached in PHP 7
			# entra aqui se houver exceção geral
			$error .= $e->getMessage();
		//} finally {
			# finally SEMPRE é executado
			if (!($ok) || !empty($error)){
				$msg = '<p class="alert alert-danger" >Problemas na inserção. '.$error.'</p>';
			} else {
				$msg = '<p class="alert alert-success" >Inserido com sucesso! Verifique o seu email para ativar a sua conta!</p>';
			}
				header('location:perfil.php?mens='.$msg);
			//echo $msg;
		}
	}
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
	  <meta charset="utf-8" />
	  <title>Registrar</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	  <meta name="description" content="Pagina inicial" />
	  <meta name="author" content="Mascarenhas" />
	  <link href="css/bootstrap.min.css" rel="stylesheet" />
	  <script type="text/javascript" src="js/jquery.min.js" ></script>
	  <script type="text/javascript" src="js/bootstrap.min.js" ></script>
      <style>
        strong{color:red;}
      </style>
	</head>
	<body>
				<div class="page-header">
					<form class="form-horizontal" action="registra.php" method="post"><fieldset>
						<h2>Registra usuário</h2>
                      <p>Por favor <strong>ative a sua conta</strong> em seu <strong>email</strong>cadastrado</p>
						<div class="form-group">
							<label for="nome" class="col-md-4 control-label">Nome</label>
							<div class="col-md-4">
								<input  class="form-control input-md" type="text" name="nome" />
							</div>
						</div>
						<div class="form-group">
						<label for="email" class="control-label col-md-4">Email</label>
							<div class="col-md-4">
								<input type="text" name="email" class="form-control input-md" />
							</div>
						</div>
						<!--<div class="form-group">
							<label for="turma" class="control-label col-md-4">Turma</label>
							<div class="col-md-4">
								<input type="text" name="turma" class="form-control input-md" />
							</div>
						</div>-->
						<div class="form-group text-center">
							<div class="col-md-8" >
								<button type="submit" class="btn btn-success">Gravar</button>
							</div>
						</div>
					</form>
                      </fieldset>
				</div>
				<div class= "foot well">
				<p>&copy; 2015 - ETE Mal. Mascarenhas de Moraes </p>
			</div>
		  </div>
		</div>
	  </div>
	</body>
</html>
