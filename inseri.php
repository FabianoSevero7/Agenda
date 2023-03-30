










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head><title>..:Cadastro:..</title></head>
<meta http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<meta content="Agenda Web" name=Fabiano>
<link rel="stylesheet"   href="estilo.css"  type="text/css">
</head>



<form action="inserir.php" method="post" enctype="multipart/form-data" />
<fieldset>
 <legend>Dados Pessoais</legend>
<?php
$numero = rand(10000,99999);
echo "$numero";
?>

<input type="numero" name="codigo">
 <p> insira os  numeros de seguranca !!!</p>
 <table>
  <tr>
  
   <td>
    <!--<label for="senha">Senha: </label>-->
   <!--<td align="left">-->
   <!-- <input type="text" name="senha">--> 
  </td>
 
  </tr>
 
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
    <label>Nascimento: </label>
   </td>
   <td align="left">
    <input type="text" name="dia" size="2" maxlength="2" placeholder="dd"> 
   <input type="text" name="mes" size="2" maxlength="2" placeholder="mm">
   <input type="text" name="ano" size="4" maxlength="4" placeholder="aaaa">
   </td>
  </tr>
  <tr>
   <td>
    <label for="Telefone">telefone: </label></br>
   </td>
   <td align="left">
    <input type="text" name="telefone" size="13" maxlength="13"> 
   </td>
  </tr>
  <tr>
   <td>
    <label>E-mail:</label>
   </td>
   <td align="left">
    <input type="text" name="email" size="23" maxlength="23"> 
   </td>
  </tr>
<tr>
   <td>
  
<input type="file" name="foto" /><BR>






   </td>
  </tr>
 </table>

<br/>


<input type="submit" value="Cadastrar">
<input type="reset" name="submit "value="limpar">
</fieldset>
</form>
</body>
</html>






