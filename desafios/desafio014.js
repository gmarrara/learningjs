// Desafio 01-4. Aplicação: Operações bancárias
// Crie um programa para realizar operações bancárias na conta de um usuário.

// Comece criando um objeto com o nome do usuário, suas transações e saldo.

// As transações (transactions) devem iniciar como um array vazio [] e o saldo (balance) em 0 (zero).

// const user = {
//   name: 'Mariana',
//   transactions: [],
//   balance: 0
// }


const user = {
    name: 'Gustavo',
    transactions: [],
    balance: 0
}

// console.table(user)

function createTransaction (transaction) {
    user.transactions.push
    if (transaction.type == 'credit'){
        user.balance = user.balance + transaction.value
    } else {
        user.balance = user.balance - transaction.value
    }
}

createTransaction({type: 'credit', value: 50.5})
createTransaction({type: 'credit', value: 25.5})
createTransaction({type: 'debit', value: 32})



// Relatorios


function getHigherTransactionByType (type) {
    for (let transaction of user.transactions) {
        if (type == transactions.type) {
            console.log(transaction)
        } 
    }
}

