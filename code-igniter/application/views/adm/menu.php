<?php $this->load->view('header'); 
$dados['menuarray'] = $menuarray;
$this->load->view('menu',$dados);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Menus</h3>
            <?php 
            if ($msg = get_msg()) {
                echo $msg;
            } ?>
            <a href="<?php echo base_url('adm/menu/novo'); ?>" class="btn btn-warning">Criar novo menu</a>
            <table class="table example" id="example2" style="margin-top:10px">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>local</th>
                        <th>Permissão</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($allmenu as $row) {
                        ?>
                    <tr>
                        <td><?php echo $row->idmenu; ?></td>
                        <td><?php echo $row->nome; ?></td>
                        <td><?php echo $row->local; ?></td>
                        <td><?php echo $row->permissao; ?></td>
                        <td>
                            <a href="<?php echo base_url('adm/menu/editar/' . $row->idmenu); ?>" class="btn btn-primary">Editar</a>
                            <button href="#" class="btn btn-warning btnexcluir" value="menu" id="<?php echo $row->idmenu; ?>" name="<?php echo $row->nome; ?>"><i class="far fa-trash-alt"></i></button>
                            <?php
                            if ($row->ativo == 1) { ?>
                            <button id="<?php echo $row->idmenu; ?>" class="btn btn-success btnatv f<?php echo $row->idmenu; ?>" value="1">Ativo</button>
                            <?php 
                        } else { ?>
                            <button id="<?php echo $row->idmenu; ?>" class="btn btn-danger btnatv f<?php echo $row->idmenu; ?>" value="0">Inativo</button>
                            <?php

                        }
                        ?>
                        </td>
                    </tr>
                    <?php

                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<br>
<?php $this->load->view('footer'); ?> 