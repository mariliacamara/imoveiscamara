<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Cadastro de Agenda - SCA</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	 <script type="text/javascript" language="javascript">
	function checar(e){
		document.form1.acao.value = e;
		document.form1.submit();
	}
</script>
  </head>

  <body onLoad="checar('consultar');">
	<form name="form1" method= "POST" action="#">
		<input type="hidden" name="data1" id="data1" value="<?php echo $_POST['data']; ?>" />
		<input type="hidden" name="hora1" id="hora1" value="<?php echo $_POST['hora']; ?>" />
		<input type="hidden" name="acao" id="acao"/>
	</form>
	
    <div class="container">
		
		<!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sistema de Cadastro de Agenda - SCA</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="iniciomaster.php">Principal</a></li>
              <li><a href="agenda.php">Agenda</a></li>
              <li><a href="usuario.php">Login e Senha</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatório <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="rel_agenda.php">Agenda</a></li>
                  <li><a href="rel_contato.php">Contato</a></li>
                </ul>
              </li>
			  <li><a href="index.php">Sair</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	  
	  <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron" style ='font-size:16px'>
		<?php 
			  // Abre o arquivo com as conexões do BD
				include "conexao.php";
			  
			  // Define as variáveis		
				$result = NULL;
				$acao = NULL;
				$query = NULL;  
				
				// Retorna para o formulário principal 
				if(isset($_POST["cancelar"])){	
				  echo "<script>location.href='agenda.php';</script>";
				}
				
				// Inicia os comandos para a consulta dos dados no banco de dados 
				if(isset($_POST["acao"])){
					switch ($_POST["acao"]){
						case "consultar":
							$data = $_POST["data1"];
							$hora = $_POST["hora1"];
							$query = mysqli_query($cnn,"SELECT * FROM agenda WHERE data = '$data' and hora = '$hora'") or die(mysql_error());       
							$result = mysqli_num_rows($query);
							if($result == 0){
								echo "<script> alert('Evento não Cadastrado!!'); </script>";
								echo "<script> window.location='agenda.php';</script>"; 					
							}
							else{
								$registro = mysqli_fetch_row($query);
								$data = $registro[1];
								$hora = $registro[2];
								$evento = $registro[3];
								$local = $registro[4];
								?>	
								<!-- INICIANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
								<form class="form-signin" name="form1" id="form1" method="POST" action="#">
								<h2 class="form-signin-heading">Dados do Evento - Consultar</h2>
								<center>
								<label for="inputData" >Data</label>
								<input type="text" name="data" id="data" class="form-control" style ='width:150px;text-align:center' value="<?php echo $data;?>" readonly /></br>
								<label for="inputHora" >Hora</label>
								<input type="text" name="hora" id="hora" class="form-control" placeholder="Hh:Mm" style ='width:150px;text-align:center' value="<?php echo $hora;?>" readonly /></br>
								<label for="inputEvento" >Evento</label>
								<input type="text" name="evento" id="evento" class="form-control" placeholder="Informe o Evento..." style ='width:300px;text-align:center' value="<?php echo $evento;?>" readonly /></br>			
								<label for="inputEvento" >Local</label>
								<input type="text" name="local" id="local" class="form-control" placeholder="Informe o Local..." style ='width:500px;text-align:center' value="<?php echo $local;?>" readonly /></br>				
								<button  type="submit" name="cancelar" id="cancelar" style ='width:200px'/>Retornar</button>
								</center>
							  </form>	
							  <!-- FINALIZANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
								<?php
							}						
					}
				}							
								?>						
     </div>
	</div>
	
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>