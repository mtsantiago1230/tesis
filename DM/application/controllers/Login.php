<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends APP_Controller {

    //-- funcion para el logeo --//
    public function index()
    {
        // se piden los datos que se ingresaron en la view login
        $usuario = $this->input->post('iniciarUser');
        $password = $this->input->post('iniciarPass');
        // debug($usuario,$password);
        // die;
        // se coje el usuario y se envia el modelo
        $query = $this->User->dregistro($usuario);
        
        // sacar el n° de documento como contraseña
        $val = $query["nDocumento"];
        
        // se valida la contraseña y el n°doc para poder ingresar
        if ($query != null) {
            if ($val == $password) {
                
                // se crear la session mediante un array
                $data = array(
                    'usuario' => $usuario, 
                    'id' => 0, 
                    'login' => true, 
                    "consulta" => $query                     
                );

                // Asi se obtiene la informacion
                $this->session->set_userdata($data);

                // se enviar a la vista de los datos
                redirect("Login/datospersonales");
                
            } else {
                // se enviar a la vista principal              
                redirect("Welcome");
                echo '<script language="javascript">alert("'."Datos Incorrectos".'");</script>';  
           }
           
        } else {
            // se enviar a la vista principal            
            redirect("Welcome");
            echo '<script language="javascript">alert("'."Datos Incorrectos".'");</script>';  
        }
        
        
    }

    //-- funcion para registrarse --//
    public function registro()
    {        
        //  1. pido los datos del usuario
            $RegNombre    = $this->input->post('RegNombre');
            $RegApellido  = $this->input->post('RegApellido');
            $RegTipoDoc   = $this->input->post('RegTipoDoc');
            $RegCC        = $this->input->post('RegCC');
            $RegGenero    = $this->input->post('RegGenero');
            $RegFechaN    = $this->input->post('RegFechaN');
            $RegCiudad    = $this->input->post('RegCiudad');
            $RegEstrato   = $this->input->post('RegEstrato');
            $RegDireccion = $this->input->post('RegDireccion');
            $RegCelular   = $this->input->post('RegCelular');
            $RegEmail     = $this->input->post('RegEmail');
            $RegInteres   = $this->input->post('RegInteres');
            $RegGrupoS    = $this->input->post('RegGrupoS');
            $RegContactoE = $this->input->post('RegContactoE');
        
        //  1.1 pido los datos de la bike
            $RegMarca       = $this->input->post('RegMarca');
            $RegReferencia  = $this->input->post('RegReferencia');
            $RegNumeroSerie = $this->input->post('RegNumeroSerie');
            $RegColor       = $this->input->post('RegColor');
            $RegTipoB       = $this->input->post('RegTipoB');
            $RegEstado      = $this->input->post('RegEstado');

        // verificar si existe y no esta vacio los datos anteriores
        if  (   isset($RegNombre)      && !empty($RegNombre)      && isset($RegApellido)   && !empty($RegApellido)   &&
                isset($RegTipoDoc)     && !empty($RegTipoDoc)     && isset($RegCC)         && !empty($RegCC)         &&
                isset($RegGenero)      && !empty($RegGenero)      && isset($RegFechaN)     && !empty($RegFechaN)     &&
                isset($RegCiudad)      && !empty($RegCiudad)      && isset($RegEstrato)    && !empty($RegEstrato)    &&
                isset($RegDireccion)   && !empty($RegDireccion)   && isset($RegCelular)    && !empty($RegCelular)    &&
                isset($RegEmail)       && !empty($RegEmail)       && isset($RegInteres)    && !empty($RegInteres)    &&
                isset($RegGrupoS)      && !empty($RegGrupoS)      && isset($RegContactoE)  && !empty($RegContactoE)  &&
                isset($RegMarca)       && !empty($RegMarca)       && isset($RegReferencia) && !empty($RegReferencia) &&
                isset($RegNumeroSerie) && !empty($RegNumeroSerie) && isset($RegColor)      && !empty($RegColor)      &&
                isset($RegTipoB)       && !empty($RegTipoB)       && isset($RegEstado)     && !empty($RegEstado)
            )
            {
            
            // creo un array con todos los datos
            $data = array(
                'nombres'    => $RegNombre,
                'apellidos'  => $RegApellido,
                'tDocumento' => $RegTipoDoc,
                'nDocumento' => $RegCC,
                'genero'     => $RegGenero,
                'fecha'      => $RegFechaN,
                'ciudad'     => $RegCiudad,
                'estrato'    => $RegEstrato,
                'direccion'  => $RegDireccion,
                'celular'    => $RegCelular,
                'email'      => $RegEmail,
                'interes'    => $RegInteres,
                'gSanguineo' => $RegGrupoS,
                'contacto'   => $RegContactoE,
                'marca'      => $RegMarca,
                'referencia' => $RegReferencia,
                'nSerie'     => $RegNumeroSerie,
                'color'      => $RegColor,
                'tipo'       => $RegTipoB,
                'estado'     => $RegEstado,
                

            );

            // incluyo el array y lo inserto en la BD
            $this->db->insert('registro', $data);
            
            // se enviar a la vista de los datos            
            $this->load->view('V1/vistas/header/header');
			$this->load->view('V1/vistas/sistema/login');
			$this->load->view('V1/vistas/footer/footer');	
        
            }

    }

    // funcion para cerrar sesion
    public function logout()
    {
        // se destruye la session        
        $this->session->sess_destroy();
        header ("Location: " . base_url());
    }

    // funcion para reportar la bike   
    public function reporte()
    {
        //cargo el model
        $this->load->model('user');
        
        //pido los datos
        $update = $this->input->post("actualizar");
        $reportEstado = $this->input->post("estado");
        // debug($update, $reportEstado);
        //saco el estado
        $val = "";
        foreach ($reportEstado as $i => $val) {
            $val = $val;
        }
        // debug($val);
        $new = "";
        //verifico en que estado esta y la reporto
        if ($val == "Robada") {
            $new = "Recuperada";
        }elseif ($val == "Sin novedad" || $val == "Recuperada" ) {
            $new = "Robada";
        }
        // debug($new);
        // die;
        $key = "";
        //saco el id del indice
        foreach ($update as $key => $value) {
            $key = $key;
        }

        //pongo el new estado en array
        $data = array(
            'estado' => $new,
        );
        
        //llamamos al usuario que tenemos en la session//
        $usuario = $this->session->userdata("usuario");

        //query para actualizar dependiendo del id
        $upd = $this->db->where('id', $key)
                        ->update('registro', $data);
        $query = $this->User->dregistro($usuario);

        //-- sobre escribimos la session de consulta --//
        $this->session->set_userdata("consulta",$query);
        redirect("Login/datospersonales");

    }

    //-- funcion para ver los datos personales --//
    public function datospersonales()
    {
        //se carga la session
        $personales = $this->session->userdata("consulta");
        
        //enviar los datos a la vista
        $data["consulta"]  = $personales;
        $this->load->view('V1/vistas/header/header');
        $this->load->view('V1/vistas/sistema/datospersonales',$data);
        $this->load->view('V1/vistas/footer/footer');	
    }

}