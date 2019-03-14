<?php
    session_start();
?>

<!DOCTYPE html>
<html>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
	<title>Imoveis Câmara</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/style.css">

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
	
	  <!-- Main component for a primary marketing message or call to action -->
		<div class="container">
				<div class="d-flex justify-content-center h-100">
					<div class="card">
						<div class="card-header">
							<h3>Cadastrar</h3>
          </div>
				<div class="card-body">
		<?php 
			  // Abre o arquivo com as conexões do BD
				include "connection.php";
			  
			  // Define as variáveis		
				$result = NULL;
				$acao = NULL;
				$query = NULL;  
				
				// Retorna para o formulário principal 
				if(isset($_POST["cancelar"])){	
				  echo "<script>location.href='agenda.php';</script>";
				}
				
				// Inicia os comandos para a inclusão dos dados no formulário 
				if(isset($_POST["incluir"])) {
						
					$data = $_POST["data"];
					$hora = $_POST["hora"];
					$evento = $_POST["evento"];
					$local = $_POST["local"];
					$query = mysqli_query($cnn,"INSERT INTO agenda VALUES (null,'$data','$hora','$evento','$local')") or die(mysqli_error());   
						echo "<script> alert('Evento Cadastrado com Sucesso!!'); </script>";
				}
				
				// Inicia os comandos para a consulta dos dados no banco de dados 
				if(isset($_POST["acao"])){
					switch ($_POST["acao"]){
						case "consultar":
							$data = $_POST["data1"];
							$hora = $_POST["hora1"];
							$query = mysqli_query($cnn,"SELECT * FROM agenda WHERE data = '$data' and hora = '$hora'") or die(mysqli_error());       
							$result = mysqli_num_rows($query);
							if($result == 0){
								?>	
								<form name="form_usuario" method="post" action="#">
                    <div class="input-group form-group">
                        <div class="input-group-prepend1">
													<span class="input-group-text">Nome</span>
											</div>
													<input type="text" class="form-control" id="nome" name="nome"  value="<?php echo $nome;?>" readonly>	
											</div>
										<div class="input-group form-group">
																	<div class="input-group-prepend1">
												<span class="input-group-text">Email</span>
											</div>
											<input type="text" class="form-control" id="email" name="email"  value="<?php echo $email;?>" readonly>	
										</div>
										<div class="input-group form-group">
															<div class="input-group-prepend1">
												<span class="input-group-text">Data</span>
											</div>
																	<input type="text" name="data" id="data" class="form-control" />
															</div>                 
															<div class="input-group form-group">
																	<div class="input-group-prepend1">
												<span class="input-group-text">Hora</span>
											</div>
																	<input type="text" name="horario" id="horario" class="form-control" />
															</div>
															<div class="input-group form-group">
																	<div class="input-group-prepend1">
												<span class="input-group-text">Privilégio</span>
											</div>
																	<select name="corretor" id="corretor" class="form-control" readonly>
														<option value="1" <?php echo $corretor=='Paloma'?'selected':'';?>>Paloma</option>
														<option value="2" <?php echo $corretor=='Abigail'?'selected':'';?>>Abigail</option>
																							<option value="3" <?php echo $corretor=='Jorge'?'selected':'';?>>Jorge</option>
													</select></br></br></br>	
															</div>           

                    <div class="form-group">
                        <input type="submit" name="cancelar" id="cancelar" value="Voltar" class="btn float-right login_btn">
                    </div>
                    
		</form>
								<!-- FINALIZANDO O BLOCO DO FORMULÁRIO PARA INCLUSÃO DOS DADOS -->
								<?php							
							}
							else{
								$registro = mysqli_fetch_row($query);
								$data = $registro[1];
								$hora = $registro[2];
								$evento = $registro[3];
								$local = $registro[4];
								?>	
								<!-- INICIANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
								<form name="form_usuario" method="post" action="#">
                    <div class="input-group form-group">
                        <div class="input-group-prepend1">
													<span class="input-group-text">Nome</span>
											</div>
													<input type="text" class="form-control" id="nome" name="nome"  value="<?php echo $nome;?>" readonly>	
											</div>
										<div class="input-group form-group">
																	<div class="input-group-prepend1">
												<span class="input-group-text">Email</span>
											</div>
											<input type="text" class="form-control" id="email" name="email"  value="<?php echo $email;?>" readonly>	
										</div>
										<div class="input-group form-group">
															<div class="input-group-prepend1">
												<span class="input-group-text">Data</span>
											</div>
																	<input type="text" name="data" id="data" class="form-control" />
															</div>                 
															<div class="input-group form-group">
																	<div class="input-group-prepend1">
												<span class="input-group-text">Hora</span>
											</div>
																	<input type="text" name="horario" id="horario" class="form-control" />
															</div>
															<div class="input-group form-group">
																	<div class="input-group-prepend1">
												<span class="input-group-text">Privilégio</span>
											</div>
																	<select name="corretor" id="corretor" class="form-control" readonly>
														<option value="1" <?php echo $corretor=='Paloma'?'selected':'';?>>Paloma</option>
														<option value="2" <?php echo $corretor=='Abigail'?'selected':'';?>>Abigail</option>
																							<option value="3" <?php echo $corretor=='Jorge'?'selected':'';?>>Jorge</option>
													</select></br></br></br>	
															</div>           

                    <div class="form-group">
                        <input type="submit" name="cancelar" id="cancelar" value="Voltar" class="btn float-right login_btn">
                    </div>
                    
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