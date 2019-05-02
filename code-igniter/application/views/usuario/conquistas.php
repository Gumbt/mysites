
<div class="card-columns cd2" style="margin-top:10px">
    <?php
    foreach ($allconquistas as $row) {
        ?>

    <div class="card" style="width: 15rem;">
        <div class="cardimg">
            <img class="rounded-circle pull-left" src="<?php 
                                        if ($row->imagem) {
                                            echo base_url('assets/images/conquistas/' . $row->imagem);
                                        } else {
                                            echo base_url('assets/images/conquistas/found.png');
                                        } ?>" alt="Card image cap" width="50px">
        </div>
        <div class="cardbody">
            <h5 class="card-title"><?php echo $row->nomeconqui; ?></h5>
            <div class="card-text"><?php echo $row->descricao; ?></div>
        </div>
        <div class="cardxp bg-warning">
            <?php echo $row->xpconqui . 'xp'; ?>
        </div>
    </div>

    <?php

}
?>
</div>

