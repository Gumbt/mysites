<?php $this->load->view('header'); 
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>

<div class="container login-form text-center">
    <h3>Login</h3><br>
    <div class="row">
        <div class="col-sm-12">
            <?php 
            if ($msg = get_msg()) {
              echo $msg;
            }
            echo form_open('usuario/login');
            ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <?php echo form_input('email', set_value('email'), array('class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Seu email')); ?>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <?php echo form_password('senha', set_value('senha'), array('class' => 'form-control', 'id' => 'exampleInputSenha', 'placeholder' => 'Senha')); ?>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Clique em mim</label>
            </div>
            <button type="submit" class="btn btn-primary">Logar</button>
            <?php 
            echo form_close();
            ?>
        </div>
    </div>
</div>

<br>
<?php $this->load->view('footer'); ?> 