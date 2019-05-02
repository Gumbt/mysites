<?php $this->load->view('header'); 
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>

<div class="container login-form">
    <center>
        <h3>Novo menu</h3>
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
            echo form_open('adm/menu/novo');
            ?>
            <div class="form-group">
                <label for="exampleInputPassword1">Nome</label>
                <?php echo form_input('nome', set_value('nome'), array('class' => 'form-control', 'id' => 'Nome', 'placeholder' => 'Nome do menu')); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Local</label>
                <?php echo form_input('local', set_value('local'), array('class' => 'form-control', 'id' => 'local', 'placeholder' => 'Local')); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Permissão</label>
                <select class="form-control" name="permissao" id="exampleFormControlSelect1">
                    <option value="1">Usuário</option>
                    <option value="2">Moderador</option>
                    <option value="3">Administrador</option>
                </select>
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