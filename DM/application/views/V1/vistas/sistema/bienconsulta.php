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

    <!-- foeach con el estado de la bike -->
    <?php foreach ($reporte as $key => $value) : ?>  
        <div class="col-md-12">

            <!-- si esta robada ponga la siguente imagen -->
            <?php if($value == 'Robada') { ?>
                <center><img src="<?= base_url() ?>plantilla/img/thumbs/robada.jpg">
           
            <!-- de lo contrario ponga la siguente imagen -->                
            <?php } else { ?>
                <center><img src="<?= base_url() ?>plantilla/img/thumbs/bien.png" style="width:300px">
            <?php } ?>

            <!-- mensaje que se va a mostrar -->
            <h2>ESTA BICI SI ESTA REGISTRADA</h2>
            <h2>Y SE ENCUENTRA COMO <?= strtoupper($value) ?></h2>
            </center>

        </div> 
    <?php endforeach; ?>

</section>