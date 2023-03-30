




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

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Consulta Ata</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	

<link rel="stylesheet"   href="estilo.css"  type="text/css"/>

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
	 
					
				</div>
							<form class="form-horizontal" action= "ver1.php" method="post">
				<input type = "hidden" name="id" value="<?php echo $id; ?>"/>
				<fieldset>
					<legend>Ver dados da Ata</legend>
			
					<div class="form-group">
						<label class="col-md-4 control-label" for="tema" >Tema: </label>
						
							<?php echo $dados['tema']; ?>
						
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="assunto" >Assunto: </label>
						
						<?php echo $dados['assunto']; ?>
						
					</div>
					<div class="form-group text-center">
						<div class="col-md-8">
							<a href="mostrar.php" class="btn btn-primary">Voltar</a> 
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
