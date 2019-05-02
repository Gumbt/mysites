<?php $this->load->view('header'); 
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>>

<div class="container login-form">
    <center>
        <h3>Registro</h3>
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
            echo form_open('usuario/registro');
            ?>
            <div class="form-group">
                <label for="exampleInputPassword1">Usuario</label>
                <?php echo form_input('nome', set_value('nome'), array('class' => 'form-control', 'id' => 'Usuario', 'placeholder' => 'Usuario')); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <?php echo form_input('email', set_value('email'), array('class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Seu email')); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <?php echo form_password('senha', set_value('senha'), array('class' => 'form-control', 'id' => 'exampleInputSenha', 'placeholder' => 'Senha')); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Digite novamente sua senha</label>
                <?php echo form_password('senha2', set_value('senha2'), array('class' => 'form-control', 'id' => 'exampleInputSenha2', 'placeholder' => 'Senha')); ?>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Clique em mim</label>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <?php 
            echo form_close();
            ?>
        </div>
    </div>
</div>

<br>
<?php $this->load->view('footer'); ?> 