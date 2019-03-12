<?php
    session_start();
    unset ($_SESSION['PRI']);
    UNSET ($_SESSION['ACESSO']);
?>

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

    <?php 
				include "connection.php";
			  		
				$result = NULL;
				$acao = NULL;
				$query = NULL;  
				
				if(isset($_POST["cancelar"])){	
				  echo "<script>location.href='usuario.php';</script>";
                }
                
                $query = NULL;
                if(isset($_POST["incluir"])) {
                    $id = NULL;
                    $nome = $_POST["nome"];
                    $email = $_POST["email"];
                    $senha = $_POST["senha"];
                    $privilegio = $_POST["privilegio"];
                    $telefone = $_POST["telefone"];
                    $sexo = $_POST["sexo"];
                    $idade = $_POST["idade"];
                    $interesse = $_POST["interesse"];
                    $query = mysqli_query($cnn,"INSERT INTO usuario VALUES ('$id','$nome','$email','$senha','$privilegio','$telefone','$sexo','$idade','$interesse')") or die(mysqli_error());
                    echo "<script> alert('Usuario Cadastrado com Sucesso!!');</script>";
                }
				 
				if(isset($_POST["acao"])){
					switch ($_POST["acao"]){
						case "consultar":
							$email = $_POST["email1"];
							$query = mysqli_query($cnn,"SELECT * FROM usuario WHERE email = '$email'") or die(mysqli_error());       
							$result = mysqli_num_rows($query);
							if($result == 0){
                            ?>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Cadastrar</h3>
			</div>
			<div class="card-body">
				<form name="form_usuario" method="post" action="acesso.php">
					<div class="input-group form-group">
                        <label for="inputLogin" >E-mail</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="Nome do Usuário">	
					</div>
					<div class="input-group form-group">
                        <label for="inputEvento" >Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" style ='width:150px;text-align:center' />
                    </div>
                    <div class="input-group form-group">
                        <label for="inputEvento" >Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" style ='width:150px;text-align:center' />
                    </div>
                    <div class="input-group form-group">
                        <label for="inputEvento" >Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" style ='width:150px;text-align:center' />
                    </div>
                    <div class="input-group form-group">
                        <label for="inputEvento" >Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" style ='width:150px;text-align:center' />
                    </div>
                    <div class="input-group form-group">
                        <label for="inputEvento" >Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" style ='width:150px;text-align:center' />
                    </div>
                    <div class="input-group form-group">
                        <label for="inputEvento" >Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" style ='width:150px;text-align:center' />
                    </div>
                    <div class="input-group form-group">
                        <label for="inputEvento" >Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" style ='width:150px;text-align:center' />
                    </div>
                    

					<div class="row align-items-center remember">
						<input type="checkbox">Lembre-me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Não tem uma conta?<a href="#">Cadastre-se</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Esqueci minha senha?</a>
				</div>
			</div>
		</div>
	</div>


                    <?php					
							}
							else{
                                $registro = mysqli_fetch_row($query);
                                $id = $registro[0];
                                $nome = $registro[1];
								$email = $registro[2];
                                $senha = $registro[3];
                                $privilegio = $registro[4];
                                $telefone = $registro[5];
                                $sexo = $registro[6];
                                $idade = $registro[7];
                                $interesse = $registro [8];
								?>	


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