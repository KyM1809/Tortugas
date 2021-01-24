<?php
	session_start();
	include "php/Conexion.php";
	if(isset($_SESSION["Logueado"])){
		if($_SESSION['Logueado']){
			if($_SESSION['Tipo'] == '1'){
				#
			}else{
				header('location:Inicio.php');
			}
		}else{
			header('location:Inicio.php');
		}
	}else{
		header('location:Inicio.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Nidos</title>
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




			* {
				box-sizing: border-box;
				padding: 0;
				margin: 0;
			}
			body {
				font-family: sans-serif;
				background: #f1f1f1;
			}
			nav {
				background: #304750;
				padding: 5px 20px;
			}
			ul {
				list-style-type: none;
			}
			a {
				color: white;
				text-decoration: none;
			}
			a:hover {
				text-decoration: underline;
			}
			.logo a:hover {
				text-decoration: none;
			}
			.menu li {
				font-size: 16px;
				padding: 15px 5px;
				white-space: nowrap;
			}
			.logo a,
			#Toggle a {
				font-size: 20px;
			}
			.button.secondary {
				border-bottom: 1px #444 solid;
			}
			/* Mobile menu */
			.menu {
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
				align-items: center;
			}
			#Toggle {
				order: 1;
			}
			.item.button {
				order: 2;
			}
			.item {
				width: 100%;
				text-align: center;
				order: 3;
				display: none;
			}
			.item.active {
				display: block;
			}
			/* Tablet menu */
			@media all and (min-width: 600px) {
				.menu {
					justify-content: center;
				}
				.logo {
					flex: 1;
				}
				#Toggle {
					flex: 1;
					text-align: right;
				}
				.item.button {
					width: auto;
					order: 1;
					display: block;
				}
				#Toggle {
					order: 2;
				}
				.button.secondary {
					border: 0;
				}
				.button a {
					padding: 7.5px 15px;
					background: teal;
					border: 1px #006d6d solid;
				}
				.button.secondary a {
					background: transparent;
				}
				.button a:hover {
					text-decoration: none;
				}
				.button:not(.secondary) a:hover {
					background: #006d6d;
					border-color: #005959;
				}
				.button.secondary a:hover {
					color: #ddd;
				}
			}
			/* Desktop menu */
			@media all and (min-width: 900px) {
				.item {
					display: block;
					width: auto;
				}
				#Toggle {
					display: none;
				}
				.logo {
					order: 0;
				}
				.item {
					order: 1;
				}
				.button {
					order: 2;
				}
				.menu li {
					padding: 15px 10px;
				}
				.menu li.button {
					padding-right: 0;
				}
			}
			.container-fluid{
				padding-right: 0;
    			padding-left: 0;
				margin-left: 0;
				margin-right: 0;
			}
			



			#copyright {
				float:left;
				width:960px;
				margin:10px 0px;
			}
			 
			#copyright p {
				text-align:center;
				font-size:12px;
				color:#fff;
				font-family:Arial, Helvetica, Sans-serif;
			}

			.social-bar {
				position: fixed;
				right: 0;
				top: 35%;
				font-size: 1.5rem;
				display: flex;
				flex-direction: column;
				align-items: flex-end;
				z-index: 100;
			}

			.icon {
				color: white;
				text-decoration: none;
				padding: .7rem;
				display: flex;
				transition: all .5s;
			}

			.icon-facebook {
				background: #2E406E;
			}

			.icon-twitter {
				background: #339DC5;
			}

			.icon-youtube {
				background: #E83028;
			}

			.icon-instagram {
				background: #3F60A5;
			}

			.icon:first-child {
				border-radius: 1rem 0 0 0;
			}

			.icon:last-child {
				border-radius: 0 0 0 1rem;
			}

			.icon:hover {
				padding-right: 3rem;
				border-radius: 1rem 0 0 1rem;
				box-shadow: 0 0 .5rem rgba(0, 0, 0, 0.42);
			}

			@font-face {
				font-family: 'icomoon';
				src:  url('CSS/fonts/icomoon.eot?i226ha');
				src:  url('CSS/fonts/icomoon.eot?i226ha#iefix') format('embedded-opentype'),
				url('CSS/fonts/icomoon.ttf?i226ha') format('truetype'),
				url('CSS/fonts/icomoon.woff?i226ha') format('woff'),
				url('CSS/fonts/icomoon.svg?i226ha#icomoon') format('svg');
				font-weight: normal;
				font-style: normal;
			}

			[class^="icon-"], [class*=" icon-"] {
				/* use !important to prevent issues with browser extensions that change fonts */
				font-family: 'icomoon' !important;
				speak: none;
				font-style: normal;
				font-weight: normal;
				font-variant: normal;
				text-transform: none;
				line-height: 1;

				/* Better Font Rendering =========== */
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
			}

			.icon-facebook:before {
				content: "\ea90";
			}
			.icon-instagram:before {
				content: "\ea92";
			}
			.icon-twitter:before {
				content: "\ea96";
			}
			.icon-youtube:before {
				content: "\ea9d";
			}
		</style>
	</head>
	<body>
		<div class="social-bar">
			<a href="https://www.facebook.com/alonsosurf2108/" class="icon icon-facebook" target="_blank"></a>
			<a href="https://twitter.com/DevCodela" class="icon icon-twitter" target="_blank"></a>
			<a href="https://www.youtube.com/c/devcodela" class="icon icon-youtube" target="_blank"></a>
			<a href="https://www.instagram.com/habillalcampamento/" class="icon icon-instagram" target="_blank"></a>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 Header">
					<nav>
						<ul class="menu">
							<li class="logo"><a href="index.php">Campamento tortuguero</a></li>
							<li class="item"><a href="Publicaciones.php">Publicaciones</a></li>
							<?php
								if(isset($_SESSION['Logueado'])){
									if($_SESSION['Logueado']){
										if($_SESSION['Tipo'] == '1'){
							?>
											<li class="item"><a href="Nidos.php">Nidos</a></li>
							<?php
										}
									}
								}
							?>
							<li class="item"><a href="Adoptar.php">Adopta</a></li>
							<li class="item"><a href="Contacto.php">Contacto</a><li>
							<?php
								if(isset($_SESSION["Logueado"])){
									if($_SESSION["Logueado"]){
							?>
										<li class="item button"><a href="php/CerrarSesion.php">Cerrar sesi&oacute;n</a></li>
							<?php
									} else {
							?>
							<?php
									}
							?>
							<?php
								} else {
							?>
								<li class="item button"><a href="Inicio.php">Iniciar sesi&oacute;n</a></li>
							<?php } ?>

							
							<?php
								if(isset($_SESSION["Logueado"])){
							?>
							<?php
								} else {
							?>
								<li class="item button secondary"><a href="Registro.php">Registrarme</a></li>
							<?php } ?>
							<li id="Toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<br>
				</div>
				<div class="col-12" align="center">
					<h3><b>Nidos</b></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-10 offset-1">
					<form method="POST" action="php/Nido.php">
						<div class="row">
							<div class="col-xs-10 col-sm-10 col-md-4 col-lg-4 offset-xs-1 offset-sm-1">
								<div class="form-group">
									<label>Nombre de nido</label>
									<input type="text" name="NombreNido" class="form-control" autocomplete="off">
								</div>
							</div>
							<div class="col-xs-10 col-sm-10 col-md-4 col-lg-4 offset-xs-1 offset-sm-1">
								<div class="form-group">
									<label>Numero de huevos</label>
									<input type="number" name="NumeroHuevos" class="form-control" autocomplete="off">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 offset-md-4 offset-lg-4" align="center">
								<div class="form-group" align="center">
									<button class="btn btn-outline-warning" type="submit">Guardar</button>
								</div>
							</div>
							<input type="hidden" name="Id" value="1">
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<?php
					$Conn = new ConexionClass();
					$MyConn = $Conn->Conectar();
					$Solicitud = null;
					$Consulta = "CALL `SP05ListaNidos`();";
					if( !$Solicitud = $MyConn->prepare( $Consulta ) ){
						echo '{}';
					}

					if( !$Solicitud->execute() ){
						echo '{}';
					}else{
						$Resultado = $Solicitud->get_result();

						while ($Respuesta = $Resultado->fetch_assoc()) {
				?>

							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" align="center">
								<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="Imagenes/Nido.png" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title"><?php echo $Respuesta["Nido"]; ?></h4>
										<h5 class="card-title"><?php echo $Respuesta["Huevos"] . ' Huevos'; ?></h5>
										<p class="card-text">
											<h6>
												<span class="badge badge-<?php echo $Respuesta['Adoptado'] == '1' ? "success" : "danger" ?>"><?php echo $Respuesta['Adoptado'] == '1' ? "Adoptado" : "No adoptado" ?></span>
											</h6>
											<br>
										</p>
										<a href="#" class="btn btn-outline-danger">Eliminar</a>
									</div>
								</div>
							</div>

				<?php
						}
					}
				?>
			</div>
		</div>
	</body>
	<?php
		include('php/scripts.php');
	?>
	<script type="text/javascript">
		let sys = {
			Init : function(){
				try{
					$('.carousel').carousel({
						interval: 3000
					})

					$(function() {
						$("#Toggle").on("click", function() {
							if ($(".item").hasClass("active")) {
								$(".item").removeClass("active");
								$(this).find("a").html("<i class='fas fa-bars'></i>");
							} else {
								$(".item").addClass("active");
								$(this).find("a").html("<i class='fas fa-times'></i>");
							}
						});
					});
				}catch(Ex){
					console.error(Ex);
				}
			}
		}
		window.onload = sys.Init();
	</script>
</html>
