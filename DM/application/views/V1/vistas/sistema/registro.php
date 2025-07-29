<!-- Formulario -->
	<section id="contact" style="padding-bottom: 141px; background-image: url(<?= base_url() ?>plantilla/img/parallax_bg/registro.png);">
		
		<div class="container">	
			
			<!-- SECTION TITLE -->				
			<div class="row">
				<div class="col-sm-12 titlebar" >
					<h2>Registrate</h2>
					<h3>Search Bike</h3>
				</div>
			</div>
				
			<!-- Formulario de User -->
			<div class="row">
				
				<div class="col-sm-12">
                    <h2 style="color:white">- Registro de Usuario</h2>
                    
					<form id="contact-form" action="<?=base_url()?>index.php/login/registro" class="row" method="post">
						
                        <!-- Nombres -->
						<div class="col-md-3">
							<input type="text" name="RegNombre" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Tus nombres" required=""> 
						</div>
							
                        <!-- Apellidos -->
						<div class="col-md-3">
							<input type="text" name="RegApellido" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Tus Apellidos" required=""> 
						</div>
							
                        <!-- Tipo CC -->
						<div class="col-md-3">
                            <select id="" name="RegTipoDoc" required="" class="form-control triggerAnimation animated undefined visible">
                                <option>Tipo de Documento</option>
                                <option value="CC">CC</option>
                                <option value="CE">CE</option>
                                <option value="NIT">NIT</option>
                            </select>
                        </div>

                        <!-- Numero de CC -->
                        <div class="col-md-3">
							<input type="text" name="RegCC" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="N. Cedula" required=""> 
						</div>

                        <!-- Genero  -->
						<div class="col-md-3">
                            <select id="" name="RegGenero" required="" class="form-control triggerAnimation animated undefined visible">
                                <option>Genero</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>

                        <!--Fecha de Nacimiento  -->
						<div class="col-md-3">
							<input type="date" name="RegFechaN" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="" required=""> 
						</div>

                        <!-- Ciudad -->
                        <div class="col-md-3">
                            <select id="" name="RegCiudad" required="" class="form-control triggerAnimation animated undefined visible">
                                <option selected="">Ciudad</option>
                                <option value="Bogota">Bogotá Dc</option>
                            </select>
                        </div>
								
                        <!-- Estrato -->
						<div class="col-md-3">
                            <select id="" name="RegEstrato" required="" class="form-control triggerAnimation animated undefined visible">
                                <option selected="">Estrato</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>

                        <!-- Direccion de Domicilio -->
                        <div class="col-md-3">
							<input type="text" name="RegDireccion" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Dirección de Domicilio" required=""> 
						</div>
							
                        <!-- Celular -->
						<div class="col-md-3">
							<input type="text" name="RegCelular" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Numero de Celular" required=""> 
						</div>
							
                        <!-- Email -->
						<div class="col-md-3">
							<input type="email" name="RegEmail" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Email" required=""> 
						</div>
							
                        <!-- Interes -->
                        <div class="col-md-3">
                            <select id="" name="RegInteres" required="" class="form-control triggerAnimation animated undefined visible">
                                <option selected="">Interes</option>
                                <option value="BMX">BMX</option>
                                <option value="Fixie">Fixie</option>
                                <option value="MTB">MTB</option>
                                <option value="Triathlon">Triathlon</option>
                                <option value="Turismo">Turismo</option> 
                                <option value="Urbano">Urbano</option>
                            </select>
                        </div>
							
                        <!-- Grupo Sanguineo -->
						<div class="col-md-3">
                            <select id="" name="RegGrupoS" required="" class="form-control triggerAnimation animated undefined visible">
                                <option selected="">Grupo Sanguineo</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB">AB</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
						
                        <!-- Contacto de Emergencia -->
                        <div class="col-md-3">
                            <input type="text" name="RegContactoE" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Contacto de Emergencia" required=""> 
                        </div>					  
						 
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
							
                        <h2 style="color:white">- Registra tu Bici</h2>	

                        <!-- Marca -->
                        <div class="col-md-3">
                            <input type="text" name="RegMarca" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Marca" required=""> 
                        </div>

                        <!-- Referencia -->
                        <div class="col-md-3">
                            <input type="text" name="RegReferencia" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Referencia" required=""> 
                        </div>

                        <!-- Número de Serie -->
                        <div class="col-md-3">
                            <input type="text" name="RegNumeroSerie" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Número de Serie" required=""> 
                        </div>

                        <!-- Color -->
                        <div class="col-md-3">
                            <input type="text" name="RegColor" class="form-control triggerAnimation animated undefined visible" data-animate="bounceIn" placeholder="Color" required=""> 
                        </div>

                        <!-- Tipo de Bici -->
                        <div class="col-md-3">
                            <select id="" name="RegTipoB" required="" class="form-control triggerAnimation animated undefined visible">
                                <option selected="">Tipo de Bici</option>
                                <option value="All Mountain">All Mountain</option>
                                <option value="BMX">BMX</option>
                                <option value="Choper">Choper</option>
                                <option value="Cross Country">Cross Country</option>
                                <option value="Cruiser">Cruiser</option>
                                <option value="Cargo/ Bike">Cargo/ Bike</option>
                                <option value="Down Hill">Down Hill</option>
                                <option value="Electrica">Electrica</option>
                                <option value="Fat Bike">Fat Bike</option>
                                <option value="Fixie">Fixie</option>
                                <option value="MTB">MTB</option>
                                <option value="Plegable">Plegable</option>
                                <option value="Reclinada/Adaptada">Reclinada/Adaptada</option>
                                <option value="Ruta">Ruta</option>
                                <option value="Tandem">Tandem</option>
                                <option value="Triathlon">Triathlon</option>
                                <option value="Turismo/Treking">Turismo/Treking</option>
                                <option value="Urbana">Urbana</option>
                            </select>
                        </div>
							
                        <div class="col-md-3">
                            <select id="" name="RegEstado" required="" class="form-control triggerAnimation animated undefined visible">
                                    <option>Estado</option>
                                    <option value="Sin novedad">Sin novedad</option>
                                    <option value="Robada">Robada</option>
                            </select>
                        </div>


                        <!-- Submit Button -->
                        <div class="col-md-12" style="padding-top:50px">							
							<div class="text-center">
								<input type="submit" value="Registrate" class="btn btn-theme triggerAnimation animated undefined visible" data-animate="bounceIn" style="font-size: 20px;">
							</div>  
						</div>
							

					</form>
					
				</div>

			</div>	   
			<!-- Fin -->	


				
		</div>	   
		<!-- End container -->	

	</section>	 
	<!-- Fin -->