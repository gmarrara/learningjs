// // Criar um programa que calcula a média das turmas



const usuarios = [
    {
        nome: "Carlos",
        tecnologias: ['HTML', 'Javascript']
    },
    {
        nome: "João",
        tecnologias: ["Javascript", "CSS"]
    },
    {
        nome: "Tuane",
        tecnologias: ["HTML", "Node.js"]
    }
]




function impUsuarios(usuarios) {
    for (let i = 0; i < usuarios.length; i++)
        console.log(`O usuário ${usuarios[i].nome} trabalha com ${usuarios[i].tecnologias.join(", ")}`)
}

// impUsuarios(usuarios)



// Busca por usuário

function checaSeUsuarioUsaCSS(usuarios) {
    for (let usuario of usuarios.tecnologias) {
        if (tecnologia == 'CSS') {
            return true
        }
    }
    return false
}

checaSeUsuarioUsaCSS(usuarios)