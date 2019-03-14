<!DOCTYPE html>
<html>

<head>
	<title>Imoveis Câmara</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body onLoad="checar('consultar');">
    <form name="form_usuario" method="POST" action="#">
        <input type="hidden" name="email1" id="email1" value="<?php echo $_POST['email']; ?>" />
        <input type="hidden" name="acao" id="acao" />
    </form>

    <div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Alterar</h3>
            </div>
			<div class="card-body">
    <?php 
				include "connection.php";
			  		
				$result = NULL;
				$acao = NULL;
				$query = NULL;  
				
					if(isset($_POST["cancelar"])){	
                        if ($_SESSION['pri'] == "Master"){
                            echo "<script>location.href='master.php';</script>";
                        } else {
                            echo "<script>location.href='usuario.php';</script>";
                        }
					}
				
					if(isset($_POST["alterar"])) {	
                        $id = NULL;
                        $nome = $_POST["nome"];
                        $email = $_POST["email"];
                        $senha = $_POST["senha"];
                    if ($_POST["privilegio"] == 1){
						$privilegio = "Master";
					}
					else{
						if ($_POST["privilegio"] == 2){
						$privilegio = "Usuario";
						}
                    }
                        $telefone = $_POST["telefone"];
                        $sexo = $_POST["sexo"];
                        $idade = $_POST["idade"];
                        $interesse = $_POST["interesse"];                       
					$query = mysqli_query($cnn,"UPDATE usuario SET nome = '$nome', email = '$email',senha='$senha', privilegio = '$prilegio', telefone = '$telefone', sexo ='$sexo', idade = '$idade', interesse = '$interesse' WHERE email = '$email'") or die(mysqli_error());  
                    if ($_SESSION['pri'] == "Master"){
                        echo "<script>location.href='master.php';</script>";
                    } else {
                        echo "<script>location.href='usuario.php';</script>";
                    }
					}
				
					if(isset($_POST["acao"])){
					switch ($_POST["acao"]){
						case "consultar":
							$email = $_POST["email1"];
							$query = mysqli_query($cnn,"SELECT * FROM usuario WHERE email = '$email'") or die(mysqli_error());       
							$result = mysqli_num_rows($query);
							if($result == 0){
                                if ($_SESSION['pri'] == "Master"){
                                    echo "<script>location.href='master.php';</script>";
                                } else {
                                    echo "<script>location.href='usuario.php';</script>";
                                }			
							}
							else{
								$registro = mysqli_fetch_row($query);
                                $nome = $registro[1];
								$email = $registro[2];
                                $senha = $registro[3];
                                $privilegio = $registro[4];
                                $telefone = $registro[5];
                                $sexo = $registro[6];
                                $idade = $registro[7];
                                $interesse = $registro [8];
				?>	
				<form name="form_usuario" method="post" action="#">
					<div class="input-group form-group">
                        <div class="input-group-prepend1">
							<span class="input-group-text">Email</span>
						</div>
						<input type="text" class="form-control" id="email" name="email"  value="<?php echo $email;?>" readonly>	
					</div>
					<div class="input-group form-group">
                    <div class="input-group-prepend1">
							<span class="input-group-text">Senha</span>
						</div>
                        <input type="password" name="senha" id="senha" class="form-control"   />
                    </div>
                    <div class="input-group form-group">
                    <div class="input-group-prepend1">
							<span class="input-group-text">Nome</span>
						</div>
                        <input type="text" name="nome" id="nome" class="form-control"  />
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend1">
							<span class="input-group-text">Privilégio</span>
						</div>
                        <select name="privilegio" id="privilegio" class="form-control" style>
									<option value="1" <?php echo $privilegio=='Master'?'selected':'';?>>Master</option>
									<option value="2" <?php echo $privilegio=='Usuario'?'selected':'';?>>Usuário</option>
								</select></br></br></br>	
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend1">
							<span class="input-group-text">Telefone</span>
						</div>
                        <input type="text" name="telefone" id="telefone" class="form-control"  />
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend1">
							<span class="input-group-text">Sexo</span>
						</div>
                        <input type="text" name="sexo" id="sexo" class="form-control" />
                    </div>
                    <div class="input-group form-group">
                    <div class="input-group-prepend1">
							<span class="input-group-text">Idade</span>
						</div>
                        <input type="text" name="idade" id="idade" class="form-control" />
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend1">
							<span class="input-group-text">Interesse</span>
						</div>
                        <input type="text" name="interesse" id="interesse" class="form-control" />
                    </div>
                    

                    <div class="form-group">
                        <input type="submit" name="cancelar" id="cancelar" value="Cancelar" class="btn float-right login_btn">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="alterar" id="alterar" value="Alterar" class="btn float-right login_btn">
                    </div>
				</form>
			</div>
		</div>
	</div>
    <?php
						    }						
						}
					}							
	?>	

</div>

<script type="text/javascript" language="javascript">
	function checar(e){
		document.form_usuario.acao.value = e;
		document.form_usuario.submit();
	}    
</script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

</body>
</html>