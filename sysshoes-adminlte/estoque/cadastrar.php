<?php
session_start();
require_once("../banco/config.php");
if(isset($_COOKIE['usuario'])&& isset($_COOKIE['senha'])){
	$usuario=base64_decode($_COOKIE['usuario']);
	$senha=base64_decode($_COOKIE['senha']);
}else{
	if(isset($_SESSION["usuario"])&&isset($_SESSION["senha"])){
		setcookie("usuario", $_SESSION["usuario"],time() + (86400 * 2),'/');
		setcookie("senha", $_SESSION["senha"],time() + (86400 * 2),'/');
		$usuario=base64_decode($_SESSION["usuario"]);
		$senha=base64_decode($_SESSION["senha"]);
	}
}
if(!isset($usuario) && !isset($senha)){
	header("Location:../login");
}else{
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM user WHERE usuario=? AND senha=?";
	$q = $pdo->prepare($sql);
	$q->execute(array($usuario,$senha));
	$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
	$nome = $data["nome"];
	$cargo = $data["cargo"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SysShoes</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />
	
    <!-- Sweetalert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	
    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
	
    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Carregando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../">SysShoes</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <!--<li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>-->
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nome; ?></div>
                    <div class="email"><?php echo $cargo; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="../perfil"><i class="material-icons">person</i>Perfil</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="../banco/logout"><i class="material-icons">input</i>Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>
                    
					<li>
                        <a href="../venda/vendas">
                            <i class="material-icons">payment</i>
                            <span>Venda</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Clientes</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../cliente/cadastrar">Cadastrar cliente</a>
                            </li>
                            <li>
                                <a href="../cliente/procurar">Procurar cliente</a>
                            </li>
                        </ul>
                    </li>  
					<?php if($cargo=="Gerente" || $cargo=="Admin"){ ?>
					<li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">local_mall</i>
                            <span>Estoque</span><span style="color: red;font-size: 11px;">Gerente</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <a href="../estoque/cadastrar">Cadastrar produto</a>
                            </li>
                            <li>
                                <a href="../estoque/procurar">Procurar produto</a>
                            </li>
                        </ul>
                    </li> 
					<?php } ?>
					<?php if($cargo=="Admin"){ ?>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people_outline</i>
                            <span>Funcionários</span><span style="color: red;font-size: 11px;">Admin</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../funcionario/cadastrar">Cadastrar funcionário</a>
                            </li>
                            <li>
                                <a href="../funcionario/procurar">Procurar funcionário</a>
                            </li>
                        </ul>
                    </li> 
					<?php } ?>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">SysShoes</a>. <b>Versão: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CADASTRAR PRODUTO</h2>
            </div>
           <!-- cadastro -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<form id="sign_in" class="cadastroForm" method="POST" action="funcoes/inserir" enctype="multipart/form-data">
                    <div class="card">
                        <div class="header">
                            <h2>Cadastrar produto</h2>
                        </div>
						
							<div class="body">							
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<input name="nome" type="text" class="form-control" required>
												<label class="form-label">Nome</label>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<input name="preco" type="number" class="form-control" step="any" min="0" required>
												<label class="form-label">Preço</label>
											</div>
											<div class="help-info">Apenas números</div>
										</div>
									</div>
								</div>								
								<div class="row clearfix">
									<div class="col-sm-4">
										<div class="form-group form-float">
											<div class="form-line">
												<input name="marca" type="text" class="form-control" required>
												<label class="form-label">Marca</label>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group form-float">
											<div class="form-line">
												<input name="fornecedor" type="text" class="form-control" required>
												<label class="form-label">Fornecedor</label>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group form-float">
											<div class="form-line">
												<input name="modelo" type="text" class="form-control" required>
												<label class="form-label">Modelo</label>
											</div>
										</div>
									</div>
								</div>	
								<div class="row clearfix">
									<div class="col-sm-12">
										<div class="form-group">
											<div class="form-line">
												<textarea rows="4" name="descricao" class="form-control no-resize" placeholder="Descrição"></textarea>
											</div>
										</div>
									</div>
								</div>
								<!--<div class="row clearfix">
									<div class="col-sm-12">
										<b>Foto</b>
										<div class="form-group">
											<div class="form-line">
												<input name="file" class="form-control" type="file">
											</div>
										</div>
									</div>
								</div>-->											
							</div>			
					</div>
					<input type="hidden" class="contelements" name="contelements" value="0">
					<input type="hidden" class="contnext" name="contnext" value="0">
					<div class="card" id="unidadesdiv1">
							<div class="body">	
								<div class="row clearfix">
									<div class="col-sm-4" style="margin-bottom: 0!important;">
										<p>
											<b>Cor</b>
										</p>
										<select class="form-control show-tick selectplg1" data-live-search="true">
											<option>Selecione</option>
											<option value="Azul">Azul</option>
											<option value="Vermelho">Vermelho</option>
											<option value="Verde">Verde</option>
											<option value="Laranja">Laranja</option>
											<option value="Rosa">Rosa</option>
											<option value="Preto">Preto</option>
											<option value="Branco">Branco</option>
											<option value="Cinza">Cinza</option>
											<option value="Marrom">Marrom</option>
											<option value="Amarelo">Amarelo</option>
											<option value="Bege">Bege</option>
											<option value="Roxo">Roxo</option>

											
										</select>
									</div>
									<div class="col-sm-3" style="margin-bottom: 0!important;">
										<p>
											<b>Tamanho</b>
										</p>
										<select class="form-control show-tick selectplg2" data-live-search="true">
											<option>Selecione</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
											<option value="32">32</option>
											<option value="33">33</option>
											<option value="34">34</option>
											<option value="35">35</option>
											<option value="36">36</option>
											<option value="37">37</option>
											<option value="38">38</option>
											<option value="39">39</option>
											<option value="40">40</option>
											<option value="41">41</option>
											<option value="42">42</option>
											<option value="43">43</option>
											<option value="44">44</option>
											<option value="45">45</option>
											<option value="46">46</option>

										</select>
									</div>
									<div class="col-sm-3" style="margin-bottom: 0!important;">
										<p>
											<b>Unidades</b>
										</p>
										<div class="form-group form-float">
											<div class="form-line">										
												<input name="unidadd" type="number" class="form-control unidades" value="1" required>
											</div>
										</div>
									</div>
									<div class="col-sm-2" style="margin-top: 20px!important;">
										<button type="button" class="btn btn-success waves-effect addunids55"><i class="material-icons">add_circle_outline</i><span>ADICONAR</span></button>
									</div>
								</div>	
							</div>
						</div>
						<div class="row clearfix">
						<div class="testadditens">


						</div>
						</div>
						<!--<div class="addunids">
							<div class="body">	
								<div class="col-sm-12">
                                    <div class="addunids2"> <i class="material-icons">add_circle_outline</i><span class="icon-namet">ADICIONAR</span> </div>						
								</div>
							</div>				
						</div>-->
						<div class="card">
							<div class="body">	
							<button type="submit" class="btn btn-primary waves-effect">SALVAR</button>	
							</div>		
						</div>
					</form>
                </div>
            </div>
            <!-- #END# cadastro -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

	<!-- SweetAlert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>
	
    <!-- Autosize Plugin Js -->
    <script src="../plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="../plugins/momentjs/moment.js"></script>
	
	<!-- Input Mask Plugin Js -->
    <script src="../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
	<script src="../js/pages/forms/basic-form-elements.js"></script>
	<script src="../js/pages/ui/dialogs.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function(){
		$('.cadastroForm').submit(function(e){
		e.preventDefault();
		var form = $(this);
		var ajaxUrl = form.attr('action');
		var formData = $('form').serialize();
        swal({
			title: "Salvar informações do produto?",
			text: "Confira se todos os campos foram respondidos corretamente",
			showCancelButton: true,
			confirmButtonText: "Salvar",
			cancelButtonText: "Cancelar",
			closeOnConfirm: false,
			showLoaderOnConfirm: true,
		}, function () {
			$.post(ajaxUrl, formData, function(data){
				var data = $.parseJSON(data);
				if(data.success == 'success'){					
				swal({
						title: "Salvo com sucesso!",
					}, function () {
						window.location.href = 'produto?id='+ data.idproduto;
					});
				}else{
					swal("Não foi possivel salvar");
				}							 
			});
		});
		});
		$(".addunids55").on("click", function() {
        //Neste exemplo, toda vez que clicarmos no botão  "Adicionar a Direita", ele adicionará		
			var tamanho = $('.selectplg2 option:selected').val();
			var unidades = $('.unidades').val();
			var cor = $('.selectplg1 option:selected').val();
			if(cor!="" && cor!="Selecione"){
				$('.selectplg1').attr('style', '');
				if(tamanho!="" && tamanho!="Selecione"){
					$('.selectplg2').attr('style', '');
					var value = $('.contelements').val();
					var valuenext = $('.contnext').val();
					var valueint = parseInt(value)+1;
					var valuenextint = parseInt(valuenext)+1;
					$('.contelements').attr('value', valueint);
					$('.contnext').attr('value', valuenextint);
					$('.testadditens').prepend('<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 cardrmv'+valuenextint+'"><div class="card"><div class="header '+cor+'"><h2>Cor: '+cor+'</h2></div><div class="body"><input type="hidden" name="cor[]" value="'+cor+'"><input type="hidden" name="tamanho[]" value="'+tamanho+'"><input type="hidden" name="unidades[]" value="'+unidades+'"><div class="list-group"><a href="javascript:void(0);" class="list-group-item"><span class="badge" style="font-size: 15px;">'+tamanho+'</span> Tamanho:</a><a href="javascript:void(0);" class="list-group-item"><span class="badge" style="font-size: 15px;">'+unidades+'</span>Unidades:</a></div><button type="button" class="btn bg-red btn-block btn-sm waves-effect excluirbtn" value="'+valuenextint+'" name="remover">REMOVER</button></div></div></div>');
					//$('.testadditens').append('<div class="card cardrmv'+valueint+'"><div class="body"><div class="row clearfix"><div class="col-sm-4" style="margin-bottom: 0!important;"><p><b>Cor</b></p><div class="form-group form-float"><div class="form-line"><input name="cor[]" type="text" class="form-control" value="'+cor+'" disabled></div></div></div><div class="col-sm-3" style="margin-bottom: 0!important;"><p><b>Tamanho</b></p><div class="form-group form-float"><div class="form-line"><input name="tamanho[]" type="number" class="form-control" value="'+tamanho+'" disabled></div></div></div><div class="col-sm-3" style="margin-bottom: 0!important;"><p><b>Unidades</b></p><div class="form-group form-float"><div class="form-line"><input name="unidades[]" type="number" class="form-control" value="'+unidades+'" disabled></div></div></div><div class="col-sm-2" style="margin-top: 20px!important;"><button type="button" class="btn btn-danger waves-effect excluirbtn" value="'+valueint+'" name="remover">REMOVER</button></div></div></div></div>');
				}else{
					$('.selectplg2').attr('style', 'border-bottom: 2px solid red!important;');
				}
			}else{
				$('.selectplg1').attr('style', 'border-bottom: 2px solid red!important;');
				if(tamanho!="" && tamanho!="Selecione"){
					$('.selectplg2').attr('style', '');
				}else{
					$('.selectplg2').attr('style', 'border-bottom: 2px solid red!important;');
				}
			}
		})
		$(document).on('click', '.excluirbtn', function(){
			var value = $('.contelements').val();
			var valueint = parseInt(value)-1;
			$('.contelements').attr('value', valueint);
			var valuebtn = $(this).val();
			$(".cardrmv"+valuebtn).remove();
		});
});

</script>
</body>

</html>
<?php
}
?>