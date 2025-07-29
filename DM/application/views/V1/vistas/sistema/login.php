<!-- Formulario -->
	<section id="contact" style="padding-bottom: 165px; background-image: url(<?= base_url() ?>plantilla/img/parallax_bg/inicio.png);">
		
		<div class="container">	
			
			<!-- SECTION TITLE -->				
			<div class="row">
				<div class="col-sm-12 titlebar" >
					<h2>Ingresa a Seach Bike</h2>
					<h3>Search Bike</h3>
				</div>
			</div>
				
			<!-- CONTACT FORM -->
			<div class="row" style="padding-left: 150px; padding-right: 150px;">
				
				<div class="col-sm-12">
					
					<!-- form -->
					<form id="contact-form" action="<?=base_url()?>index.php/login" class="row" method="post">
						
						<!-- usuario -->
						<div class="col-md-12">
							<input type="text" name="iniciarUser" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Usuario" required=""> 
						</div>

						<!-- password -->	
						<div class="col-md-12">
							<input type="password" name="iniciarPass" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Contraseña" required=""> 
						</div>
							
						<!-- Submit Button -->
						<div class="col-md-12">							
							<div class="text-center">
								<input type="submit" value="Iniciar Sesión" class="btn btn-theme triggerAnimation animated undefined visible" data-animate="bounceIn" style="font-size: 20px;">
							</div>  
						</div>
							
					</form>
					
				</div>

			</div>	   
			<!-- END CONTACT FORM -->	
				
		</div>	   
		<!-- End container -->	

	</section>	 
	<!-- Fin -->