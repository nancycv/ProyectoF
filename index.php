<!DOCTYPE HTML>
<html>
<?php
include 'header.php';
?>
	
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/img3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">$8000</span>
								   <h6>P R O X I M A M E N T E</h6>
		   						<h2>Niñez o Adultez</h2>
		   						<p>Una obra de Valeria Iturbide que refleja en los ojos del niño la falta de vida y ninez a través de sus ojos.</p>
			   					
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img1.jpg);">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">$5300</span>
								   <h6>P R O X I M A M E N T E</h6>
		   						<h2>Viento sobre ella</h2>
		   						<p>Regina Herrera nos muestra como como es que el viento puede darle profundidad a la calidad de fotografia</p>
			   					
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img2.jpg);">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">$7530</span>
								   <h6>P R O X I M A M E N T E</h6>
		   						<h2>Esperanza</h2>
		   						<p>La esperanza es la forma de gritarle al mundo que confiamos y amamos lo que hace  
									   -Carolina Meyer.</p>
			   					
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img4.jpg);">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">$5400</span>
								   <h6>P R O X I M A M E N T E</h6>
		   						<h2>La Ventana del Alma</h2>
								   
		   						<p>"Creo que son los males del alma, el alma. Porque el alma que se cura de sus males, muere"   Porchia, Antonio</p>
			   					
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div class="row">
	<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<br><br><br><br>
					<span>Black & White</span>
					<h2>Fotografias en stock</h2>
					<p>Atrevete a quitarle color a tu casa</p>
				</div>
			</div>
            <?PHP
              $result = mysqli_query($con,"SELECT * FROM productos WHERE ID_producto < 13 ||  ID_producto = 32
			  ORDER BY ID_producto;");

              while($row = mysqli_fetch_array($result)) {
                echo "<div class='col-lg-6 col-md-2 mb-4'>";
                echo "<div class='card card text-center'>";
                echo "<form action='product2.php' method='post'>";
                echo "<button type='submit' class='btn btn-link' name='id' value='{$row['ID_producto']}'><br><br><img  class='card-img-top' src='". $row['Fotos'] ."' alt=''></button>";
                echo "<div class='card-body'>";
                echo "<h4 class='card-title'>";
                echo "<input type='hidden' value='{$row['ID_producto']}' name='id'></input>";
                echo "<button type ='submit' class='btn btn-outline-primary btn-large'>";
                echo "". $row['Nombre'] ."</button></form></h4>";
                echo "<h5>$". $row['Precio'] ."</h5>";
                echo "<p class='card-text'>". $row['Descripcion'] ."</p></div>";
                echo "<div class='card-footer'>";
                echo "<small class='text-muted'>".$row['Fabricante']." - ".$row['Origen']."</small>";
                echo "</div></div></div>";
              }
            ?>



          </div>
		  <br><br><br>

	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-credit-card"></i>
						</span>
						<h3>Pago con Tarjeta</h3>
						<p>Ahora contamos con terminal para que realices multiples compras todas de 3 a 6 MSI, no te quedes sin tus obras favoritas!</p>
						<p><a href="contact.php" class="btn btn-primary btn-outline">Contactanos</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-wallet"></i>
						</span>
						<h3>Pago en Efectivo</h3>
						<p>Art Gallery te permite el pago en efectivo en la compra de cualquier obra (solo aplica para compras fisicas)</p>
						<p><a href="contact.php" class="btn btn-primary btn-outline">Contactanos</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-paper-plane"></i>
						</span>
						<h3>Entrega a Domicilio</h3>
						<p>¿Quieres remodelar tu casa a domicilio? Aquí te decimos como solo da click al boton de abajo y listo!</p>
						<p><a href="contact.php" class="btn btn-primary btn-outline">Contactanos</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div id="fh5co-testimonial" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Testimonio</span>
					<h2>Clientes Satisfechos</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/img16.jpg" alt="user">
									</figure>
									<span>Javier Saenz, via <a href="https://twitter.com/nancycv11" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Calidad muy superior a la que esperaba, personas profesionales con altos indices de satisfacción al cliente&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/img17.jpg" alt="user">
									</figure>
									<span>Claudia Ballesteros, via <a href="https://twitter.com/nancycv11" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Fotografia perfecta si lo que quieres es una casa minimalista con un toque de realidad&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/img18.jpg" alt="user">
									</figure>
									<span>Jimena Iturbe, via <a href="https://twitter.com/nancycv11" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Me gustaron tanto sus obras que ya es lo unico que tengo en cuestión de cuadros&rdquo;</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
		<div class="container">
			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-eye"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="100" data-speed="500" data-refresh-interval="50">1</span>
								<span class="counter-label">Creativity Fuel</span>

							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-shopping-cart"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="50" data-speed="500" data-refresh-interval="50">1</span>
								<span class="counter-label">Happy Clients</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-shop"></i>
								</span>
								<span class="counter js-counter" data-from="0" data-to="10" data-speed="500" data-refresh-interval="50">1</span>
								<span class="counter-label">All Products</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="565" data-speed="500" data-refresh-interval="50">1</span>
								<span class="counter-label">Hours Spent</span>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>
	<?php
include 'footer.php';
?>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

