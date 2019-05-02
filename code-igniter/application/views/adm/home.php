<?php $this->load->view('header'); 
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>
<br>
<div class="container" style="min-height:400px">
    <div class="row">
        <div class="col-sm-12">
            <div class="painel">
                <a class="btn btn-primary" href="<?php echo base_url('adm/usuarios'); ?>">Usuários</a>
                <a class="btn btn-primary" href="<?php echo base_url('adm/menu'); ?>">Editar menu</a>
                <a class="btn btn-primary" href="<?php echo base_url('adm/conquistas'); ?>">Conquistas</a>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('footer'); ?> 