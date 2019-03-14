<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

		<title>Imoveis Câmara</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript" language="javascript">
	function somente_numero(e){
		tecla = (window.event)?event.keyCode:e.which;
		if ((tecla > 47 && tecla < 58)){
			return true;
		}
		else{
			if ((tecla > 95 && tecla < 106)){
				return true;
			}
			else{
				if (tecla == 8 || tecla == 46){
					return true;
				}
				else{
					return false;	
				}
			}	
		}
	}
	function mascara_data (objeto){
		if(objeto.value.length == 2){
			objeto.value = objeto.value + '/';
		}
		if(objeto.value.length == 5){
			objeto.value = objeto.value + '/';
		}
	}
	function mascara_hora (objeto){
		if(objeto.value.length == 2){
			objeto.value = objeto.value + ':';
		}
	}
		function f_incluir(){
			if(document.form1.data.value=="" || document.form1.hora.value==""){
				alert("Necessário Preencher o Campo DATA e/ou o Campo HORA");
			}
			else{
				document.form1.action = "agenda_incluir.php";
				document.form1.submit();
			}
		}

		function f_excluir(){
			if(document.form1.data.value=="" || document.form1.hora.value==""){
				alert("Necessário Preencher o Campo DATA e/ou o Campo HORA");
			}
			else{
				document.form1.action = "agenda_excluir.php";
				document.form1.submit();
			}
		}

		function f_alterar(){
			if(document.form1.data.value=="" || document.form1.hora.value==""){
				alert("Necessário Preencher o Campo DATA e/ou o Campo HORA");
			}
			else{
				document.form1.action = "agenda_alterar.php";
				document.form1.submit();
			}
		}
		
		function f_consultarr(){
			if(document.form1.data.value=="" || document.form1.hora.value==""){
				alert("Necessário Preencher o Campo DATA e/ou o Campo HORA");
			}
			else{
				document.form1.action = "agenda_consultar.php";
				document.form1.submit();
			}
		}
		
</script>
  </head>

  <body>
	<div class="container">

	<div class="d-flex justify-content-center h-100">
		<div class="card">
        <div class="card-body">
            </br>
            <div class="form-group">
                            <center>
                            <button type="button" name="fincluir" onclick="f_incluir();" class="btn float-right login_btn">Incluir</button>
                            <button type="button" name="fexcluir" onclick="f_excluir();" class="btn float-right login_btn">Excluir</button>
                            <button type="button" name="falterar" onclick="f_alterar();" class="btn float-right login_btn">Alterar</button>
                            <button type="button" name="fconsultar" onclick="f_consultar();" class="btn float-right login_btn">Consultar</button>
                            </center>
            </div>

        </div>


			<div class="card-header">
				<h3><center>Sistema de Agendamento</center></h3>
			</div>
			<div class="card-body">
			<form name="form_usuario" method="post" action="#">
          <div class="input-group form-group">
              <div class="input-group-prepend1">
								<span class="input-group-text">Email</span>
							</div>
								<input type="text" class="form-control" id="email" name="email" required>	
					</div>
					<div class="input-group form-group">
              <div class="input-group-prepend1">
								<span class="input-group-text">Data</span>
							</div>
                  <input type="text" name="data" id="data" class="form-control" placeholder="DD/MM/AAAA" maxlength="10" 
					onKeyDown="return somente_numero(event)" onkeypress="mascara_data(this)" />
          </div>                 
          <div class="input-group form-group">
              <div class="input-group-prepend1">
								<span class="input-group-text">Hora</span>
							</div>
                  <input type="text" name="horario" id="horario" class="form-control" placeholder="Hh:Mm" maxlength="5" 
					onKeyDown="return somente_numero(event)" onkeypress="mascara_hora(this)"  />
          </div>      

					<div class="form-group">
                            <center>
                            <button type="button" name="fincluir" onclick="f_incluir();" class="btn float-right login_btn">Incluir</button>
                            <button type="button" name="fexcluir" onclick="f_excluir();" class="btn float-right login_btn">Excluir</button>
                            <button type="button" name="falterar" onclick="f_alterar();" class="btn float-right login_btn">Alterar</button>
                            <button type="button" name="fconsultar" onclick="f_consultar();" class="btn float-right login_btn">Consultar</button>
                            </center>
          </div>
                    
			</form>
	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>