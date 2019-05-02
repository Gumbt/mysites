<?php $this->load->view('header'); 
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>
<div class="container login-form">
    <center>
        <h3>Criar nova conquista</h3>
    </center><br>
    <div class="row">
        <div class="col-sm-12">
            <?php 
            if ($msg = get_msg()) {
                echo $msg;
            }
            //if($msg = get_msg()){
            //  echo '<p>'.$msg.'</p>';
            //}
            echo form_open('adm/conquistas/novo');
            ?>
            <div class="form-group">
                <label for="exampleInputPassword1">Titulo da conquista</label>
                <?php echo form_input('nomeconqui', set_value('nomeconqui'), array('class' => 'form-control', 'id' => 'nomeconqui', 'placeholder' => 'Titulo da conquista')); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">XP</label>
                <?php echo form_input('xpconqui', set_value('xpconqui'), array('class' => 'form-control', 'id' => 'xpconqui', 'placeholder' => 'Quantidade de XP')); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Imagem</label>
                <?php echo form_input('imagem', set_value('imagem'), array('class' => 'form-control', 'id' => 'imagem', 'placeholder' => 'URL da imagem (ex: img.png)')); ?>
            </div>
            <div class="form-group">
            <label for="textarea">Descrição</label>
                <textarea name="descricao" id="" cols="30" rows="3" class="form-control" placeholder="Descrição da conquista"></textarea>
            </div>
            <div class="form-group">
                <label for="">Status: </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ativo" id="exampleRadios1" value="1">
                    <label class="form-check-label" for="exampleRadios1">
                        Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ativo" id="exampleRadios2" value="0">
                    <label class="form-check-label" for="exampleRadios2">
                        Inativo
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <?php 
            echo form_close();
            ?>
        </div>
    </div>
</div>

<br>
<?php $this->load->view('footer'); ?> 