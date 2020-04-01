//Chamando API openweathermap na tela de criação da cidade
function weatherBalloon() {
    fetch('https://ipinfo.io/json')
        .then(function (resp) {return resp.json()}) //Converte os dados em json
        .then(function (data) {
            console.log(data)
            var cidade = data.city
            document.getElementById('gps').value = "O clima será baseado na cidade de " + cidade
            tempo(cidade)
        })
}

//Altera clima de local para o escolhido pelo jogador
function tempo(cidade){

    fetch('http://api.openweathermap.org/data/2.5/weather?q='+cidade+'&units=metric&APPID=cb7b34f71fceaf7cb90d63ae50587adf')
    .then(function(resp){return resp.json()}) //converte os dados para json
    .then(function(data){
        console.log(data)

    //Preenchimento do quadrode informações climaticas
    var ico = data.weather[0].icon
    document.getElementById('icon').innerHTML = '<img src=http://openweathermap.org/img/w/' + ico + '.png>'
    document.getElementById('location').innerHTML = "Sua cidade: "+data.name
    document.getElementById('temp').innerHTML = "Temperatura: "+data.main.temp+"C"
    document.getElementById('description').innerHTML = data.weather[0].main+" ( "+data.weather[0].description+" ) "
    document.getElementById('wind').innerHTML = "Ventos a: "+data.wind.speed+" Nós"
    document.getElementById('cover').innerHTML = data.clouds.all+"% ( Cobertura do céu )"
    document.getElementById('humid').innerHTML = "H.R.A: "+data.main.humidity+" %"
    document.getElementById('gps').value = data.name
    })
}


