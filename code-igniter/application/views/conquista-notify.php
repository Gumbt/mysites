<?php 
    if(isset($conquista)){ 
    ?>
<script>
    $(document).ready(function(){
    <?php
        foreach($conquista as $row){
        ?>
        $.notify({
            icon: '<?php echo base_url('assets/images/conquistas/'.$row->imagem); ?>',
            title: '<?php echo $row->nomeconqui; ?>',
            message: '<?php echo $row->descricao; ?>'
        },{
            type: 'minimalist',
            delay: 5000,
            allow_dismiss: false,
            showProgressbar: true,
            icon_type: 'image',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<img data-notify="icon" class="rounded-circle pull-left ">' +
                '<span data-notify="title">{1}</span>' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>'+
            '</div>'
        });

    <?php
        } ?>
    });
    </script>
    <?php

    }
    ?>