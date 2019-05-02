<?php $this->load->view('header'); 
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>


<div class="container">
        <div class="col-sm-12">
            <h3>Usuários</h3>
            <?php 
            if ($msg = get_msg()) {
                echo $msg;
            }
            ?>
            <div class="tblrow">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="example2">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($allusers as $row) {
                        ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->nome; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->cargonome; ?></td>
                        <td>
                            <a href="<?php echo base_url('usuario/perfil/' . $row->nome); ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            <a href="<?php echo base_url('adm/usuarios/editar/' . $row->id); ?>" class="btn btn-primary">Editar</a>
                            <button id="<?php echo $row->id; ?>" value="usuario" name="<?php echo $row->nome; ?>" class="btn btn-danger btnexcluir">Excluir</button>
                        </td>
                    </tr>
                    <?php

                }
                ?>
                </tbody>
            </table>
        </div>
</div>
<br>

<script src="<?php echo base_url('assets/jquery-datatable/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-datatable/extensions/export/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-datatable/extensions/export/buttons.flash.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-datatable/extensions/export/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-datatable/extensions/export/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-datatable/extensions/export/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-datatable/extensions/export/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-datatable/extensions/export/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-datatable/jquery-datatable.js'); ?>"></script>
<?php $this->load->view('footer'); ?> 