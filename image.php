


<!DOCTYPE html>
<html lang="en">
<head>
 
<title>menbros</title>

<link rel="shortcut icon" href="img/pilseta.gif" >
<link rel="stylesheet"   href="estilo.css"  type="text/css"> 

</head> 



<body>
<?php



$img = array(

    '<img src="img/chave1.png" width="150" height="99"/>',

    '<img src="img/grafico.png" width="400" height="245"/>',

    '<img src="img/maos.jpg" width="150" height="190"/>',

    '<img src="img/cabeça.jpg" width="150" height="190"/>',
    '<img src="img/pessoa.png" width="150" height="190"/>',
    '<img src="img/14lq8vp.png" width="150" height="190"/>',

);



shuffle( $img );


$rodar=array_slice($img,0,1);
$rodar=array_slice($img,0,2);
$rodar=array_slice($img,0,3);
$rodar=array_slice($img,0,4);
$rodar=array_slice($img,0,5);
$rodar=array_slice($img,0,6);
echo implode('',$rodar);

?>


</body>
</html>