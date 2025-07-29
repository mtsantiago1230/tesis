<!-- estilos -->
<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;        
        color: white;
        font-size: 20px;
    }

    .btn-clientes{
        background-color:#27909e !important;
	    border: 1px solid white
    }

    #contact-form-consulta{
        margin-top: 10px;
    }
</style>

<div class="row" style="padding-bottom:25px; padding-top:10px">

    <!-- declaracion de variables -->
    <?php  $value = $consulta;
            $id = $value['id'];
            $estado = $value['estado'];
            // debug($estado);
    ?>

        <!-- Tabla de usuario -->
        <div class="col-md-6">
            
            <!-- imagen del user -->
            <center>
                <img src="<?= base_url() ?>plantilla/img/thumbs/user.png">
            </center>

            <!-- inicio tabla -->
            <table id="customers">

                <!-- datos del usuario -->
                <tr style="background-color: #30a6bf">
                    <th colspan="2">Datos Personales</th>
                </tr>

                <!-- nombre -->
                <tr>
                    <td>Nombres: </td>
                    <td><?= $value['nombres']; ?></td>
                </tr>

                <!-- apellido -->
                <tr>
                    <td>Apellidos: </td>
                    <td><?= $value['apellidos']; ?></td>
                </tr>

                <!-- correo -->
                <tr>
                    <td>Correo: </td>
                    <td><?= $value['email']; ?></td>
                </tr>

                <!-- direccion -->
                <tr>
                    <td>Dirección: </td>
                    <td><?= $value['direccion']; ?></td>
                </tr>

                <!-- celular -->
                <tr>
                    <td>Celular: </td>
                    <td><?= $value['celular']; ?></td>
                </tr>

                <!-- rh -->
                <tr>
                    <td>RH: </td>
                    <td><?= $value['gSanguineo']; ?></td>
                </tr>

                <!-- contacto de emergencia -->
                <tr>
                    <td>Contacto de Emergencia: </td>
                    <td><?= $value['contacto']; ?></td>
                </tr>
                
            </table>
            <!-- Fin -->
        </div>

        <!-- Tabla de Bicicleta -->
        <div class="col-md-6" style="border-left: 1px solid #f2f2f2;">
            
            <!-- imagen de la bike -->
            <center>
                <img src="<?= base_url() ?>plantilla/img/thumbs/bike.png">
            </center>

            <!-- inicio de la tabla -->
            <table id="customers">

                <tr style="background-color: #30a6bf">
                    <th colspan="2">Datos Bicicleta</th>
                </tr>

                <tr>
                    <td>N. de Serie: </td>
                    <td><?= $value['nSerie']; ?></td>
                </tr>

                <tr>
                    <td>Marca: </td>
                    <td><?= $value['marca']; ?></td>
                </tr>

                <tr>
                    <td>Color: </td>
                    <td><?= $value['color']; ?></td>
                </tr>

                <tr>
                    <td>Referencia: </td>
                    <td><?= $value['referencia']; ?></td>
                </tr>

                <tr>
                    <td>Tipo de Bicicleta: </td>
                    <td><?= $value['tipo']; ?></td>
                </tr>

                <tr>
                    <td>Estado: </td>
                    <td><?= $estado ?></td>
                </tr>

                <tr>
                    <td colspan="3">
                        <center>
                            <form id="contact-form-consulta" action="<?=base_url()?>index.php/Login/reporte" class="row" method="post">
                                <input type="hidden" name="estado[<?= $estado ?>]" value="<?= $estado ?>" class="btn btn-success"></input>
                                <?php if ($estado == 'Robada') { ?>
                                    <input type="submit" id="btn-clientes" name="actualizar[<?= $id ?>]"  value="Reportar como Recuperada" class="btn btn-success"></input>
                                <?php } else { ?>
                                    <input type="submit" id="btn-clientes" name="actualizar[<?= $id ?>]"  value="Reportar Bicicleta" style="background-color:#cf1111" class="btn btn-success"></input>
                                <?php } ?>
                            </form>
                        </center>
                    </td>
                </tr>
                
            </table>
            <!-- Fin -->
        </div>  

</div>