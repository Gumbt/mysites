<?php
session_start();
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
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
	$iduser = $data["id_user"];
	$cargo = $data["cargo"];
if(isset($_GET['id']) && $_GET['id']!=null){
	$idproduto=$_GET['id'];
	$sql = "SELECT * FROM produto WHERE id_produto=?";
	$q = $pdo->prepare($sql);
	$q->execute(array($idproduto));
	$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
	$nomeproduto = $data["nome"];
	$descricao = $data["descricao"];
	$preco = $data["preco"];
	$marca = $data["marca"];
	$fornecedor = $data["fornecedor"];
	$modelo = $data["modelo"];
	$foto = $data["foto"];
}else{
	header("Location:procurar");
}
Database::disconnect();	
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
                    
					<li class="active">
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
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">local_mall</i>
                            <span>Estoque</span><span style="color: red;font-size: 11px;">Gerente</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
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
                <h2>VENDA</h2>
            </div>
           <!-- cadastro -->
		   <form id="sign_in" class="cadastroForm" method="POST" action="funcoes/inserir">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>PRODUTO</h2>
                        </div>
                        <div class="body">
								<div class="row clearfix">
								<style>
								/* Esconde o input */
								input[type='file'] {
								  display: none
								}
								</style>
									<div class="col-sm-3">
											<img name="img" id="blah" src="<?php if($foto=="0"){echo '../estoque/images/tenis.png';}else{echo '../estoque/images/'.$idproduto.$foto;} ?>" style="width: 100%;height: 200px!important;border:  1px solid gray;">
									</div>
									<div class="col-sm-5">
										<div class="form-group form-float">
											<div class="form-line">
												<input name="nomeproduto" type="text" class="form-control" value="<?php echo $nomeproduto; ?>" disabled>
												<label class="form-label">Nome</label>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group form-float">
											<div class="form-line">
											<input type="hidden" class="pickpreco" value="<?php echo $preco; ?>">
												<input name="preco" type="text" class="form-control" value="R$ <?php echo $preco; ?>" disabled>
												<label class="form-label">Preço</label>
											</div>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-group form-float">
											<div class="form-line">
												<input name="marca" type="text" class="form-control" value="<?php echo $marca; ?>" disabled>
												<label class="form-label">Marca</label>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group form-float">
											<div class="form-line">
												<input name="fornecedor" type="text" class="form-control" value="<?php echo $fornecedor; ?>" disabled>
												<label class="form-label">Fornecedor</label>
											</div>
										</div>
									</div>
									<div class="col-sm-9">
										<div class="form-group form-float">
											<div class="form-line">
												<input name="modelo" type="text" class="form-control" value="<?php echo $modelo; ?>" disabled>
												<label class="form-label">Modelo</label>
											</div>
										</div>
									</div>
								</div>	
								<div class="row clearfix">
									<div class="col-sm-12">
										<div class="form-group">
											<div class="form-line">
												<textarea rows="4" name="descricao" class="form-control no-resize" disabled><?php echo $descricao; ?></textarea>
												<label class="form-label">Descrição</label>
											</div>
										</div>
									</div>
								</div>		
								<div class="row">
									<div class="col-sm-12">
										<?php			
										$pdo = Database::connect();
										$totalrow=0;
										$sql = "SELECT * FROM unidades WHERE id_produto = '$idproduto'";
										foreach($pdo->query($sql) as $row)
										{
											$totalrow=$totalrow+$row["unidades"];
										}
										?>
										<p><b>Unidades:</b><?php echo "(total: ".$totalrow.")"; ?></p>
										<?php
										$contelements=0;
										$sql = "SELECT * FROM unidades WHERE id_produto = '$idproduto' ORDER BY unidades DESC";
										foreach($pdo->query($sql) as $row)
										{
											$contelements++;
										?>
										<div style="width: 100%;height: 120px;">
											<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
												<div class="card" style="margin-bottom: 0!important;">
													<div class="body <?php echo $row["cor"]; ?>" style="text-align:center">
														Cor: <?php echo $row["cor"]; ?><br>Tamanho: <?php echo $row["tamanho"]; ?><br>Unidades: <?php echo $row["unidades"]; ?>
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
												<div class="form-group form-float">
													<div class="form-line">
														<input type="hidden" name="cor[]" value="<?php echo $row["cor"]; ?>">
														<input type="hidden" name="tamanho[]" value="<?php echo $row["tamanho"]; ?>">
														<input name="unidades[]" type="text" class="form-control unids" value="0" required>
														<label class="form-label">Unidades</label>
													</div>
												</div>
											</div>
										</div>
										<?php
										}
										Database::disconnect();	
										?>
									</div>
									<input type="hidden" class="contelements" name="contelements" value="<?php echo $contelements; ?>">
								</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# cadastro -->
			<div class="block-header">
                <h2>CLIENTE</h2>
            </div>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body" style="height: 100px;">
							<div class="col-sm-6">
								<div class="form-group form-float">
									<div class="form-line">
										<input name="cpfprocurar" id="cpfprocurar" type="text" class="form-control" pattern="[0-9]{11}">
										<label class="form-label">CPF</label>
									</div>
									<div class="help-info">Apenas números</div>
								</div>
							</div>
							<div class="col-sm-6">
								<button type="button" class="btn btn-primary waves-effect procurarbtn">PROCURAR</button>
							</div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
								<h2 class="card-inside-title">Informações pessoais</h2>
								<div class="row clearfix">
									<div class="col-sm-6">
										<b>Nome completo:</b>
										<div class="form-group">
											<div class="form-line">
												<input name="nome" type="text" class="form-control" disabled>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<b>CPF</b>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="cpf" type="text" class="form-control" pattern="[0-9]{11}" disabled>
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-4">
										<b>Endereço</b>
										<div class="form-group">
											<div class="form-line">
												<input name="endereco" type="text" class="form-control" disabled>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<b>CEP</b>
										<div class="form-group">
											<div class="form-line">
												<input name="cep" type="number" class="form-control" pattern="[0-9]{8}" disabled>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<b>Telefone</b>
										<div class="form-group">
											<div class="form-line">
												<input name="telefone" type="text" class="form-control" disabled>
											</div>
											<div class="help-info">Ex: (00)00000-0000</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-4">
										<b>Email</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-line">
                                                <input name="email" type="email" class="form-control email" placeholder="Ex: example@example.com" disabled>
                                            </div>
                                        </div>
									</div>
									<div class="col-sm-4">
										<b>Data de nascimento</b>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">date_range</i>
											</span>
											<div class="form-line">
												<input name="datanasc" type="date" class="form-control date" placeholder="Ex: 30/07/2016" disabled>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<p>
											<b>Sexo</b>
										</p>
										<div class="form-group">
											<div class="form-line">
												<input name="sexo" type="text" class="form-control" disabled>
											</div>
										</div>
									</div>
								</div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="block-header">
                <h2>PAGAMENTO</h2>
            </div>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body" style="height: 100px;">
							
								<div class="col-sm-6">
									<p>
										<b>Tipo de pagamento</b>
									</p>
									<select class="form-control show-tick" name="pagamento" required>
										<option value="Dinheiro">Dinheiro</option>
										<option value="Crédito">Crédito</option>
										<option value="Débito">Débito</option>
										<option value="Outro">Outro</option>
									</select>
								</div>
								<div class="col-sm-6">
									<p>
										<b>Desconto (%)</b>
									</p>
									<div class="form-group">
										<div class="form-line">
											<input name="desconto" id="desconto" type="number" class="form-control" required>
										</div>
									</div>
								</div>
								<input type="hidden" name="iduser" value="<?php echo $iduser; ?>">
								<input type="hidden" name="idproduto" value="<?php echo $idproduto; ?>">
								<input type="hidden" name="idcliente" value="">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary waves-effect">SALVAR</button>
								</div>
							
                        </div>
                    </div>
                </div>
            </div>
			</form>
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
		$(".procurarbtn").click(function(e){
			e.preventDefault();
			var ajaxUrl = 'funcoes/procurar';
			var cpfprocurar = $('#cpfprocurar').val();
			$.post(ajaxUrl, { cpfprocurar: cpfprocurar}, function(data){
				var data = $.parseJSON(data);
				if(data.success == 'success'){		
					$("input[name='nome']").attr('value', data.nome);
					$("input[name='cpf']").attr('value', data.cpf);
					$("input[name='endereco']").attr('value', data.endereco);
					$("input[name='cep']").attr('value', data.cep);
					$("input[name='telefone']").attr('value', data.telefone);
					$("input[name='datanasc']").attr('value', data.datanasc);
					$("input[name='email']").attr('value', data.email);
					$("input[name='sexo']").attr('value', data.sexo);
					
					$("input[name='idcliente']").attr('value', data.idcliente);
					

				}else{
					alert("Cliente não encontrado");
				}							 
			});

		});
});
$(document).ready(function(){
		$('.cadastroForm').submit(function(e){
		e.preventDefault();
		var total = 0;
		var desconto = $("#desconto").val() != "" ? $("#desconto").val() : 0;
		var preco = $(".pickpreco").val();
			$('.unids').each(function(){
			  var valor = Number($(this).val());
			  if (!isNaN(valor)) total += valor;
			});
			total = (total*preco);
			desconto = (total*desconto)/100;
			total = total - desconto;
		var form = $(this);
		var ajaxUrl = form.attr('action');
		var formData = form.serialize();
        swal({
			title: "O valor final da compra é R$"+ total.toFixed(2),
			text: "O pagamento foi efetuado?",
			showCancelButton: true,
			confirmButtonText: "Sim",
			cancelButtonText: "Não",
			closeOnConfirm: false,
			showLoaderOnConfirm: true,
		}, function () {
			$.post(ajaxUrl, formData, function(data){
				var data = $.parseJSON(data);
				if(data.success == 'success'){					
				swal({
						title: "Venda efetuada com sucesso!",
					}, function () {
						window.location.href = 'vendas';
					});
				}else{
					swal(data.erro);
				}							 
			});
		});
		});
});
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#selecao-arquivo").change(function() {
  readURL(this);
});
</script>
</body>

</html>
<?php
}
?>