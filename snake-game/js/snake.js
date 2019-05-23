var Configuracao = [];
Configuracao = {velocidade: 100,
tempoComidaAtiva: 5000,
largura:15}

var contexto;
var Canvas = {
	iniciargame:function(){
		
		// Defindindo canvas
		var objCanvas = document.getElementById('canvas');
		contexto = objCanvas.getContext("2d");
		Canvas.maxWidth = parseInt(objCanvas.width);
		Canvas.maxHeight = parseInt(objCanvas.height);		
		Canvas.background();
	},
	background:function(){
		//background do canvas
		contexto.beginPath();
		var gradient = contexto.createLinearGradient(Canvas.maxWidth, 0, 0, Canvas.maxHeight);
		contexto.clearRect(0,0,Canvas.maxWidth,Canvas.maxHeight);
		gradient.addColorStop(0,'#e4e4e4');//cor do background
		contexto.fillStyle = gradient;
		contexto.fillRect(0, 0, Canvas.maxWidth, Canvas.maxHeight);			
		contexto.closePath();

	},
	_preenchercobra:function(){
		Canvas.background();
		for(i=0;i<Snake.tamanho;i++){
			contexto.fillStyle = "#4628a0";//cor da cobra
			contexto.beginPath();
			contexto.fillRect(Snake.corpo[i].x * Configuracao.largura, Snake.corpo[i].y * Configuracao.largura, Configuracao.largura, Configuracao.largura);			
			contexto.closePath();					
		}
		
		Snake._mover();
		Jogo.tempo += Configuracao.velocidade;
		if(Jogo.tempo % (Configuracao.velocidade*50) ==0) Comida._adicionar();//adiciona comida
		Comida._preenchercobra();
		Comida._capturar();
	}
}	
var Comida = {
	lista:new Array(),
	_adicionar:function(){
		var lugar_ocupado = true;
		var comida_x, comida_y;
		
		while(lugar_ocupado==true){//verifica se o lugas esta ocupado
			lugar_ocupado = false;
			comida_x = parseInt(Math.random()* (Canvas.maxWidth / Configuracao.largura));//gera um x
			comida_y = parseInt(Math.random()* (Canvas.maxHeight / Configuracao.largura));//gera um y
			for(i=0;i<Snake.tamanho;i++){//se esse lugar estiver ocupado roda de novo
				if(Snake.corpo[i].x == comida_x && Snake.corpo[i].y == comida_y) lugar_ocupado = true;
			}				
		}		
		Comida.lista.push({
			x:comida_x,
			y:comida_y,
			inicio:Jogo.tempo
		});
	},
	_preenchercobra:function(){
		for(i=0;i<Comida.lista.length;i++){
			contexto.fillStyle = "#b92222";//cor da comida
			contexto.beginPath();
			contexto.fillRect(Comida.lista[i].x * Configuracao.largura, Comida.lista[i].y * Configuracao.largura, Configuracao.largura, Configuracao.largura);			
			contexto.closePath();					
		}	
		if(Comida.lista.length>0)	if(Comida.lista[0].inicio + Configuracao.tempoComidaAtiva < Jogo.tempo) Comida.lista.shift();	
	},
	_capturar:function(){
		for(i=0;i<Comida.lista.length;i++){
			if(Comida.lista[i].x == Snake.corpo[Snake.tamanho-1].x && Comida.lista[i].y == Snake.corpo[Snake.tamanho-1].y){
				Snake._crescertamanho();
				Jogo.pontos += 300;
				return Comida._remover(i);
			}
		}	
	},
	_remover:function(Indice){
		for(i=Indice;i + 1<Comida.lista.length;i++){
			Comida.lista[i].x = Comida.lista[i+1].x;
			Comida.lista[i].y = Comida.lista[i+1].y;
		}	
		Comida.lista.pop();
	}
}
var Snake = {
	tamanho: 0, 
	direcao: 0, 
	ultimaDirecao: 0, 
	corpo: new Array(),
	_mover:function(){
		Jogo._placar();
		
		var novo_x = Snake.corpo[Snake.tamanho-1].x;
		var novo_y = Snake.corpo[Snake.tamanho-1].y;
		if(Snake.direcao==0) novo_y--; // seta pra cima
		if(Snake.direcao==1) novo_x++; // seta pra direita
		if(Snake.direcao==2) novo_y++; // seta pra baixo
		if(Snake.direcao==3) novo_x--;; // seta pra esquerda
		Snake.ultimaDirecao = Snake.direcao;
		
		for(i=0;i<Snake.tamanho-1;i++){
			Snake.corpo[i].x = Snake.corpo[i+1].x;
			Snake.corpo[i].y = Snake.corpo[i+1].y;
			if(Snake.corpo[i].x==novo_x && Snake.corpo[i].y==novo_y) return Jogo._gameOver();			
		}
		
		Snake.corpo[Snake.tamanho-1].x = novo_x;
		Snake.corpo[Snake.tamanho-1].y = novo_y;
		
		// Verifica se bateu na parede
		//se bateu chama game over
		if(Snake.corpo[Snake.tamanho-1].x * Configuracao.largura >= Canvas.maxWidth || Snake.corpo[Snake.tamanho-1].x < 0) return Jogo._gameOver();
		if(Snake.corpo[Snake.tamanho-1].y * Configuracao.largura >= Canvas.maxHeight || Snake.corpo[Snake.tamanho-1].y < 0) return Jogo._gameOver();
	},
	_crescertamanho:function(){
		Snake.corpo.unshift({
			x:Snake.corpo[0].x-1,
			y:Snake.corpo[0].y
		},{
			x:Snake.corpo[0].x-1,
			y:Snake.corpo[0].y
		},{
			x:Snake.corpo[0].x-1,
			y:Snake.corpo[0].y
		});
		Snake.tamanho += 3;
	}
}



var Jogo = {
	play:'',
	pontos: 0,
	tempo: 0,
	_iniciar:function(){
		Snake.tamanho = 5;
		Snake.direcao = 2;
		Jogo.tempo = 0;
		Jogo.pontos = 0;
		document.getElementById('endgame').style.display = 'none';//remove tela de pontos
		document.getElementById('container').style.display = 'block';//adiciona tela do jogo
		document.getElementById('cadastrado').style.display = 'none';//remove mensagem de pontos cadastrados
		Comida.lista = new Array();
		for(i=0;i<Snake.tamanho;i++){ Snake.corpo[i]={ x:i, y:0 } }	
		Jogo._play();
		document.getElementById('pontos').innerHTML = '0';
		document.getElementById('box_score').style.visibility = 'visible';		
	},
	_placar:function(){
		Jogo.pontos++;
		if(Jogo.pontos%1==0) document.getElementById('pontos').innerHTML = Jogo.pontos;//atualiza os pontos
	},
	_play:function(){
		if(Jogo.play!='') clearInterval(Jogo.play);
		Jogo.play = setInterval(Canvas._preenchercobra, Configuracao.velocidade);	
	},
	_gameOver:function(){//acaba o jogo
		if(Jogo.play!='') clearInterval(Jogo.play);
		document.getElementById('container').style.display = 'none';//muda de tela para enviar os pontos
		document.getElementById('endgame').style.display = 'block';
		document.getElementById('pontos2').innerHTML = Jogo.pontos;
		document.getElementById('pontos3').value = Jogo.pontos;
	},
	_pausar:function(){
		if(Jogo.play!=''){
			clearInterval(Jogo.play);
			Jogo.play = '';
		} else {
			Jogo._play();
		}	
	},
	controles:function(e, event){
		if (window.event){  e = window.event; }
		switch(e.keyCode){//pega o movimento da cobra
			case 38:
				if(Snake.ultimaDirecao!=2) Snake.direcao = 0; //seta pra cima
				e.preventDefault();
				break;
			case 39:
				if(Snake.ultimaDirecao!=3) Snake.direcao = 1; //seta pra direita
				e.preventDefault();
				break;
			case 40:
				if(Snake.ultimaDirecao!=0) Snake.direcao = 2; //seta pra baixo
				e.preventDefault();
				break;
			case 37:
				if(Snake.ultimaDirecao!=1) Snake.direcao = 3; //seta pra esquerda
				e.preventDefault();
				break;
		}
	}
}
function setDificuldade(n) {//mudar dificuldade
	if(n=="facil"){
	document.getElementById('dificul').value = 'facil';
	Configuracao = {velocidade: 150,
	tempoComidaAtiva: 8000,
	largura:15}
    }
	if(n=="medio"){
	document.getElementById('dificul').value = 'medio';
	Configuracao = {velocidade: 100,
	tempoComidaAtiva: 5000,
	largura:15}
    }
	if(n=="dificil"){
	document.getElementById('dificul').value = 'dificil';
	Configuracao = {velocidade: 70,
	tempoComidaAtiva: 3000,
	largura:15}
    }
}
window.onload = Canvas.iniciargame;//chama o jogo ao iniciar a tela
document.onkeydown = Jogo.controles;//pega os controles