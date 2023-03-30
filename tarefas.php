

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
$tema = $_POST['tema'];

$assunto = $_POST['assunto'];
require_once ('database.php');
		$sql ='INSERT INTO tarefas(tema,assunto) values(?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($tema,$assunto));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > Ata inserida com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > Ata  não inserida. Erro.'.$r->getMessage().'</p>';
			}
			header('location:mostrar.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR"  lang="pt-BR" >


<head><title>..:tarefas:..</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />


<meta content="Agenda Web" name=fabiano>
<link rel="stylesheet"   href="estilo.css"  type="text/css">
</head>

	
				
	




<div id="container"></div>
        <div id="header">
        
        </div>
      

  
<div id="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
                        <li><a href="perfil.php">Perfil</a></li>  
			<li><a href="tarefas.php">Tarefas</a></li>
                        <li> <a href="Agenda.php">Agenda</a></li>
                        <li> <a href="relatorio.php">Relatorio</a></li>
                        <li><a href="login.html">Sair</a></li> 
                      <center><h2>Agenda Web</h2></center>			

                 </ul>




</div>
<div id="LeftMenu">
<table border="1"></table>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
var day_of_week = new Array('Dom','Seg','Ter','Qua','Qui','Sex','Sab');
var month_of_year = new Array('Janeiro','Fevereiro','Marco','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');

var Calendar = new Date();

var year = Calendar.getYear();	    // Retorna o ano
var month = Calendar.getMonth();    // Retorna mes (0-11)
var today = Calendar.getDate();    // Retorna dias (1-31)
var weekday = Calendar.getDay();    // Retorna dias (1-31)

var DAYS_OF_WEEK = 7;    // "constant" para o numero de dias na semana
var DAYS_OF_MONTH = 31;    // "constant" para o numero de dias no mes
var cal;    // Usado para imprimir na tela

Calendar.setDate(1);    // Comecar o calendario no dia '1'
Calendar.setMonth(month);    // Comecar o calendario com o mes atual


var TR_start = '<TR>';
var TR_end = '</TR>';
var highlight_start = '<TD WIDTH="25"><TABLE CELLSPACING=0 BORDER=1 BGCOLOR=DEDEFF BORDERCOLOR=CCCCCC><TR><TD WIDTH=21><B><CENTER>';
var highlight_end   = '</CENTER></TD></TR></TABLE></B>';
var TD_start = '<TD WIDTH="45"><CENTER>';
var TD_end = '</CENTER></TD>';

cal =  '<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 BORDERCOLOR=BBBBBB><TR><TD>';
cal += '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=2>' + TR_start;
cal += '<TD COLSPAN="' + DAYS_OF_WEEK + '" BGCOLOR="#EFEFEF"><CENTER><B>';
cal += month_of_year[month]  + '   ' + year + '</B>' + TD_end + TR_end;
cal += TR_start;

for(index=0; index < DAYS_OF_WEEK; index++)
{

if(weekday == index)
cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;
else
cal += TD_start + day_of_week[index] + TD_end;
}

cal += TD_end + TR_end;
cal += TR_start;

for(index=0; index < Calendar.getDay(); index++)
cal += TD_start + '  ' + TD_end;

for(index=0; index < DAYS_OF_MONTH; index++)
{
if( Calendar.getDate() > index )
{
  week_day =Calendar.getDay();
  if(week_day == 0)
  cal += TR_start;
  if(week_day != DAYS_OF_WEEK)
  {
  var day  = Calendar.getDate();
  if( today==Calendar.getDate() )
  cal += highlight_start + day + highlight_end + TD_end;
  else
  cal += TD_start + day + TD_end;
  }
  if(week_day == DAYS_OF_WEEK)
  cal += TR_end;
  }
  Calendar.setDate(Calendar.getDate()+1);
}
cal += '</TD></TR></TABLE></TABLE>';

//  MOSTRAR CALENDARIO
document.write(cal);
//  End -->
</SCRIPT>
<br>


        <center><iframe frameborder="0" allowtransparency="yes" scrolling="no" width="300" height="200" src="http://www.tempoagora.com.br/ta-widgets?cidades=Cachoeirinha-RS,PortoAlegre-RS,Gravatai-RS&amp;tipo=horizontal"></iframe></center>


  
<center><form action="http://www.google.com/search" method="get" target="_blank"><input name="q" value="" size="14" type="text"><input name="domains" value="google.com" type="hidden"><input name="sitesearch" value="" type="hidden"><input value="google" type="submit"></form></center>





</div>
<div id="rightMenu">
<table border="1">
<div id="conteudo">
               
<table border="0" align="center"><tr><td><embed src="http://www.cryd.com.br/relogios-feitos-em-flash/swf/02-10/518.swf" quality="high" wmode="transparent" type="application/x-shockwave-flash" width="180" height="30"></embed></td></tr></table><hr>         
  
<!--<center><p><img src ="img/chave1.png"align="top" width="50" height="50">usuarios logados</p></center>-->


</div>
</div>


</div>
<body>

<form action="mostrar.php" method="post"><fieldset>

 <legend>Ata</legend>
 <table  "width =200px, height =10px>
  <tr>
   <td>
    <label for="tema">Tema: </label>
   </td>
   <td align="left">
    <input type="text" name="tema">
   </td>
  
  </tr>
  <tr>
   <td>
      <label for="assunto">Assunto: </label> </td>
   <td align="left">
<textarea  name="assunto"  rows="10" cols="40"></textarea> 
 <label></br>
   </td>
   <td align="left">
    
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
  </tr><input type="reset" name=" "value="limpar">

</form>
<!--<a href="mostrar.php">pesquisar</a>-->


</body>
</html>
</fieldset></p>












					



<!--editar e salvar faltar botoes-->
              