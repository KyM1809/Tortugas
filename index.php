<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inicio</title>
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

			.carousel{
				height: 600px;
			}
			.carousel-inner{
				height: 600px;
			}
			.carousel-item{
				height: 600px;
			}
			/* Basic styling */
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

			/*Footer*/
			footer {
				width:100%;
				float:left;
				clear:both;
				box-shadow:0px 2px 2px #000;
				-moz-box-shadow:0px 2px 2px #000;
				-webkit-box-shadow:0px 2px 2px #000;
				/*border-radius:5px;*/
				/*-moz-border-radius:5px;*/
				/*-webkit-border-radius:5px;*/
				background: #304750; /* Old browsers */
				background: -moz-linear-gradient(top,  #304750 0%, #242424 100%); /* FF3.6+ */
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#2f2f2f), color-stop(100%,#242424)); /* Chrome,Safari4+ */
				background: -webkit-linear-gradient(top,  #304750 0%,#242424 100%); /* Chrome10+,Safari5.1+ */
				background: -o-linear-gradient(top,  #304750 0%,#242424 100%); /* Opera 11.10+ */
				background: -ms-linear-gradient(top,  #304750 0%,#242424 100%); /* IE10+ */
				background: linear-gradient(to bottom,  #304750 0%,#242424 100%); /* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#304750', endColorstr='#242424',GradientType=0 ); /* IE6-9 */
			}
			 
			footer section {
				width:440px;
				float:left;
				padding:20px;
			}
			 
			footer #acerca-de {
				font-family:Arial, Helvetica, Sans-serif;
				font-size:12px;
				color:#8c8c8c;
				text-align:justify;
				line-height:20px;
			}
			 
			footer #acerca-de h3 {
				font-family:sourcesans-light;
				font-size:20px;
				color:#fff;
				margin-bottom:5px;
			}
			 
			footer #redes-s > div {
				width:220px;
				height:60px;
				float:left;
				background:#ff8000;
				opacity:0.5;
			}
			 
			footer #redes-s > div a {
				width:220px;
				height:60px;
				display:inline-block;
			}
			 
			footer #redes-s .email {
				background:url(Imagenes/gmail.png);
				background-size: 100%;
				margin-bottom:15px;
				width: 50px;
				height: 50px;
			}
			 
			footer #redes-s .twitter {
				background:url(Imagenes/twitter.png);
				margin-bottom:15px;
			}
			 
			footer #redes-s .facebook {
				background:url(Imagenes/facebook2.png);
			}
			 
			footer #redes-s .youtube {
				background:url(Imagenes/youtube2.png);
				width: 50px;
				height: 50px;
			}

			footer #redes-s .instagram {
				background:url(Imagenes/youtube2.png);
				background-size: 100%;
				width: 50px;
				height: 50px;
			}
			 
			footer #redes-s > div:hover {
				opacity:1;
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
											<li class="item"><a href="php/Nidos.php">Nidos</a></li>
							<?php
										}
									}
								}
							?>
							<li class="item"><a href="Adoptar.php">Adopta</a></li>
							<li class="item"><a href="#">Contacto</a><li>
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
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="Imagenes/c1-i1.png" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>Recoleccion de huevos</h5>
									<p>...</p>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="Imagenes/c1-i5.jpg" alt="Second slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>Nacimiento</h5>
									<p>...</p>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="Imagenes/c1-i6.png" alt="Third slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>Liberacion</h5>
									<p>...</p>
								</div>
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<br>
					<center>
						<h2>Ubicaci&oacute;n de El Habillal</h2>
					</center>
				</div>
			</div>
			<div class="row" align="center">
				<div class="col-12" align="center">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3231.7629664244305!2d-102.38242159623512!3d17.98902490614004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x843141c106f2c7d5%3A0x277cc00245e44b5c!2sEl%20Habillal%2C%20Mich.!5e1!3m2!1ses-419!2smx!4v1603764266955!5m2!1ses-419!2smx" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<br>
					<center>
						<h2>Ubicaci&oacute;n del campamento</h2>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div id="Mapa" style="width: 100%; height: 500px;"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<br><br>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<footer>
						<section id="acerca-de">
							<article>
								<h3>Acerca de nuestro sitio web</h3>
								<p>
									Somos una organización civil sin fines de lucro, que  nuestro
									objetivo es la protección y conservación de la tortuga Marina en
									nuestras playas, que actualmente se encuentra en peligro de extinción,
									dentro de la temporada de anidación, monitoreamos 3 especies de ejemplares
									que son: Golfina (Lepidochelys Olivacea), Negra (Chelonia Agassizi) y Laud
									(Dermochelis Coriacea), además de cuidar el medio ambiente y buscar en la
									población fomentar mediante charlas o conferencias, liberaciones de crias
									y que las personas sobre todo los niños concientizen y lleven una educación
									ecológica desde temprana edad y a la  vez cuidar la población de las
									tortugas para que aumente por medio de la reproducción de las mismas.
								</p>
							</article>
						</section>
					</footer>
				</div>
			</div>
		</div>
	</body>
	<?php
		include('php/scripts.php');
	?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
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

					var Coord = {lat : 17.989301, lng: -102.384195};
					var Mapa = new google.maps.Map(document.getElementById('Mapa'),{
						zoom: 25,
						center: Coord
					});

					var Marcador = new google.maps.Marker({
						position: Coord,
						map: Mapa
					});
				}catch(Ex){
					console.error(Ex);
				}
			}
		}
		window.onload = sys.Init();
	</script>
</html>
