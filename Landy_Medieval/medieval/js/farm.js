//Intervalo de mudança nos preços
setInterval("market(5,15)",10000)

//Função para gerar preços aleatórios no mercado
function market(min,max){
    //Pecuária
    document.getElementById('porco').innerHTML = Math.floor(Math.random() * (max - min)+1)
    document.getElementById('cabra').innerHTML = Math.floor(Math.random() * (max*0.5 - min+4)+1)
    document.getElementById('boi').innerHTML = Math.floor(Math.random() * (max*2.75 - min+1.6)+1)
    document.getElementById('galinha').innerHTML = Math.floor(Math.random() * (max*2.75 - min+1.6)+1)
    
    //Agricola
    document.getElementById('milho').innerHTML = Math.floor(Math.random() * (max*3.2 - min)+1)
    document.getElementById('cenoura').innerHTML = Math.floor(Math.random() * (max*1.5 - min+2)+1)
    document.getElementById('batata').innerHTML = Math.floor(Math.random() * (max*3.75 - min+1.8)+1)
    document.getElementById('spice').innerHTML = Math.floor(Math.random() * (max*9.75 - min+1.6)+4)

}

//Função para buscar dados climáticos de acordo com a escolha do jogador
function weather(cidade){

    fetch('http://api.openweathermap.org/data/2.5/weather?q='+cidade+'&units=metric&APPID=cb7b34f71fceaf7cb90d63ae50587adf')
    .then(function(resp){return resp.json()}) //converte os dados para json
    .then(function(data){
        console.log(data)
        var weather = data.weather[0].main
        var descr = data.weather[0].description
        var temp = data.main.temp
        var wind = data.wind.speed
        var hum = data.main.humidity
        var ico = data.weather[0].icon
        //Tranferencia dos dados do Json para tela (divs)
        document.getElementById('icon').innerHTML = '<img src=http://openweathermap.org/img/w/' + ico + '.png>'
        document.getElementById('cast').innerHTML = weather
        //document.getElementById('descrip').innerHTML = descr
        document.getElementById('temp').innerHTML = "Temperatura: "+temp+" °C"
        document.getElementById('wind').innerHTML = "Ventos a: "+wind+" Nós"
        document.getElementById('humid').innerHTML = "H.R.A: "+hum+" %"
    })
}

//Função para ativar slider de compra/venda
function ativa(ativo){
    if (ativo!="0"){
        document.getElementById("quantidade").disabled = false
    }else{
        document.getElementById("quantidade").disabled = true
    }
}

//Função para texto do slider, mostrando compra, venda, quantidade e valor
function quanta(valor){
    if (valor < 0){acao="venda"}else if (valor > 0) {acao = "compra"}else if (valor == 0 ){document.getElementById("qtd").innerHTML = 0}
    
    var kind = document.getElementById('tipo').value
    var price = document.getElementById(kind).innerHTML

    document.getElementById("qtd").innerHTML = "Quantidade= "+Math.abs(valor)+" Valor total da "+acao+"= "+Math.abs((valor*price))+" moedas"
}

function mostrar(id){
    if (id == 'pecuaria'){
        if (document.getElementById(id).style.display =='flex'){
            document.getElementById(id).style.display = 'none';
        }else{
            document.getElementById(id).style.display = 'flex'
            document.getElementById('agricultura').style.display = 'none'
            document.getElementById('agr').style.opacity = "0.5"
            document.getElementById('pec').style.opacity = "1"
        }
    }else if(id =='agricultura'){
        if (document.getElementById(id).style.display =='flex'){
            document.getElementById(id).style.display = 'none';
            
        }else{
            document.getElementById(id).style.display = 'flex'
            document.getElementById('pecuaria').style.display = 'none'
            document.getElementById('pec').style.opacity = "0.5"
            document.getElementById('agr').style.opacity = "1"
        }

    }else if (id == 'animal'){
        if (document.getElementById(id).style.display =='flex'){
            document.getElementById(id).style.display = 'none';
        }else{
            document.getElementById(id).style.display = 'flex'
            document.getElementById('plantacao').style.display = 'none'
            document.getElementById('pla').style.opacity = "0.5"
            document.getElementById('ani').style.opacity = "1"
        }

    }else if (id =='plantacao'){
        if (document.getElementById(id).style.display =='flex'){
            document.getElementById(id).style.display = 'none';
            
        }else{
            document.getElementById(id).style.display = 'flex'
            document.getElementById('animal').style.display = 'none'
            document.getElementById('ani').style.opacity = "0.5"
            document.getElementById('pla').style.opacity = "1"
        }
    }
}

function allowDrop(ev){
    ev.preventDefault()
}
var anterior = ''

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id)
    anterior = ev.target.parentElement.id
}

function drop(ev, id) {
    var pea = parseInt(document.getElementById(anterior).getAttribute('value')) //Pega o valor do campo de onde vem o objeto
    console.log(id)
    //if (pea >1) {}
        var data = ev.dataTransfer.getData("text")
        ev.target.appendChild(document.getElementById(data))//Caso o valor seja maior que zero, é transferido o objeto para o novo campo
        counterP = parseInt(document.getElementById(id).getAttribute('value'))+1 //Contador para aumentar o valor do campo que recebe o objeto
        counterM = parseInt(document.getElementById(anterior).getAttribute('value'))-1 //contador para diminuir o valor do campo que doa objeto
        document.getElementById(id).setAttribute('value', counterP) //atribuição de novo valor ao campo que recebe objeto
        document.getElementById(anterior).setAttribute('value', counterM) //atribuição de novo valor ao campo que doa objeto
        document.getElementById(anterior).innerHTML = counterM+ " trabalhador "+document.getElementById(anterior).id+'<img src=imgs/peasant.png id="standby" draggable="true" ondragstart="drag(event)" width="30" height="30">'
        document.getElementById(id).innerHTML = counterP+ " trabalhador "+document.getElementById(id).id+'<img src=imgs/peasant.png id="standby" draggable="true" ondragstart="drag(event)" width="30" height="30">'
}



// Defune quantidade de trabalhadores em cada tarefa, com limite de trabalhadores referenciado pelos ociosos
function muda(vl, id){

    ante = parseInt(document.getElementById(id).getAttribute('value')) //valor anterior do campo de trabalho
    ocio = parseInt(document.getElementById("ocioso").getAttribute('value'))
	
	if (ocio > 0) {
		if (vl > ante){
			vlr = parseInt(document.getElementById("ocioso").getAttribute('value'))-1 //valor do campo dos trabalhadores ociosos
			acao="Mais trabalhando"
			sinal = 1
		}else if(vl < ante){
			vlr = parseInt(document.getElementById("ocioso").getAttribute('value'))+1 //valor do campo dos trabalhadores ociosos
			acao="Menos trabalhando"
			sinal = -1
		}
		document.getElementById(id).setAttribute('value', vl)
		document.getElementById("ocioso").setAttribute('value', vlr)
		document.getElementById("ocioso").innerHTML = vlr
		
		console.log("-----------------------------------")
		console.log("trabalhadores ativos antes "+ante)
		console.log("Trabalhadores ativos atual "+vl) 
		console.log("Trabalhadores ociosos atual "+vlr) 
		console.log("-------------"+acao+"--------------")
		
	}if (ocio ==0){
		
		if (vl < ante){
			vlr = parseInt(document.getElementById("ocioso").getAttribute('value'))+1 //valor do campo dos trabalhadores ociosos
			document.getElementById("ocioso").setAttribute('value', vlr)
			document.getElementById("ocioso").innerHTML = vlr
			acao="Menos trabalhando"
			
		}else if(vl > ante){
			document.getElementById(id).value = 0
			console.log("Você não tem trabalhadores suficientes")
		}
	}
 
 //Gera produção de acordo com a quantidade de trabalhadores em cada tarefa
			
	if (document.getElementById(id).value >0){
		nameId = document.getElementById(id).id.substring(4,0)
		console.log(nameId)
		qtdm = parseInt(document.getElementById(nameId).innerHTML)
		document.getElementById(nameId).innerHTML = qtdm + (5 * sinal)
		
	}else{
		document.getElementById(nameId).innerHTML = "0"
	}	
}//end of a function

//Monitora produção para envio ao celeiro
setInterval(function ale() {
	console.log("Monitorando tarefas, para envio de produção ao celeiro")
	$('.work').each(function (i, obj){
		fieldy = $(this.id).selector
		if (document.getElementById(fieldy).value > 0){
			manys = document.getElementById(fieldy).value
			produ = parseInt(document.getElementById(fieldy.substring(5,0)).innerHTML)
			produ = produ + (parseInt(1)* manys)
			console.log(produ)
			document.getElementById(fieldy.substring(5,0)).innerHTML = produ
		}
		
	})}, 30000)// 1000 igual 1 segundo