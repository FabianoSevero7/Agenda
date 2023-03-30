<html>
<head>
<title>Relatorio</title>
<style type="text/css">
.eject { page-break-before: always;}
th {font-family: Arial, Helvetica, sans-serif;font-size: 9pt;background:#CCCCCC;}
td {font-family: Arial, Helvetica, sans-serif;font-size: 9pt;}      
</style>

<script language="JavaScript">
<!-- Begin
function varitext(text){
text=document
print(text)
}
//  End -->
</script>
</head>


<!-- Passo 2: Adicionem o ultimo código para o BODY do documento HTML  -->
<body>


 <center>

     <b>Relatório de Reuniões</b>

     <hr width="90%"> 

   </center>

 

 <table border="1" width="20%" align="center"><thead>

  <tr>
   <th width="20%">Data</th><th width="20%">Usuario</th><th width="20%">Reuniões</th><th width="20%">Atas</th></tr></thead>
<tbody>
		
					  echo'<tr><td>'.$value['data'].'</td><td>'.$value['usuario'].'</td><td>'.$value['reuniões'].'</td><td>'.$value['atas'].'</td>
</tr>
</tbody>

<div align="center">
<form>
<input name="print" type="button" value="Imprimir"
ONCLICK="varitext()">
</form><br><br>

</body>
</html>