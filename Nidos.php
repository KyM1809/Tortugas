<?php
	session_start();
	if(!isset($_SESSION["Logueado"])){
		header('location:Inicio.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Adopción</title>
		<?php
			include('php/meta.php');
			include('php/styles.php');
		?>
		<style type="text/css">
			@media screen and (max-width: 800px) {
			    #contenedor{
			        width:100%;
			    }
			}

			@media screen and (max-device-width : 480px) {
			    #sidebar{
			        display:none;
			    }

			    #menu{
			        text-align:center;
			    }
			}

			@media screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape){
			    .entry, .entry-content{
			        font-size:1.2em;
			        line-height:1.5em;
			    }
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<form>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
								<div class="form-group">
									<label>Nombre de nido</label>
									<input type="text" name="NombreNido" class="form-control">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
								<div class="form-group">
									<label>Numero de huevos</label>
									<input type="number" name="NumeroHuevos" class="form-control">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
