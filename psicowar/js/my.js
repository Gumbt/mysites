$(document).ready(function(){
		$(".userprofile").click(function(e){
			e.preventDefault();
					
			var form = $(this);
			var ajaxUrl = 'player.php';
			var formData = $(this).attr('name');
			$("#"+formData+" .precarrega").show();
			if($("." + formData).attr('value')==0){
				$.post(ajaxUrl, { name: formData}, function(data){
					var data = $.parseJSON(data);
					if(data.success == 'success'){
						//herois
						var linkimg = data.townHallLevel;
						if(data.townHallLevel==12){
							$("." + data.taguser +' .thlevel').attr('src', 'images/townhall/Town_Hall_'+ data.townHallLevel +
							'_' + data.townHallWeaponLevel + '.png');
						}else{
							$("." + data.taguser +' .thlevel').attr('src', 'images/townhall/Town_Hall_'+ data.townHallLevel +'.png');
						}
						$("." + data.taguser +' .imgalltimebest').attr('src', 'images/leagues/'+ data.ligalink +'.png');
						$("." + data.taguser +' .besttroph').text(data.bestTrophies);
						$("." + data.taguser +' .infowarstars').text(data.warStars);
						$("." + data.taguser +' .infoataks').text(data.attackWins);
						$("." + data.taguser +' .infodefesas').text(data.defenseWins);
						$("." + data.taguser +' .infodoadas').text(data.donations);
						$("." + data.taguser +' .inforecebidas').text(data.donationsReceived);
						
						$("." + data.taguser +' .king').text(data.king);
						if(data.king==60){
							$("." + data.taguser +' .king').addClass('max-level');
						}
						$("." + data.taguser +' .queen').text(data.queen);
						if(data.queen==60){
							$("." + data.taguser +' .queen').addClass('max-level');
						}
						$("." + data.taguser +' .guardian').text(data.guardian);
						if(data.guardian==30){
							$("." + data.taguser +' .guardian').addClass('max-level');
						}
						//feiticos
						$("." + data.taguser +' .raio').text(data.raio);
						if(data.raio==7){
							$("." + data.taguser +' .raio').addClass('max-level');
						}
						$("." + data.taguser +' .cura').text(data.cura);
						if(data.cura==7){
							$("." + data.taguser +' .cura').addClass('max-level');
						}
						$("." + data.taguser +' .furia').text(data.furia);
						if(data.furia==5){
							$("." + data.taguser +' .furia').addClass('max-level');
						}
						$("." + data.taguser +' .salto').text(data.salto);
						if(data.salto==3){
							$("." + data.taguser +' .salto').addClass('max-level');
						}
						$("." + data.taguser +' .gelo').text(data.gelo);
						if(data.gelo==6){
							$("." + data.taguser +' .gelo').addClass('max-level');
						}
						$("." + data.taguser +' .veneno').text(data.veneno);
						if(data.veneno==5){
							$("." + data.taguser +' .veneno').addClass('max-level');
						}
						$("." + data.taguser +' .terremoto').text(data.terremoto);
						if(data.terremoto==4){
							$("." + data.taguser +' .terremoto').addClass('max-level');
						}
						$("." + data.taguser +' .haste').text(data.haste);
						if(data.haste==4){
							$("." + data.taguser +' .haste').addClass('max-level');
						}
						$("." + data.taguser +' .clone').text(data.clone);
						if(data.clone==5){
							$("." + data.taguser +' .clone').addClass('max-level');
						}
						$("." + data.taguser +' .skeleto').text(data.skeleto);
						if(data.skeleto==4){
							$("." + data.taguser +' .skeleto').addClass('max-level');
						}
						//tropas
						$("." + data.taguser +' .electrodrag').text(data.electrodrag);
						if(data.electrodrag==3){
							$("." + data.taguser +' .electrodrag').addClass('max-level');
						}
						$("." + data.taguser +' .barbaro').text(data.barbaro);
						if(data.barbaro==8){
							$("." + data.taguser +' .barbaro').addClass('max-level');
						}
						$("." + data.taguser +' .arqueira').text(data.arqueira);
						if(data.arqueira==8){
							$("." + data.taguser +' .arqueira').addClass('max-level');
						}
						$("." + data.taguser +' .goblin').text(data.goblin);
						if(data.goblin==7){
							$("." + data.taguser +' .goblin').addClass('max-level');
						}
						$("." + data.taguser +' .gigante').text(data.gigante);
						if(data.gigante==9){
							$("." + data.taguser +' .gigante').addClass('max-level');
						}
						$("." + data.taguser +' .quebramuro').text(data.quebramuro);
						if(data.quebramuro==8){
							$("." + data.taguser +' .quebramuro').addClass('max-level');
						}
						$("." + data.taguser +' .balao').text(data.balao);
						if(data.balao==8){
							$("." + data.taguser +' .balao').addClass('max-level');
						}
						$("." + data.taguser +' .mago').text(data.mago);
						if(data.mago==9){
							$("." + data.taguser +' .mago').addClass('max-level');
						}
						$("." + data.taguser +' .curadora').text(data.curadora);
						if(data.curadora==5){
							$("." + data.taguser +' .curadora').addClass('max-level');
						}
						$("." + data.taguser +' .dragao').text(data.dragao);
						if(data.dragao==7){
							$("." + data.taguser +' .dragao').addClass('max-level');
						}
						$("." + data.taguser +' .pekka').text(data.pekka);
						if(data.pekka==8){
							$("." + data.taguser +' .pekka').addClass('max-level');
						}
						$("." + data.taguser +' .minion').text(data.minion);
						if(data.minion==8){
							$("." + data.taguser +' .minion').addClass('max-level');
						}
						$("." + data.taguser +' .corredor').text(data.corredor);
						if(data.corredor==8){
							$("." + data.taguser +' .corredor').addClass('max-level');
						}
						$("." + data.taguser +' .valk').text(data.valk);
						if(data.valk==7){
							$("." + data.taguser +' .valk').addClass('max-level');
						}
						$("." + data.taguser +' .golem').text(data.golem);
						if(data.golem==8){
							$("." + data.taguser +' .golem').addClass('max-level');
						}
						$("." + data.taguser +' .bruxa').text(data.bruxa);
						if(data.bruxa==4){
							$("." + data.taguser +' .bruxa').addClass('max-level');
						}
						$("." + data.taguser +' .lava').text(data.lava);
						if(data.lava==5){
							$("." + data.taguser +' .lava').addClass('max-level');
						}
						$("." + data.taguser +' .lanca').text(data.lanca);
						if(data.lanca==4){
							$("." + data.taguser +' .lanca').addClass('max-level');
						}
						$("." + data.taguser +' .bbdragao').text(data.bbdragao);
						if(data.bbdragao==6){
							$("." + data.taguser +' .bbdragao').addClass('max-level');
						}
						$("." + data.taguser +' .mineiro').text(data.mineiro);
						if(data.mineiro==6){
							$("." + data.taguser +' .mineiro').addClass('max-level');
						}
						$("." + data.taguser).attr('value',1);
						$("." + data.taguser).slideToggle( "slow" );
						$("#"+formData+" .precarrega").hide();
					}else{
						//alert('Não foi possivel carregar o perfil, tente novamente!');
						$("#"+formData+" .precarrega").hide();
					}
					
				 
			 });
			}else{
				$("." + formData).slideToggle( "slow" );
				$("#"+formData+" .precarrega").hide();
			}
		});
	});