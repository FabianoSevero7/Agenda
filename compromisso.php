

<?php 
include('bibliotecas.php');



error_reporting(E_ALL);
ini_set('display_errors','on');
		
if(!empty($_GET) ){
	$id = $_GET ['id'];
		
		require_once ('database.php');
		$sql ='select * from compromisso where id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute(array($id));
		$dados = $consulta->fetch(PDO::FETCH_ASSOC);	
}




if(!empty($_POST) ){
$nome = $_POST['nome'];


$email = $_POST['email'];
$telefone = $_POST['telefone'];

$dia = $_POST['dia'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];

$nascimento=$ano."-".$mes."-".$dia;
$descricao = $_POST['descricao'];



require_once ('database.php');
		$sql ='INSERT INTO compromissos(nome,email,telefone,nascimento,descricao) values(?,?,?,?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($nome,$email,$telefone,$nascimento,$descricao));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > compromisso inserido com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" >  compromisso não inserido. Erro.'.$r->getMessage().'</p>';
			}
			header('location:compromisso.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>











<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>relatorio</title>

 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
   <link rel="shortcut icon" href="img/pilseta.gif">

<a href="compromisso.php">voltar</a>
<hr/> 

</head>

<body>

<form action="compromisso.php" method="post"><fieldset>
 <legend>compromisso</legend>
 <table  "width =200px, height =10px>
  <tr>
   <td>
    <label for="nome">Nome: </label>
   </td>
   <td align="left">
    <input type="text" name="nome">
   </td>
  
  </tr>
  <tr>
   <td>
  


<tr>
   <td>
    <label for="email">Email: </label>
   </td>
   <td align="left">
    <input type="text" name="email">
   </td>
  
  </tr>
  <tr>
   



   <td>
    <label for="telefone">Telefone: </label>
  <td align="left">
    <input type="text" name="telefone">
   </td>
  </tr>
<tr>
   <td>
 <labelfor="data"  >Data: </label>
   <td align="left">
    <input type="text" name="dia" size="2" maxlength="2" value="dd"> 
   <input type="text" name="mes" size="2" maxlength="2" value="mm">
   <input type="text" name="ano" size="4" maxlength="4" value="aaaa">
   </td>
  </tr>
                                                                  
  <p><input type="checkbox" name="opcao" value="1" > publico
  <input type="checkbox" name="opcao" value="2" >  privado

<select>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select>
  </p>                                                                      
     <td>
                

    <label for="descricao">Descricao: </label></br>
   </td>
   <td align="left">
    
        <textarea  name="descricao"  rows="10" cols="40"></textarea> 
   </td>
  </tr>
  <tr>
   <td>
      </td>
   <td align="left">
    
   </td>
  </tr>
<tr>
   <td>
     </td>
  </tr>
 </table>

<br/>


<input type="submit" value="Cadastrar"></td>
  </tr><input type="reset" name="submit "value="limpar">

</form>



</body>
</html>
</fieldset></p>







</body>

</html>



	

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>lista de compromissos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
   <link rel="shortcut icon" href="img/pilseta.gif">

<a href="agenda.php">voltar</a>
<hr/>  
				</li>
			</ul>
			<div class="page-header">
			<?php
			if (isset($_GET) and !empty($_GET['mensagem'])){
				echo $_GET ['mensagem'];
				}
			?>
			</div>
			<p>
			<?php error_reporting(E_ALL);
		ini_set('display_errors','on');
		require_once ('database.php');
		$sql ='select * from compromissos ';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
		//print_r($dados);
		//var_dump($dados);
		//foreach($dados as $d){
			//echo'<p>'.$d['Nome'].'</p>';
		//}
		?>
		<table class="table table-bordered">
		<thead>
		<tr><th>Nome</th><th>Email</th><th>Telefone</th><th>data</th><th>Descricao</th><th>opcao</th><th>Acoes</th></tr>
		</thead>
		<tbody>
		<?php
		foreach($dados as $value){
			echo'<tr><td>'.$value['nome'].'</td><td>'.$value['email'].'</td><td>'.$value['telefone'].'</td><td>'.$value['nascimento'].'</td>
<td>'.$value['descricao'].'</td></td>

			<td>
			<a href="altera2.php?id='.$value['id'].'">
			ALTERAR</a>
			</td>
			
<td>
	<a href="deleta2.php?id='.$value['id'].'">
			DELETAR</a>
			</td>


<td>
	<a href="ver2.php?id='.$value['id'].'">
			ver</a>
			</td>


			</tr>';	



	

		}
		?>




		</tbody>
		</table>
		
		<hr/>
		<div class= "foot well">
		<P>&copy; 2015 -Billy </P>
			</p>
		</div>
	</div>
</div>
</body>
</html>








