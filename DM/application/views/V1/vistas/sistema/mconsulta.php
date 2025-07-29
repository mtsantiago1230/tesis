<!-- estilos -->
<style>
    body{
        background-color: white;
    }
    section,
    div{
        overflow:hidden;
    }
    h2{
        padding-top:15px;
    }
    button{
        background-color:#0db60d;
    }
</style>

<section style="height:600px; padding-top:50px;">

    <div class="col-md-12">
        <center>
            <!-- agrega imagen y texto si la consulta es invalida -->
            <img src="<?= base_url() ?>plantilla/img/thumbs/mal.jpg" style="width:328px">
            <h2>ESTA BICI AUN NO HA SIDO REGISTRADA</h2>
            <button><a href="<?= base_url() ?>Welcome/registro">Registrala ¡YA!</a></button>
        </center>
    </div> 

</section>