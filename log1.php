<?php 
if (!empty($_POST)) {
    session_start();
    include_once('database.php');
    if (isset($_POST['login']) and isset($_POST['senha']) ) {
          $login = $_POST["login"];
          $senha = MD5($_POST["senha"]);
    } else {
          $login = "";
          $senha = "";
    }
       



 // ## Verifica se os dados existem na tabela do banco de dados e se sao unicos ## 
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT nome, senha FROM usuarios WHERE nome= ? and senha= ? ";
        $w = array($login,$senha);
        $q = $pdo->prepare($sql);
        $q->execute($w);
        $dado = $q->fetch(PDO::FETCH_ASSOC);
        $r = $q->rowCount();
        Database::disconnect();
          if ($r == 1) {



            $msg=urlencode("Bem vindo, ");
            $_SESSION['login']="OK";
            $_SESSION['nome']=$dado['nome']; // nome da pessoa logada. Pode ser utilizado junto com a mensagem de boas vindas na página inicial.
            $_SESSION['inicio'] = time();
            $_SESSION['tempo'] = time();
            $_SESSION['vida'] = 600; // tempo da sessao(s): 600s = 10 minutos
            header("location: index.php?retorno=$msg");
          } else {
            $msg=urlencode("Nome de usuário ou senha inválidos, ou problemas no login. Contate o administrador.");
            header("location: log1.php?retorno=$msg");
          }
        }
?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR"  lang="pt-BR" >
<head>
  <title>..::log1 ::..</title>
  <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
  <link href="css/bootstrap_responsive.css" type="text/css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Válido para xHTML 1.x -->
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <style type="text/css">
      /* Override some defaults */
      body {
        padding-top: 10px; 
      }
      .container {
        width: 300px;
      }

      .formm {
          margin-bottom: 30px;
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #eee;
        padding: 20px;
        margin: 0 -20px; 
        -webkit-border-radius: 10px 10px 10px 10px;
           -moz-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

    .login-form {
    margin-left: 50px;
    }
  
    legend {
    margin-right: -50px;
    font-weight: bold;
      color: #404040;
    }

    </style>

  </head>
  <body>    
  <div id="geral">
   

 <h1><a href="index.php"></a></h1>
     
    <div class="navbar">
              <div class="navbar-inner">
                <div class="container">
                  <ul class="nav">
                    <li><a href="log1.php">
</a></li>
                    <li><a href="sobre.php"></a></li>
                    <li><a href="contato.php"></a></li>
                  </ul>
                </div>
              </div>
        </div>
   
     








<div class="container formm">
        <div class="content">
          <div class="row">
            <div class="login-form">
              <h2>Login</h2>
          <form action="log1.php" method="post">
            <div class="control-group">
              <label class="control-label">Usuário</label>
              <div class="controls">
                  <input name="login" type="text"  placeholder="Nome do usuário">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Senha</label>
              <div class="controls">
                  <input name="senha" type="password"  placeholder="Senha">
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Fazer login</button>
            </div>
          </form>
          </div>
          </div>
        </div>
      </div> <!-- /container -->  
        <?php if (!empty($_GET)){ ?>
                      <p class="alert alert-error"><?php echo $_GET['retorno']; ?> </p>
        <?php } ?>
        <?php //echo $_SERVER['REMOTE_ADDR'];  ?>
        <!-- Footer
        ================================================== -->
      <div class="well">
        <p>&copy; 2013 - Prof. José Ricardo - E.T.E. Mal. Mascarenhas de Moraes</p>
      </div>
  </div>
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
