// Desafio Objetos e vetores
/* Crie um programa que armazena dados da empresa Rocketseat dentro de um objeto chamado empresa. Os dados a serem armazenados são:

Nome: Rocketseat
Cor: Roxo
Foco: Programação
Endereço:
Rua: Rua Guilherme Gembala
Número: 260
*/


const usuario = [
    {
        nome: "Gustavo",
        idade: 38, 
        empresa: {
            nomeEmp: "Neozoneweb",
            endWeb: "neozoneweb.net",
            endereco: "Flat 24, 20 Granville Road",
            cep: "SW18 5SL",
            cidade: "Londres",
            pais: "Inglaterra",
            
        }
    }
]


console.log(usuario[0].empresa.pais)

console.log(`A empresa ${usuario[0].empresa.nomeEmp} fica situada no(a) ${usuario[0].empresa.endereco}, ${usuario[0].empresa.cep}, ${usuario[0].empresa.cidade}, ${usuario[0].empresa.pais}.`)