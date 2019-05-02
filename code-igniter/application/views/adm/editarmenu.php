<?php $this->load->view('header'); 
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>

<div class="container login-form">
    <center>
        <h3>Editar menu</h3>
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
            echo form_open('adm/menu/editar/' . $idmenu);
            ?>
            <div class="form-group">
                <label for="exampleInputPassword1">Nome</label>
                <input type="text" name="nome" value="<?php if (isset($nome)) {
                                                            echo $nome;
                                                        } ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Local</label>
                <input type="text" name="local" value="<?php if (isset($local)) {
                                                            echo $local;
                                                        } ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Permissão</label>
                <select class="form-control" name="permissao" id="exampleFormControlSelect1">
                    <option <?php if (isset($permissao) && $permissao == 1) {
                                echo 'selected';
                            } ?> value="1">Usuário</option>
                    <option <?php if (isset($permissao) && $permissao == 2) {
                                echo 'selected';
                            } ?> value="2">Moderador</option>
                    <option <?php if (isset($permissao) && $permissao == 3) {
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