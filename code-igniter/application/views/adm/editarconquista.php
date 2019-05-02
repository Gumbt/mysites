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
            echo form_open('adm/conquistas/editar/' . $id);
            ?>
            <div class="form-group">
                <label for="exampleInputPassword1">Nome</label>
                <input type="text" name="nomeconqui" value="<?php if (isset($nomeconqui)) {
                                                            echo $nomeconqui;
                                                        } ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">XP</label>
                <input type="text" name="xpconqui" value="<?php if (isset($xpconqui)) {
                                                            echo $xpconqui;
                                                        } ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Imagem</label>
                <input type="text" name="imagem" value="<?php if (isset($imagem)) {
                                                            echo $imagem;
                                                        } ?>" class="form-control">
            </div>
            <div class="form-group">
            <label for="textarea">Descrição</label>
                <textarea name="descricao" id="" cols="30" rows="3" class="form-control"><?php if (isset($descricao)) { echo $descricao; } ?></textarea>
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