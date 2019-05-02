<?php $this->load->view('header'); 
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>

<div class="container login-form">
    <center>
        <h3>Editar usuario</h3>
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
            echo form_open('adm/usuarios/editar/' . $id);
            ?>
            <div class="form-group">
                <label for="exampleInputPassword1">Nome</label>
                <input type="text" name="nome" value="<?php if (isset($nome)) {
                                                            echo $nome;
                                                        } ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" value="<?php if (isset($email)) {
                                                            echo $email;
                                                        } ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Cargo</label>
                <select class="form-control" name="cargo" id="exampleFormControlSelect1">
                    <option <?php if (isset($cargo) && $cargo == 1) {
                                echo 'selected';
                            } ?> value="1">Usuário</option>
                    <option <?php if (isset($cargo) && $cargo == 2) {
                                echo 'selected';
                            } ?> value="2">Moderador</option>
                    <option <?php if (isset($cargo) && $cargo == 3) {
                                echo 'selected';
                            } ?> value="3">Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
            <?php 
            echo form_close();
            ?>
        </div>
    </div>
</div>

<br>
<?php $this->load->view('footer'); ?> 