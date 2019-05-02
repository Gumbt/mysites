<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Gumb</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php

                foreach ($menuarray as $row) {
                    if ($row->permissao == 1) {
                        ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url($row->local); ?>"><?php echo $row->nome; ?></a></li>

                <?php

            } else if (isset($_SESSION['logged']) && $_SESSION['cargo'] >= $row->permissao) { ?>
                <li class="nav-item"><a class="nav-link" style="color:#c36819" href="<?php echo base_url($row->local); ?>"><?php echo $row->nome; ?></a></li>
                <?php

            }
        }
        ?>
            </ul>
            <ul class="navbar-nav navbar-right">
                <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {

                    ?>
                <li class="nav-item">
                    <?php if ($_SESSION['cargo']) {
                        echo '<img class="image-responsive float-left" src="' . base_url('assets/images/' . $_SESSION['cargo']) . '.png" style="width:30px;margin-top:5px">';
                    } ?><a class="nav-link float-left" href="<?php echo base_url('usuario/perfil/' . $_SESSION['nome']); ?>">
                        <?php echo $_SESSION['nome']; ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('usuario/logout'); ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                <?php 
            } else { ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('usuario/registro'); ?>"><span class="glyphicon glyphicon-log-in"></span> Registrar</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('usuario/login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php 
            } ?>
            </ul>
        </div>
    </div>
</nav> 