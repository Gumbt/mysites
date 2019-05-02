<?php $this->load->view('header'); 
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>


<div class="container">
    <div class="row">
        <div class="col-sm-12" style="margin-top:10px" id="example2">
             <?php 
            if ($msg = get_msg()) {
                echo $msg;
            }
            ?>
            <a href="<?php echo base_url('adm/conquistas/novo'); ?>" class="btn btn-warning">Criar nova conquista</a>
        <div class="card-columns cd1" style="margin-top:10px">
            <?php
            foreach ($allconquistas as $row) {
                ?>
                
                    <div class="card" style="width: 13rem;">
                        <img class="card-img-top" src="<?php 
                        if($row->imagem){ 
                            echo base_url('assets/images/conquistas/'.$row->imagem);
                        }else{
                            echo base_url('assets/images/conquistas/found.png');
                        } ?>" alt="Card image cap">
                        <div class="floar-left xpc bg-warning"><?php echo $row->xpconqui.'xp'; ?></div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row->nomeconqui; ?></h5>
                            <p class="card-text"><?php echo $row->descricao; ?></p>                           
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('adm/conquistas/editar/' . $row->id); ?>" class="btn btn-primary">Editar</a>
                            <button value="conquista" id="<?php echo $row->id; ?>" name="<?php echo $row->nomeconqui; ?>" class="btn btn-danger btnexcluir"><i class="far fa-trash-alt"></i></button>
                            <button name="<?php echo $row->nomeconqui; ?>" value="<?php echo $row->id; ?>" class="btn btn-success addconquista"><i class="fas fa-plus-circle"></i></button>
                        </div>
                    </div>
              
            <?php

            }
            ?>
        </div>
        </div>
    </div>
</div>
<br>
<?php $this->load->view('footer'); ?> 