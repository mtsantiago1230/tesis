<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends APP_Controller {

		//-- funcion para cargar la vista principal --//
		public function index()
		{
			$this->load->view('V1/vistas/header/header');
			$this->load->view('V1/vistas/sistema/principal');
			$this->load->view('V1/vistas/footer/footer');
		}

		//-- funciona para cargar la vista consulta --//
		public function consulta()
		{
			$this->load->view('V1/vistas/header/header');
			$this->load->view('V1/vistas/sistema/consulta');
			$this->load->view('V1/vistas/footer/footer');		
		}

		//-- funciona para cargar la vista registro --//
		public function registro()
		{
			$this->load->view('V1/vistas/header/header');
			$this->load->view('V1/vistas/sistema/registro');
			$this->load->view('V1/vistas/footer/footer');	
		}

		//-- funciona para cargar la vista login --//
		public function login()
		{
			$this->load->view('V1/vistas/header/header');
			$this->load->view('V1/vistas/sistema/login');
			$this->load->view('V1/vistas/footer/footer');	
		}

		//-- funciona para cargar los datos personales --//
		public function datospersonales()
		{
			$this->load->view('V1/vistas/header/header');
			$this->load->view('V1/vistas/sistema/datospersonales');
			$this->load->view('V1/vistas/footer/footer');	
		}

		//-- funcion del resultado de la Consulta de la bike--//		
		public function resultadoConsulta()
		{
			//cargar el modelo
			$this->load->model('user');
			
			//se pide los datos
			$consulta = $this->input->post('nombreConsulta');
			
			//envio al modelo del dato ingresado			
			$query = $this->User->consultaUsers($consulta);

			//sacamos el n°serie y estado
			if ($query != null) {
				foreach ($query as $key => $value) {
					$val[$key] = $value['nSerie'];
					$rep[$key] = $value['estado'];
				}	
			}	

			//verifica si existe
			if(isset($rep) && !empty($rep))

			//envio el estado a la vista
			$data['reporte'] = $rep;	
		
			if ($query != null) {

				//val tiene el n° de la serie
				foreach ($val as $i => $llave) {
					
					$llave = $llave;

					//si el n°serie es igual al datos ingresado cargue las vistas
					if ($llave == $consulta) {
						$this->load->view('V1/vistas/header/header');
						$this->load->view('V1/vistas/sistema/bienconsulta',$data);
						$this->load->view('V1/vistas/footer/footer');	
						
					}else {
						$this->load->view('V1/vistas/header/header');
						$this->load->view('V1/vistas/sistema/mconsulta');
						$this->load->view('V1/vistas/footer/footer');
					}

				}				
			//sino, cargue la vista
			}elseif ($query == null) {
				$this->load->view('V1/vistas/header/header');
				$this->load->view('V1/vistas/sistema/mconsulta');
				$this->load->view('V1/vistas/footer/footer');
			}
			
			

		}
		
		
		  
	}


