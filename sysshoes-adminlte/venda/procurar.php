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
    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">	
    <!-- Sweetalert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	<!-- noUISlider Css -->
    <link href="../plugins/nouislider/nouislider.min.css" rel="stylesheet" />
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
                    <li >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Clientes</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../cliente/cadastrar">Cadastrar cliente</a>
                            </li>
                            <li >
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
                <h2>PROCURAR PRODUTO</h2>
            </div>
           <!-- cadastro -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="top">
                        <div class="body">
							<div class="row clearfix">
								<div class="col-sm-6" style="margin-bottom: 0!important;">
									<div class="form-group form-float">
										<div class="form-line">
											<input name="nome" type="text" class="form-control input-search">
											<label class="form-label">Pesquisar por nome, marca, modelo...</label>
										</div>
									</div>
								</div>
								<div class="col-md-6">
                                    <p><b>Preço</b></p>
                                    <div id="nouislider_range_example"></div>							
                                </div>	
									
							</div>	
                            <div class="row clearfix">
								<div class="col-sm-6">									
										<select class="form-control show-tick selectplg1" data-live-search="true">
											<option value="">Cor</option>
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
									<div class="form-group form-float">
										<div class="form-line">
											<input name="precomenos" type="number" min="0" max="5000" id="input-with-keypress-0" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-sm-3" style="margin-bottom: 0!important;">
									<div class="form-group form-float">
										<div class="form-line">
											<input name="precomais" type="number" min="0" max="5000" id="input-with-keypress-1" class="form-control">
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
					<div class="row filterdiv">
						<?php			
						$sql = "SELECT * FROM produto";
						foreach($pdo->query($sql) as $row)
						{
						?>
                                <div class="col-sm-6 col-md-3 post" style="display:none" data-price="<?php echo $row["preco"]; ?>">
                                    <div class="thumbnail">
                                        <a href="novavenda?id=<?php echo $row["id_produto"]; ?>"><div class="corespesquisar"><span style="float:left">Cores:</span> <?php 
											$sql2 = "SELECT * FROM unidades WHERE id_produto = ".$row["id_produto"] ." ORDER BY cor";
											foreach($pdo->query($sql2) as $row2)
											{
												echo '<div class="coresbox '.$row2["cor"].'"></div>';
												echo '<div style="display:none">'.$row2["cor"].'</div>';
											}
											?></div><img src="<?php if($row["foto"]=="0"){echo '../estoque/images/tenis.png';}else{echo '../estoque/images/'.$row["id_produto"].$row["foto"];} ?>" style="height: 150px!important;"></a>
                                        <div class="caption" style="border-top: 1px solid #cecece;margin-top: 2px;">
                                            <span class="badge bg-green" style="float:right;">R$ <?php echo $row["preco"]; ?></span>
											<h3><?php echo $row["nome"]; ?></h3>											
												<div class="detalhest"><b>Modelo:</b> <span><?php echo $row["modelo"]; ?></span></div>
												<div class="detalhest"><b>Marca:</b> <span><?php echo $row["marca"]; ?></span></div>
												<div class="detalhest"><b>Fornecedor:</b> <span><?php echo $row["fornecedor"]; ?></span></div>
												<div class="descritt" style="width: 100%;height: 40px;overflow: hidden;text-overflow: ellipsis;"><b>Descrição:</b> <span><?php echo $row["descricao"]; ?></span></div>
                                            <div class="buttondescritt">
                                                <a href="novavenda?id=<?php echo $row["id_produto"]; ?>" class="btn btn-warning waves-effect" role="button">SELECIONAR</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
					<?php } 
					Database::disconnect();	
					?>

                    </div>
					<div class="addunids">
						<div class="body">	
							<div class="col-sm-10" id="carregarmais">
								<div class="addunids2"> <i class="material-icons">add_circle_outline</i><span class="icon-namet">CARREGAR MAIS</span> </div>						
							</div>
							<div class="col-sm-2" id="totop" style="border-left: 2px dashed #999;">
								<div class="addunids2"> <i class="material-icons">arrow_upward</i><span class="icon-namet">TOPO</span> </div>						
							</div>
						</div>				
					</div>
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
	
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	<script src="../js/pages/tables/jquery-datatable.js"></script>
	
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
	
    <!-- noUISlider Plugin Js -->
    <script src="../plugins/nouislider/nouislider.js"></script>	
	
    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
	<script src="../js/pages/forms/basic-form-elements.js"></script>
	<script src="../js/pages/ui/dialogs.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
	<script type="text/javascript">
$(document).ready(function(){//excluir
		$(".excluirbtn").click(function(){
			var ajaxUrl = 'funcoes/excluir';
			var idproduto = $(this).attr('value');
			var nomeproduto = $(this).attr('name');
			swal({
				title: "Excluir informações do produto " + nomeproduto + "?",
				text: "Essa ação não pode ser desfeita",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Sim, excluir!",
				cancelButtonText: "Não, cancelar!",
				closeOnConfirm: false,
				showLoaderOnConfirm: true,
			}, function () {
				$.post(ajaxUrl, { idproduto: idproduto}, function(data){
					var data = $.parseJSON(data);
					if(data.success == 'success'){					
					swal({
							title: "Exluido com sucesso!",
							type: "success",
						}, function () {
							window.location.href = 'procurar';
						});
					}else{
						swal("Não foi possivel exluir");
					}							 
				});
			});
		});
});
//renge slider
var rangeSlider = document.getElementById('nouislider_range_example');
noUiSlider.create(rangeSlider, {
	start: [0, 5000],
	connect: true,
	step: 5,
	range: {
		'min': 0,
		'max': 5000
	}
});
var input0 = document.getElementById('input-with-keypress-0');
var input1 = document.getElementById('input-with-keypress-1');
var inputs = [input0, input1];
function setSliderHandle(i, value) {
	var r = [null,null];
	r[i] = value;
	rangeSlider.noUiSlider.set(r);
}
getNoUISliderValue(rangeSlider, false);
function getNoUISliderValue(slider, percentage) {
	slider.noUiSlider.on('update', function ( values, handle ) {
		inputs[handle].value = values[handle];
		var mi = $('#input-with-keypress-0').val();
		var mx = $('#input-with-keypress-1').val();
		if(mi!=0 || mx!=5000){
			$('.addunids').hide();
			filterSystem(mi, mx);
		}else{
			num_posts_show = 8;
			speed_to_top = 500; // in ms
			$(".post").hide();
			$(".post:hidden").slice(0, num_posts_show).show();
			$('.addunids').fadeIn();
		}
	});
}
function filterSystem(minPrice, maxPrice) {
  $(".post").hide().filter(function () {
	  var price = parseInt($(this).data("price"), 10);
	  return price >= minPrice && price <= maxPrice;
  }).show();
}
inputs.forEach(function(input, handle) {
	input.addEventListener('change', function(){
		setSliderHandle(handle, this.value);
	});

});
//carregar mais
$(function () {
  num_posts_show = 8;
  speed_to_top = 500; // in ms
	$(".post").slice(0, num_posts_show).show();
	$("#carregarmais").on('click', function (e) {
		e.preventDefault();
		$(".post:hidden").slice(0, num_posts_show).fadeIn();
		if ($(".post:hidden").length == 0) {
			$("#load").fadeOut('slow');
		}
		/*$('html,body').animate({
			scrollTop: $(this).offset().top
		}, 1500);*/
	});

});

$('#totop').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, speed_to_top);
    return false;
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('#totop').fadeIn();
    } else {
        $('#totop').fadeOut();
    }
});
//filtar
$(document).ready(function(){
  $(".input-search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
	if(value!=""){
		$('.addunids').hide();
		$(".post").filter(function() {
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	}else{
		num_posts_show = 8;
		speed_to_top = 500; // in ms
		$(".post").hide();
		$(".post:hidden").slice(0, num_posts_show).show();
		$('.addunids').fadeIn();
	}
  });
  $(".selectplg1").on("change", function() {
	var valuecolor = $('.filter-option').text().toLowerCase();
	if(valuecolor!='cor'){
		$('.addunids').hide();
		$(".post").filter(function() {
		   $(this).toggle($(this).text().toLowerCase().indexOf(valuecolor) > -1)
		});
	}else{
		$(".post").hide();
		$(".post:hidden").slice(0, 8).show();
		$('.addunids').fadeIn();
	}
  });
});
</script>
</body>

</html>
<?php
}
?>