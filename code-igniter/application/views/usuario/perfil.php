<?php 
$this->load->view('header'); 
if(isset($conquista)){
    $dados2['conquista'] = $conquista;
    $this->load->view('conquista-notify',$dados2);
}
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>
<?php 
if ($editmode == 1 && $_SESSION['nome'] == $nm) {
    ?>
<div class="container login-form">
    <h3>Editar perfil</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="formeditar">
                <?php
                if ($msg = get_msg()) {
                    echo $msg;
                }
                echo form_open('usuario/perfil/' . $nm . '/editar');
                ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Usuario</label>
                    <input type="text" name="nome" value="<?php echo $nm ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="<?php echo $email ?>" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="javascript:void(0)" class="btn btn-primary" id="senhabutton">Alterar senha</a>
                <a href="<?php echo base_url('usuario/perfil/' . $nm); ?>" class="btn btn-warning" id="senhabutton2">Voltar</a>

            </div>

            <div class="d-none" id="passform">
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <?php echo form_password('senha', set_value('senha'), array('class' => 'form-control', 'id' => 'exampleInputSenha', 'placeholder' => 'Senha')); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Digite novamente sua senha</label>
                    <?php echo form_password('senha2', set_value('senha2'), array('class' => 'form-control', 'id' => 'exampleInputSenha2', 'placeholder' => 'Senha')); ?>
                </div>
                <button type="submit" class="btn btn-success">Salvar nova senha</button>
                <a href="javascript:void(0)" class="btn btn-warning" id="senhabuttonvoltar">Voltar</a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php 
} else {
    if ($found == 1) {
        ?>
<div class="container profile-cont">
    <div class="row">
        <br>
        <div class="col-sm-12 profilediv">
            <div class="col-sm-12 nomeprofile">
                <?php 
                if (isset($idcargo)) {
                    echo '<img data-toggle="tooltip" data-placement="top" title="Adiministrador" class="imgcrg" src="' . base_url('assets/images/' . $idcargo) . '.png">';
                }
                ?>
                <div class="nmprofile"><?php if (isset($nm)) {
                                            echo $nm;
                                        } ?></div>
                <div class="float-right badge badge-pill badge-dark">lvl <?php if (isset($lvl)) {
                                                echo $lvl;
                                            } ?></div>
            </div>
            <div class="col-sm-12">ID: <?php if (isset($id)) {
                                            echo $id;
                                        } ?></div>
            <div class="col-sm-12">Email: <?php if (isset($email)) {
                                                echo $email;
                                            } ?></div>
            <div class="col-sm-12">Conquistas:</div>
                                            
            <?php if(isset($allconquistas)){ ?>
            <div class="conquistas">
                <?php $this->load->view('usuario/conquistas',$allconquistas); ?> 
            </div>
            <?php
            }
            ?>
            <?php if ($_SESSION['nome'] == $nm) { ?><a href="<?php echo base_url('usuario/perfil/' . $nm . '/editar'); ?>" class="btn btn-primary">Editar perfil</a><?php 
                                                                                                                                                        } ?>

        </div>
    </div>
</div>
<?php

} else { ?>
<br>
<div class="container">

    <div class="alert alert-warning" role="alert">
        Usuário não encontrado!!
    </div>

</div>
<?php 
}
}
?>
<br>
<?php $this->load->view('footer'); ?> 