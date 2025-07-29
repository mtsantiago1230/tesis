<!DOCTYPE html>

<html lang="en"> 

	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>Tesis</title>
		<meta name="author" content="">
		<meta name="keywords" content="">
		<meta name="description" content="">		
		
		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">		
			
		<!-- Libs CSS -->
		<link href="<?= base_url() ?>plantilla/css/bootstrap.css" rel="stylesheet"> 
		<link href="<?= base_url() ?>plantilla/css/font-awesome.min.css" rel="stylesheet">	
		<link href="<?= base_url() ?>plantilla/css/flexslider.css" rel="stylesheet">
		<link href="<?= base_url() ?>plantilla/css/prettyPhoto.css" rel="stylesheet">
		<link href="<?= base_url() ?>plantilla/css/owl.carousel.css" rel="stylesheet">

		<!-- On Scroll Animations -->
		<link href="<?= base_url() ?>plantilla/css/animate.min.css" rel="stylesheet">
		
		<!-- Template CSS -->
		<link href="<?= base_url() ?>plantilla/css/style.css" rel="stylesheet"> 
		
		<!-- Responsive CSS -->
		<link href="<?= base_url() ?>plantilla/css/responsive.css" rel="stylesheet"> 
								
		<!-- Favicons -->	
		<link rel="shortcut icon" href="<?= base_url() ?>plantilla/img/icons/favicon2.png">
			
		<!-- Google Fonts -->	
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,800italic,800,700italic,700,600italic,600,400italic,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>	
				
	</head>
	
	
	<body>
	
        <!-- estilos del nav -->
        <style>
            
            header {
                width: 100%;
                overflow: hidden;
                height: 64px;
                position: relative;
            }

            nav {
                position: absolute;
                left: 0;
                right: 0;
                max-width: 100%;
                width: 100%;
            }

            nav ul {
                list-style:none;
            }

            nav > ul {
                display:table;
                width:100%;
                background:#2c3037;
                position:relative;
                padding: 0px;
            }

            nav > ul li {
                display:table-cell;
                width:25%;
                border: 2px solid white;
            }

            /*Sub-menu*/
            nav > ul > li:hover > ul {
                display:block;
                height:100%;
            }

            nav > ul > li > ul {
                display:block;
                position:absolute;
                background:#000;
                left:0;
                right:0;
                overflow:hidden;
                height:0%;
                -webkit-transition: all .3s ease;
                -moz-transition: all .3s ease;
                -ms-transition: all .3s ease;
                -o-transition: all .3s ease;
                transition: all .3s ease;
            }

            nav > ul li a {
                color:#fff;
                display:block;
                line-height:20px;
                padding:20px;
                position: relative;
                text-align:center;
                text-decoration:none;
                -webkit-transition: all .3s ease;
                -moz-transition: all .3s ease;
                -ms-transition: all .3s ease;
                -o-transition: all .3s ease;
                transition: all .3s ease;
            }

            nav > ul > li > ul > li a:hover {
                background:#5da5a2;
            }

            nav > ul > li > a span {
                background:#174459;
                display:block;
                height:100%;
                width:100%;
                left:0;
                position:absolute;
                top:-55px;
                -webkit-transition: all .3s ease;
                -moz-transition: all .3s ease;
                -ms-transition: all .3s ease;
                -o-transition: all .3s ease;
                transition: all .3s ease;
            }

            nav > ul > li > a span .icon {
                display:block;
                line-height:60px;
            }

            nav > ul > li > a:hover > span {
                top:0;
            }

            /*Colores*/
            nav ul li a .primero {
                background:#0e5061;
                
            }

            nav ul li a .segundo {
                background:#5da5a2;
            }

            nav ul li a .tercero {
                background:#f25724;
            }

            nav ul li a .cuarto {
                background:#174459;
            }

            nav ul li a .quinto {
                background:#37a4d9;
            }
        </style>

        <!-- menu de navegacion -->
        <header>
            <nav>
                <ul>
                    <!-- si la session esta iniciada cargue esas vistas -->
                    <?php if ($this->session->userdata('login')) { ?>
                        <li><?= anchor('Welcome/consulta', 'Consulta tu Bici') ?></li>
                        <li><?= anchor('login/datospersonales', 'Datos Personales') ?></li>
                        <li><?= anchor('login/logout', 'Cerrar Sesión') ?></li>

                    <!-- si la session No esta iniciada cargue esas vistas-->
                    <?php } else {?>
                        <li>
                            <a style="padding:0px;" href="<?= base_url() ?>index.php/Welcome/index">   
                                <img style="width: 144px;" src="http://localhost/DM/plantilla/img/logo2.png" alt="logo" role="banner">
                            </a>
                        </li>
                        <li><?= anchor('Welcome/consulta', 'Consulta tu Bici') ?></li>
                        <li><?= anchor('Welcome/registro', 'Registrate') ?></li>
                        <li><?= anchor('Welcome/login', 'Iniciar Sesión') ?></li>                        
                        
                    <?php } ?>
                </ul>
            </nav>
        </header>
		