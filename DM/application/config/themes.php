<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEBUG (DESARROLLO)
|--------------------------------------------------------------------------
*/
$config['DEBUG'] = true;

/*
|--------------------------------------------------------------------------
| THEMA
|--------------------------------------------------------------------------
|
| Variable que Carga la configuracion del Tema 
| El tema debe estar en la carpeta aplication/views
| ej: tengo una carpeta con mi tema llamada Theme
| application/view/Theme
*/
$config['theme'] = 'V1';

/*
|--------------------------------------------------------------------------
| CSS
|--------------------------------------------------------------------------
|
| RUTA DEL ARCHIVO CSS Del tema 
| si mi tema tiene una carpeta css dentro entoces quedaria theme/css/style.css
| si no tiene una carpeta sino que esta en la razi del tema dejar en blanco 
| theme/style.css -- La Libreria lo cargara por defecto --
|
| $config['css_path'] = ''
*/
$config['css_path'] = 'css/';


/*
|--------------------------------------------------------------------------
| JS 
|--------------------------------------------------------------------------
|
| RUTA DE LA CARPETA JS  Del tema 
| si mi tema tiene una carpeta JS dentro entoces quedaria theme/js/archivo.js
| si no tiene una carpeta sino que esta en la raiz del tema dejar en blanco 
| theme/archivo.js -- La Libreria lo cargara por defecto --
|
| $config['js_path'] = ''
*/
$config['js_path'] = 'js/';

/*
|--------------------------------------------------------------------------
| IMG
|--------------------------------------------------------------------------
|
| RUTA DE LA CARPETA DE IMAGENES  Del tema 
| si mi tema tiene una carpeta imagenes dentro entoces quedaria theme/img/archivo.js
| si no tiene una carpeta dejar en blanco
|
| $config['img_path'] = ''
*/
$config['img_path'] = 'img/';



// ----------------------  (OPCIONAL - OPTIONAL ) ------------------------//
// --- POR DEFECTO DISABLED ------------------------ BY DEFAULT DISABLED--//

/*
|--------------------------------------------------------------------------
| ADMIN THEME 
|--------------------------------------------------------------------------
|
| RUTA DE LA CARPETA DEL TEMA DE LA ADMINISTRACION
| si quiero manejar un tema, para la administracion
| coloca el nombre de la carpeta, donde se encuentra
| aruta de los temas :application/views/admin_theme 
| si se deja en blanco, estara desactivado
|
| $config['admin_theme'] = ''
*/

 $config['admin_theme'] = 'admin';
 
/*
|--------------------------------------------------------------------------
| ADMIN THEME 
|--------------------------------------------------------------------------
|
| RUTA DE LA CARPETA CSS DEL TEMA DE LA  ADMINISTRACION
| si quiero manejar un tema, para la administracion
| coloca el nombre de la carpeta, donde se encuentra
| aruta de los temas :application/views/admin_theme/css 
| si se deja en blanco, estara desactivado
|
| $config['adm_css_path'] = ''
*/
$config['adm_css_path'] = 'css/';


/*
|--------------------------------------------------------------------------
| ADMIN JS 
|--------------------------------------------------------------------------
|
| RUTA DE LA CARPETA JS  Del tema de la Administracion
| si mi tema tiene una carpeta JS dentro entoces quedaria admintheme/js/archivo.js
| si no tiene una carpeta sino que esta en la raiz del tema dejar en blanco 
| admintheme/archivo.js -- La Libreria lo cargara por defecto --
|
| $config['js_path'] = ''
*/
$config['adm_js_path'] = 'js/';

/*
|--------------------------------------------------------------------------
| ADMIN IMG
|--------------------------------------------------------------------------
|
| RUTA DE LA CARPETA DE IMAGENES  de la administracion 
| si mi tema tiene una carpeta imagenes dentro entoces quedaria theme/img/archivo.js
| si no tiene una carpeta dejar en blanco
|
| $config['admin_img'] = ''
*/
$config['adm_img'] = 'img/';


/*
|--------------------------------------------------------------------------
| SIDEBARS (PARA WIDGETS)
|--------------------------------------------------------------------------
|
| si no tiene dejar en blanco
|
| $config['THEMES_SIDEBARS'] = ''
*/
$config['THEMES_SIDEBAR'] = array(
								  	//--- NOMBRE     -- PARAMETROS
								   'sidebar-index-1' => array(
															 'open_tag'    =>'<div class="widget">',
															 'close_tag'   => '</div>',
															 'title_open'  => '<h4 class="CUFON">',
															 'title_close' => '</h4>',
															 'body_open'   => '<div>',
															 'body_close'  => '</div>'
 															 ),
								   
								    'sidebar-index-2' => array(
															 'open_tag'    =>'<div class="widget">',
															 'close_tag'   => '</div>',
															 'title_open'  => '<h4 class="CUFON">',
															 'title_close' => '</h4>',
															 'body_open'   => '<div>',
															 'body_close'  => '</div>'
 															 ),
								   );
/*
|--------------------------------------------------------------------------
| WIDGETS
|--------------------------------------------------------------------------
|
| carpeta de widgets por defecto en la parte administrativa
| debe estar la carpeta llamada widgets
|
| $config['THEMES_WIDGETS'] = ''
*/

//$config['THEMES_WIDGETS'] = $config['admin_theme'].'/widgets/'
$config['THEMES_WIDGETS'] = '';

/*
|--------------------------------------------------------------------------
| Application Folder
|--------------------------------------------------------------------------
|
| carpeta de widgets por defecto en la parte administrativa
| debe estar la carpeta llamada widgets
|
| $config['THEMES_WIDGETS'] = ''
*/

//$config['THEMES_WIDGETS'] = $config['admin_theme'].'/widgets/'
$config['folder_app'] = 'app/';

/// FIN DEL ARCHIV CONFIG THEMES ///

/*
|--------------------------------------------------------------------------
| PLUGINS JS FOLDES
|--------------------------------------------------------------------------
*/
$config["THEMES_PLUGINS"] = "plugins/";

?>