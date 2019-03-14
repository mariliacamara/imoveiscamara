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