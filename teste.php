$nome = $_POST["nome"];
$email = $_POST["email"];
 $senha = $_POST["senha"];
$privilegio = $_POST["privilegio"];
$telefone = $_POST["telefone"];
$sexo = $_POST["sexo"];
$idade = $_POST["idade"];
$interesse = $_POST["interesse"];

<form class="form-signin" name="form_usuario" id="form_usuario" method="POST" action="#">
                                <center><h2 class="form-signin-heading">Dados do Evento - Incluir</h2></center>
                                    <center>
                                    <label for="inputLogin" >E-mail</label>
                                    <input type="text" name="email" id="email" class="form-control" style ='width:150px;text-align:center' value="<?php echo $email;?>" readonly /></br>
                                    <label for="inputEvento" >Senha</label>
                                    <input type="password" name="senha" id="senha" class="form-control" style ='width:150px;text-align:center' /></br>	
                                    <label for="inputEvento" >Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control" style ='width:150px;text-align:center' /></br>	
                                    <label for="inputEvento" >CPF/CNPJ</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control" style ='width:150px;text-align:center' /></br>
                                    <label for="inputEvento" >Telefone</label>
                                    <input type="text" name="telefone" id="telefone" class="form-control" style ='width:150px;text-align:center' /></br>
                                    <select name="privilegio" id="privilegio" class="form-control" style ='width:200px'>&nbsp;
                                    
									<option value="0"> Selecione o Privilégio...</option>
									<option value="Master">Master</option>
									<option value="Usuario">Usuário</option>
								    </select></br></br></br>		
                                    <button  type="submit" name="incluir" id="incluir" style ='width:200px'/>Confirmar</button>
                                    <button  type="submit" name="cancelar" id="cancelar" style ='width:200px'/>Cancelar</button>
                                    </center>
</form>

<form name="form_usuario" method="post" action="acesso.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Email</span>
						</div>
						<input type="text" class="form-control" id="email" name="email" placeholder="Nome do Usuário">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Lembre-me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>