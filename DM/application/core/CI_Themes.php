<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* THEMES - CONTROLADOR CI 2.0 */
/* PARA DESARROLLAR CON TEMAS*/
/* DESARROLLADO POR ANDRES RODRIGUEZ (www.armsdigital.com) */
/* EMAIL : andres_rs@live.com.ar */
/* VERSION : 1.0.0 */
 
 class CI_Themes extends CI_Controller{
 	
	const  VERSION = 'THC.1.0.0';
    const  KEY     = 'keyblade';
    static $themes = array( 'FRONT ' => 0 , 'ADMIN' => 0);
	private static $tema;
	private static $admin_tema;
	private static $js_var = array();
	private $script;
	private $dir_wigdets;
	private $css;
	private  static $folder_app;
	static  $instance;
	static  $CI;

	//--- VARIABLE CON LAS RUTAS
	static $DIR = array(
	                    //--- FRONT
						'THEMEPATH' => FALSE,
						'THEMEURL'  => FALSE,
						'CSSPATH'	=> FALSE,
						'JSPATH'	=> FALSE, 
						'IMGURL'	=> FALSE,
						'IMGPATH'	=> FALSE,
						//--- admin 
						'THEMEDEV'		=> FALSE,
						'ADMINPATH'		=> FALSE,
						'ADMINURL'		=> FALSE,
						'ADMCSSPATH'	=> FALSE,
						'ADMIMG'		=> FALSE,
						//-- plugins 
						"PLUGINSPATH"	=> FALSE,
						"PLUGINSURL"	=> FALSE
						);
	
	/*
	 * ----------------------------------- 
	 * CONSTRUCTO DE CLASES 
	 * --------------------------------------
	 */
 	function __construct()
	{
		//--- ACTIVAMOS EL CONSTRUCTOR PADRE
		parent::__construct();
			
		//-- instancia de themes
		self::$instance = & $this;
		self::$CI = get_instance();

		//cargamos las librerias necesarias
		$this->load->helper(array('html','url','directory'));
		
		//cargamos la configuracion 
		$this->config->load('themes');
		
		self::$tema = config_item('theme');
		self::$admin_tema = config_item('admin_theme');
		self::$folder_app = config_item('folder_app');
		
        /**
         *  cargamos los config
         */
         self::$tema = config_item('theme');
         self::$admin_tema = config_item('admin_theme');
		/*
		 *  verificamos que el tema no este vacio
		 */
		if(!empty(self::$tema)) 
			self::$tema .= '/';
			
		if(!empty(self::$admin_tema)) 
			self::$admin_tema .= '/';
			
		//--DEFINIMOS LAS SIDEBARS
		$this->sidebar= config_item('THEMES_SIDEBAR');
		
		//--DEFINIMOS EL DIRECTORIOS DE WIDGETS
		$this->dir_wigdets = config_item('THEMES_WIDGETS');
			
		self::initialize();
		
 }

/**
 * ------------------------------------
 * 	INITIALIZACION 
 * ------------------------------------
 */
 static function initialize()
 {
 		//DEFINIMOS NUESTRAS CONSTANTES		 
		self::$DIR['THEMEPATH'] = APPPATH.'views/'.self::$tema; //ruta absoluta del directorio de temas (puede usarse para hacer includes, o requiere_once)
		
		//ruta web del directorio del tema, para hacer llamadas del css, js, imagenes etc. (NOTA EL NAVEGADOR JAMAS TENDRA ACCESO AL CONTENIDO SOLO A LEERLO)
		self::$DIR['THEMEURL'] =  base_url().self::$folder_app.'views/'.self::$tema; 
		
		//RUTA DE LA CARPETA CSS DEL TEMA.
		self::$DIR['CSSPATH'] = base_url().self::$folder_app.'views/'.self::$tema.config_item('css_path');
		
		//RUTA DE LA CARPETA CSS DEL TEMA.
		self::$DIR['JSPATH'] = base_url().self::$folder_app.'views/'.self::$tema.config_item('js_path');
		
		//RUTA DE LAS IMAGENES DEL TEMA
		self::$DIR['IMGURL'] = base_url().self::$folder_app.'views/'.self::$tema.config_item('img_path');

		//RUTA DE LAS IMAGENES DEL TEMA
		self::$DIR['PLUGINSURL'] = base_url().self::$folder_app.'views/'.config_item("THEMES_PLUGINS");
		
        // VERIFICAMOS LAS VERSIONES DEL FRONT
        /*if( !file_exists( self::$DIR['THEMEPATH'].self::KEY.EXT))
        {
            show_error('El Archivo de Version no se Encuentra creelo dentro de la Carpeta:'.self::$tema);
        }else{
             ## cargamos el archivo  
             require_once(self::$DIR['THEMEPATH'].self::KEY.EXT);
             
             ## agregamos el nombre 
             $blade['theme'] = preg_replace('#/#', '', self::$tema);
             
             ## cargamos la version
             self::$themes['FRONT'] = $blade;
                
        }*/
        
		
		//DEFINE LA SI SE TRABAJA EN DESARROLLO
		if( config_item('DEBUG') == true)
			self::$DIR['THEMEDEV'] = '?ver='.rand(100,900) ;
		else
			self::$DIR['THEMEDEV']  = '?ver='.self::VERSION;
		//-----------------------------------------------------
		$adminJS = array();
		
		if(!empty(self::$admin_tema))
		{
			//RUTA DE LA ADMINISTRACION
			self::$DIR['ADMINPATH'] = APPPATH.'views/'.self::$admin_tema;
				
			//URL DE LA ADMNISTRACION
			self::$DIR['ADMINURL'] = base_url().self::$folder_app.'views/'.self::$admin_tema;
				
			//ruta para la carga de los CSS
			self::$DIR['ADMCSSPATH'] = base_url().self::$folder_app.'views/'.self::$admin_tema.config_item('adm_css_path') ;
			
			//ruta para la carga de los JS
			self::$DIR['ADMJSPATH'] = base_url().self::$folder_app.'views/'.self::$admin_tema.config_item('adm_js_path') ;
			
			//ruta para la carga de los JS
			self::$DIR['ADM_IMG'] = base_url().self::$folder_app.'views/'.self::$admin_tema.config_item('adm_img');
		    
            
             // VERIFICAMOS LAS VERSIONES DEL ADMIN
           /* if( !file_exists( self::$DIR['ADMINPATH'].self::KEY.EXT))
            {
                show_error('El Archivo de Version no se Encuentra creelo dentro de la Carpeta:'.self::$tema);
            }else
            {
                 ## cargamos el archivo  
                 require_once(self::$DIR['ADMINPATH'].self::KEY.EXT);
                 
                ## agregamos el nombre 
                $blade['theme'] = preg_replace('#/#', '', self::$admin_tema);
             
                 ## cargamos la version
                 self::$themes['ADMIN'] = $blade;
            }*/
        }
		
		//------------------- CARGAMOS VARIABLES GLOBALES PARA  javascript
		## HACEMOS UN ARREGLO PARA CARGAR LOS RECURSOS
		$default= self::$DIR;
					  				
		## cargamos la variables al sistema
		self::jsVar('THEMES',$default);
 }

/*
 * -----------------------------------------------------------
 *  FUNCION DE FECHT DIRECTORY 
 * ------------------------------------------------------------
 */
 static function  _dir( $k = NULL ){
     
     return ( isset( self::$DIR[ $k ] )) ? self::$DIR[ $k ] : FALSE;
 } 

/*
 * ----------------------------------------------------------
 *  METODOS DE VISTAS 
 * ----------------------------------------------------------
 */
 	#-------------------------------------------
 	# Metodo que Carga una Plantilla
 	#------------------------------------------
 	function template($file,$data,$print = false)
	{
		return $this->_template(self::$tema,$file,$data,$print);
	}

	#-------------------------------------------
 	# Metodo que Parse una Plantilla
 	#------------------------------------------
 	function parsetemplate($file,$data,$print = false)
	{
		return $this->_parsetemplate(self::$tema,$file,$data,$print);
	}
	
	#-----------------------------------------------------
 	# Metodo que Carga una Plantilla en la Administracion
 	#------------------------------------------------------
 	function adminTemplate($file,$data = array() ,$print = false){
 		return $this->_template(self::$admin_tema,$file,$data,$print);
 	}
	
	
	#-------------------------------------------------------
	# Metodo que Carga una Vista 
	#-------------------------------------------------------
	function view( $file, $data = array(), $print = false){
		return $this->_view(self::$tema,$file,$data,$print);
	}

	#-------------------------------------------------------
	# Metodo que parsea una Vista 
	#-------------------------------------------------------
	function parseView( $file, $data = array(), $print = false){
		return $this->_parseview(self::$tema,$file,$data,$print);
	}
	
	
	#-----------------------------------------------------------
	# Metodo que Carga una Vista de la Administracion
	#-----------------------------------------------------------
	function adminView($file,$data =array() ,$print = false)
	{
		return $this->_view(self::$admin_tema,$file,$data,$print);
	}
	
	#funcion que carga la plantilla del tema
	#-------------------------------------------
	private function  _template($path = '', $file = '',$data = array(),$print = false){
		if(empty($file))
			return false;
		
		self::$CI->load->view($path.'header',$data,$print);
	
		if(is_string($file))
		{
			self::$CI->load->view($path.$file,$print);
		}	
		elseif(is_array($file)){
			
			foreach($file as $php){ self::$CI->load->view($path.$php,$data,$print); }
			
		}
		
		self::$CI->load->view($path.'footer',$data,$print);
		
		//--- SI PRINT ES TRUE QUE DEVUELVA TODA LA VISTA EN UNA CADENA
		if( $print )
		{
			return $this->output->get_output();
		}
	}


	# funcion que parsea carga la plantilla del tema
	#-------------------------------------------
	private function  _parsetemplate($path = '', $file = '',$data = array(),$print = false){
		if(empty($file))
			return false;
		$out = "";

		self::$CI->load->library('parser');

		$out .= self::$CI->parser->parse($path.'header',$data,$print);
	
		if(is_string($file))
		{
			$out .= self::$CI->parser->parse($path.$file,$data,$print);
		}	
		elseif(is_array($file)){
			
			foreach($file as $php){ $out .= self::$CI->parser->parse($path.$php,$data,$print); }
			
		}
		
		$out .= self::$CI->parser->parse($path.'footer',$data,$print);
		
		//--- SI PRINT ES TRUE QUE DEVUELVA TODA LA VISTA EN UNA CADENA
		if( $print )
		{
			return $out;
		}
	}
	
	#------------------------------------------- 
	#funcion que carga la vista del tema
	#-------------------------------------------
	private function  _view($path,$file = '',$data = array(),$print = false){
		
		if(empty($file))
			return false;
		
		return $this->load->view($path.$file,$data,$print);
	} 

	#------------------------------------------- 
	#funcion que parsea una vista
	#-------------------------------------------
	private function  _parseview($path,$file = '',$data = array(),$print = false){
		
		if(empty($file))
			return false;
		
		$this->load->library("parser");

		return $this->parser->parse($path.$file,$data,$print);
	} 

/*
 * ----------------------------------------------------------
 * FUNCIONES DE CSS 
 * ----------------------------------------------------------
*/
	// FUNCION QUE CARGA ARCHIVOS CSS DINAMICAMENTE
	////////////////////////////////////////////////////////////////
	function css_load( $file = NULL , $admin = false){
				
				if(empty($file))
					return false;
					
				if( $admin == true)
				{
					$this->css .= admin_css( $file );
				}
				else
				{
					$this->css .= css_tag( $file );
				}
	}
	
	//-- FUNCION QUE MUESTRA LOS CSS CARGADOS DINAMICAMENTE
	//////////////////////////////////////////////////////////////////////////
	function style(){
		return $this->css;	
	}

/*
 * ------------------------------------------------------------
 * FUNCIONES DE JAVASCRIPT 
 * ------------------------------------------------------------
 */
 	#----------------------------------------------------
 	# metodo que Retorna los Script Cargados en tags Html
 	#----------------------------------------------------
 	function script(){
 	   $vars = $this->return_jsVar(true);
       $script = $this->script;
       
	   return $vars."\n\r".$script;
	}
		
 	#-----------------------------------------------
 	# Metodo para Cargar Archivos JS dinamicos
 	#-----------------------------------------------
 	function JSload($files, $admin = false)
	{
		//--- SI ES TRUE CARGAMOS EL ARCHIVO DESDE LA ADINISTRACION
		if( $admin )
		{
			$this->_js_load(self::$DIR['ADMJSPATH'], $files);
		}
		else {
			$this->_js_load(self::$DIR['JSPATH'], $files);
		}
	}

	#-----------------------------------------------
 	# Metodo para Cargar Archivos JS dinamicos
 	#-----------------------------------------------
 	function plugin($plugin,$type, $files,$n= false )
	 {
		 //--- SI ES TRUE CARGAMOS EL ARCHIVO DESDE LA ADINISTRACION
		 if( empty($n) )
		 {
			switch($type){	
				case "js": $this->_js_load(self::$DIR['PLUGINSURL'].$plugin."/".$type."/", $files); break;
				case "css": $this->_css_load(self::$DIR['PLUGINSURL'].$plugin."/".$type."/",$files); break;
			}
		 }else{
			switch($type){	
				case "js": $this->_js_load(self::$DIR['PLUGINSURL'].$plugin."/", $files); break;
				case "css": $this->_css_load(self::$DIR['PLUGINSURL'].$plugin."/",$files); break;
			}
		 }
	 }
 	
 	#------------------------------------------
 	#funcion de cargar archivos js.
	#--------------------------------------------
    function _js_load($path,$array = ''){
		//preparamos las cargas
		if(is_array($array))
		{
			foreach($array as $item)
			{
				if( !preg_match('/^(http|https)\:/i',$item))
					$this->script .="<script type='text/javascript' src='".$path.$item.CI_Themes::$DIR['THEMEDEV']."'></script>\n \r";
				else
					$this->script .="<script type='text/javascript' src='".$item.CI_Themes::$DIR['THEMEDEV']."'></script>\n \r";
			}
		}
		elseif(is_string($array))
		{
			if( !preg_match('/^(http|https)\:/i',$array))
				$this->script .="<script type='text/javascript' src='".$path.$array.CI_Themes::$DIR['THEMEDEV']."'></script>\n \r";
			else
				$this->script .="<script type='text/javascript' src='".$array.CI_Themes::$DIR['THEMEDEV']."'></script>\n \r";
		}
	}
	

	/*
	|---------------------------------------------------------------
	| FUNCION PARA AGREGAR CSS DEL TEMA
	|-----------------------------------------------------------------
	|@ PARAMETROS  array o string
	*/
	function _css_load($path,$css= '')
	{
		
		if(empty($css))
			return false;
		
		
		if(is_array($css))
		{
			if( preg_match('#^(\w+:)?//#i', $css['href']) )
			{
					$css['href'] = $css['href'];
			}
			else
			{
				$css['href'] = $path.$css['href'].self::$DIR['THEMEDEV'];
			}
			$this->css .= link_tag($css);
		}
		elseif(is_string($css))
		{

			if( preg_match('#^(\w+:)?//#i', $css) )
			{
				$this->css .= link_tag( $css );
			}
			else
			{
				$this->css .=  link_tag( $path.$css.CI_Themes::$DIR['THEMEDEV'] );
			}
		}
	}

 
 /*
|---------------------------------------------------------------
| FUNCION PARA AGREGAR VARIABLES PHP EN JS
|-----------------------------------------------------------------
|@ PARAMETROS  array o string
*/
	static function jsVar($name = '', $var='')
	{
		
		if(empty($name) || is_null($var))
				return false;

		//-- VERIFICAMOS SI ES UN OBJETO 
		if(is_object($var) )
		{
			$begin = 'var '.$name.' = ';
			
			$end = ';';

			self::$js_var[] = $begin.json_encode($var).$end;
		}

			
		//verificamos si es un arreglo o no
		if(is_array($var) )
		{											  
			$begin = 'var '.$name.' = ';
			
			$end = ';';
		      
			self::$js_var[] = $begin.json_encode($var).$end;
		}
		
		if(is_string($var)){
			self::$js_var[] = 'var '.$name.' = \''.$var.'\';';
		}
		
	}
	
/*
 * -----------------------------------------------------------------
 *  FUNCION PARA RETORNAR LAS VARIABLE DE JS CARGADAS
 * -----------------------------------------------------------------
 */
	function return_jsVar($return = false )
	{
		if(empty(self::$js_var))
			return;
		
		//-- INICIO Y FIN DE SCRIPT
		$begin =  '<script type="text/javascript">/* <![CDATA[ */';
		$end = '/* ]]> */</script>';
		
        ## capturamos 
        $body = join("\n\r",self::$js_var);
        
		//-- LIMPIAMOS NUESTRA VARIABLE 
		self::$js_var = '';
		
		if( $return == false)
			echo $begin.$body.$end;
		else
			return $begin.$body.$end;
	}

}//--end of class


/////////////////// FUNCIONES INDIVIDUALES /////////////////////

/*
|---------------------------------------------------------------
| FUNCION PARA AGREGAR CSS DEL TEMA
|-----------------------------------------------------------------
|@ PARAMETROS  array o string
*/
function css_tag($css= '')
{
	$CI = &get_instance();
	
	if(empty($css))
		return false;
	
	
	if(is_array($css))
	{
		if( preg_match('#^(\w+:)?//#i', $css['href']) )
		{
				$css['href'] = $css['href'];
		}
		else
		{
			$css['href'] = CI_Themes::$DIR['CSSPATH'].$css['href'].CI_Themes::$DIR['THEMEDEV'];
		}
		return link_tag($css);
	}
	elseif(is_string($css))
	{

		if( preg_match('#^(\w+:)?//#i', $css) )
		{
			return link_tag( $css );
		}
		else
		{
			return link_tag( CI_Themes::$DIR['CSSPATH'].$css.CI_Themes::$DIR['THEMEDEV'] );
		}
	}
}

/*
|---------------------------------------------------------------
| FUNCION PARA IMPRIMIR LOS ESTILOS  CARGADOS
|-----------------------------------------------------------------
|@ PARAMETROS  NINGUNO
*/

function styles(){
	$ci = &get_instance();

	return $ci->style();
}

/*
|---------------------------------------------------------------
| FUNCION PARA AGREGAR CSS DEL TEMA ADMIN
|-----------------------------------------------------------------
|@ PARAMETROS  array o string
*/
function admin_css($css= '')
{
	$CI = &get_instance();
	
	if(empty($css))
		return false;
	
	if(is_array($css))
	{
		if( preg_match('#^(\w+:)?//#i', $css) )
		{
			$css['href'] = $css['href'].CI_Themes::$DIR['THEMEDEV'];
		}
		else
		{
			$css['href'] = CI_Themes::$DIR['ADMCSSPATH'].$css['href'].CI_Themes::$DIR['THEMEDEV'];
		}
		return link_tag($css);
	}
	elseif(is_string($css)){
		if( preg_match('#^(\w+:)?//#i', $css) )
		{
			return link_tag( $css.CI_Themes::$DIR['THEMEDEV'] );	
		}
		else
		{
			return link_tag( CI_Themes::$DIR['ADMCSSPATH'].$css.CI_Themes::$DIR['THEMEDEV'] );
		}

		
	}
}

/*
|---------------------------------------------------------------
| FUNCION PARA AGREGAR JS DEL TEMA DE ADMINISTRACION
|-----------------------------------------------------------------
|@ PARAMETROS  array o string
*/
function js_tag($js = '')
{
	$script =''; 
	
	if(empty($js))
		return false;
	
	//preparamos las cargas
	if(is_array($js))
	{
		foreach($js as $item) { 
			if( !preg_match('/^(http|https)\:/i',$item))
				$script.="<script type='text/javascript' src='".CI_Themes::$DIR['JSPATH'].$item.CI_Themes::$DIR['THEMEDEV']."'></script>\n \r"; 
			else
				$script.="<script type='text/javascript' src='".$item.CI_Themes::$DIR['THEMEDEV']."'></script>\n \r"; 
		}	

	}
	
	if(is_string($js))
		if( !preg_match('/^(http|https)\:/i',$js))
			$script = "<script type='text/javascript' src='".CI_Themes::$DIR['JSPATH'].$js.CI_Themes::$DIR['THEMEDEV']."'></script>\n \r";
		else
			$script = "<script type='text/javascript' src='".$js.CI_Themes::$DIR['THEMEDEV']."'></script>\n \r";
			
	return $script;
}

/*
|---------------------------------------------------------------
| FUNCION PARA AGREGAR JS DEL TEMA DE ADMINISTRACION
|-----------------------------------------------------------------
|@ PARAMETROS  array o string
*/
function admin_js($js = '')
{
	$script =''; 
	
	if(empty($js))
		return false;
	
	//preparamos las cargas
	if(is_array($js))
	{
		foreach($js as $item) { $script .= "<script type='text/javascript' src='".CI_Themes::$DIR['ADMJSPATH'].$item.CI_Themes::$DIR['THEMEDEV']."'></script>\r"; }
	}
	
	if(is_string($js))
		$script = "<script type='text/javascript' src='".CI_Themes::$DIR['ADMJSPATH'].$js.CI_Themes::$DIR['THEMEDEV']."'></script>\n \r";
		
	return $script;
}

/*
|---------------------------------------------------------------
| FUNCION PARA IMPRIMIR LAS LIBRERIAS CARGADAS y VARIABLES 
|-----------------------------------------------------------------
|@ PARAMETROS  NINGUNO
*/

function script(){
	$ci = &get_instance();

	return $ci->script();
}

/*
|---------------------------------------------------------------
| FUNCION PARA IMPRIMIR LAS  VARIABLES DE JS
|-----------------------------------------------------------------
|@ PARAMETROS  NINGUNO
*/
function show_jsvar()
{
	$ci = &get_instance();
	
	return $ci->return_js_var();
}


/*
|---------------------------------------------------------------
| FUNCION PARA IMPRIMIR LAS  IMAGENES
|-----------------------------------------------------------------
|@ PARAMETROS  NINGUNO
*/
function img_tag( $img = '', $w = 0, $h =0)
{
	$CI = &get_instance();
	
	if(empty($img))
		return false;
	
	if(is_array($img))
	{
		
		if(strpos($img['src'], '://') === FALSE)
			$img['src'] = CI_Themes::$DIR['IMGURL'].$img['src'];
		else
			$img['src'] = $img['src'];
		
		//-- SI SE PASA EL ALTO X ANCHO
		if(!empty($w) && !empty($h)){
			
			//-- DIVIDIMOS NOMBRE Y EXTENSION POR SEPARADO
			preg_match('/(.*)\.(jpe?g|png|gif)$/',$img['src'],$matches);
			
			//-- SI LAS CONCIDICENDIAS NO ESTAN VACIAS Y SON 3 ENTOCES PROCEDEMOS
			if(!empty($matches) && count($matches) >= 3){
				$name = $matches[1];
				 $ext = $matches[2];
				
				//-- VERIFICAMOS SI HAY ALGUNA EXTENSION DEL ARCHIVO
				$file =  $name.$w.'x'.$h.'.'.$ext;
				
				if( file_exists( _path( $file ) ) )
					$img['src'] = $file;
				}else{
					$img['width'] = $w;
					$img['height'] = $h;
				}

		}
			
		//-- pasamo el debug
		$img['src'] = $img['src'].CI_Themes::$DIR['THEMEDEV'];
		
		return img($img);
	}
	elseif(is_string($img)){
		

		if(strpos($img, '://') === FALSE)
			$img =  CI_Themes::$DIR['IMGURL'].$img;
		else
			$img = $img ;
			

		//-- SI SE PASA EL ALTO X ANCHO
		if(!empty($w) && !empty($h)){
				
			//-- DIVIDIMOS NOMBRE Y EXTENSION POR SEPARADO
			preg_match('/(.*)\.(jpe?g|png|gif)$/',$img,$matches);
			
			//-- SI LAS CONCIDICENDIAS NO ESTAN VACIAS Y SON 3 ENTOCES PROCEDEMOS
			if(!empty($matches) && count($matches) >= 3){
				$name = $matches[1];
				 $ext = $matches[2];
				
				//-- VERIFICAMOS SI HAY ALGUNA EXTENSION DEL ARCHIVO
				$file =  $name.$w.'x'.$h.'.'.$ext;
				
				if( file_exists( _path( $file ) ) )
					$img = $file;
				}else{
					$img['src'] = $img;
					$img['width'] = $w;
					$img['height'] = $h;
				}
		}
			
			if(!isset($img['src']))
				$img = $img.CI_Themes::$DIR['THEMEDEV'];
			else
				$img['src'] = $img['src'].CI_Themes::$DIR['THEMEDEV'];
				
		return img($img);
	}
}

/*
|---------------------------------------------------------------
| FUNCION PARA IMPRIMIR LAS  ADMIN IMAGENES
|-----------------------------------------------------------------
|@ PARAMETROS  NINGUNO
*/
function admin_img( $img = '')
{
	$CI = &get_instance();
		
	if(empty($img))
		return false;
	
	if(is_array($img))
	{
		$img['href'] = CI_Themes::$DIR['ADM_IMG'].$img['src'].CI_Themes::$DIR['THEMEDEV'];
		
		return img($img);
	}
	elseif(is_string($img)){
		return img( CI_Themes::$DIR['ADM_IMG'].$img.CI_Themes::$DIR['THEMEDEV'] );
	}
}


/**
* Debug Helper
*
* Outputs the given variable(s) with formatting and location
*
* @access       public
* @param        mixed    variables to be output
*/
function debug()
{
	list($callee) = debug_backtrace();
	$arguments = func_get_args();
	$total_arguments = count($arguments);
	
	echo '<fieldset style="background: #fefefe !important; border:2px blue solid; padding:5px">';
	echo '<legend style="background:#efefef; padding:5px;">'.$callee['file'].' @ line: '.$callee['line'].'</legend><pre>';
	$i = 0;
	foreach ($arguments as $argument)
	{
	echo '<br/><strong>Debug #'.(++$i).' of '.$total_arguments.'</strong>: ';
	var_dump($argument);
	}
	
	echo '</pre >';
	echo "</fieldset>";
}


/*
 *  FUNCTION DIRECTOR HELPER 
 *
 */
 function THEMESDIR( $KEY = NULL ){
     return CI_Themes::_dir($KEY);
 }

 function THEMES()
 {
 	return CI_Themes::$instance;
 }
/* End of file CI_Themes.php */
/* Location: ./application/core/CI_Themes.php */
