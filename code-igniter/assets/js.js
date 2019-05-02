$(document).ready(function(){
    $("#senhabutton").click(function(){
        $("#passform").removeClass('d-none');
        $(".formeditar").addClass('d-none');
    });
    $("#senhabuttonvoltar").click(function(){
        $('#exampleInputSenha').val('');
        $('#exampleInputSenha2').val('');
        $("#passform").addClass('d-none');
        $(".formeditar").removeClass('d-none');
    });

    $(".example").on('click','.btnatv',function () {
        var idmenu = $(this).attr('id');
        var ativo = $(this).attr('value');
		var ajaxUrl = 'alterarstatus';
        $.post(ajaxUrl,{ idmenu : idmenu, ativo : ativo }, function(data){
            var data = $.parseJSON(data);
            if(data.success=='success'){

                $('.f'+idmenu).attr('value',data.status);
                if(data.status==1){
                    $('.f'+idmenu).removeClass('btn-danger');
                    $('.f'+idmenu).addClass('btn-success');
                    $('.f'+idmenu).html('Ativo');

                }else{
                    $('.f'+idmenu).removeClass('btn-success');
                    $('.f'+idmenu).addClass('btn-danger');
                    $('.f'+idmenu).html('Inativo');
                }
            }else{
                alert("Não foi possivel salvar");
            }
        });
    });
    $("#example2").on('click','.btnexcluir',function () {
        var id = $(this).attr('id');
        var nome = $(this).attr('name');
        var tipoex = $(this).attr('value');
        var ajaxUrl = 'excluir'+tipoex;
        swal({
            title: "Excluir informações de "+ tipoex + ": " + nome + "?",
            text: "Essa ação não pode ser desfeita",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim, excluir!",
            cancelButtonText: "Não",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function () {
            $.post(ajaxUrl, { id: id}, function(data){
                var data = $.parseJSON(data);
                if(data.success == 'success'){					
                swal({
                        title: "Exluido com sucesso!",
                        type: "success",
                    }, function () {
                        window.location.reload();
                    });
                }else{
                    swal("Não foi possivel exluir");
                }							 
            });
        });
    });

    /*$.notify({
        icon: 'https://randomuser.me/api/portraits/med/men/77.jpg',
        title: 'Byron Morgan',
        message: 'Momentum reduce child mortality effectiveness incubation empowerment connect.'
    },{
        type: 'minimalist',
        delay: 5000,
        allow_dismiss: false,
	    showProgressbar: true,
        icon_type: 'image',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<img data-notify="icon" class="rounded-circle pull-left ">' +
            '<span data-notify="title">{1}</span>' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>'+
        '</div>'
    });*/
    $("#example2").on('click','.addconquista',function () {
        var idconquista = $(this).attr('value');
        var nome = $(this).attr('name');
        var ajaxUrl = 'usuarioconquista';
        swal({
            title: "Digite o id do usuario que vai receber a conquista " + nome,
            type: "input",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Adicionar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function (inputValue) {
            if(inputValue!="" && inputValue!=false){
                $.post(ajaxUrl, { iduser : inputValue,idconquista : idconquista}, function(data){
                    var data = $.parseJSON(data);
                    if(data.success == 'success'){					
                    swal({
                            title: "Conquista adicionada com sucesso!",
                            type: "success",
                        }, function () {
                            window.location.reload();
                        });
                    }else{
                        swal("Não foi possivel adicionar a conquista");
                    }							 
                });
            }else{
                swal("Não foi possivel adicionar a conquista!!");
            }
        });
    });
});