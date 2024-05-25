let turmas = []
fetch('php/turmas.php')
    .then((res) => {
        return res.json()
    })
    .then((data) => {
        console.log(data)
        let id = localStorage.getItem('id')
        for (let i = 0; i < data.length; i++) {
            if (data[i].id == id) {
                turmas.push(parseInt(data[i].id))
            }
        }
    })

//console.log(turmas)
fetch("php/atividades.php")
    .then(resposta => resposta.json())
    .then((data) => {
        //.then(json => carregaElementosNaPagina(data));
        for (let i = 0; i < data.length; i++) {
            for (let j = 0; j < turmas.length; j++) {
                if (turmas[j] != data[i].id_turma) {
                    //aqui é id_turma pq é oq vem do arquivo atividades.php, pois é a chave estrangeira
                    //console.log("diferente")
                } else {
                    carregaElementosNaPagina(data)
                }
            }
        }
    })
// Função para carregar elementos na página de atividades
function carregaElementosNaPagina(data) {
    let table = document.createElement('table');
    let th1 = document.createElement('th');
    th1.innerHTML = "Número";
    table.appendChild(th1);
    let th2 = document.createElement('th');
    th2.innerHTML = "Nome";
    table.appendChild(th2);
    let th3 = document.createElement('th');
    th3.innerHTML = "Ações";
    table.appendChild(th3);

    for (let atvs of data) {
        // Verifica se a atividade está vinculada à turma atual
        if (atvs.id_turma == localStorage.getItem('id')) {
            let tr = document.createElement('tr');
            let td1 = document.createElement('td');
            td1.innerHTML = atvs.id;
            tr.appendChild(td1);
            let td2 = document.createElement('td');
            td2.innerHTML = atvs.descricao;
            tr.appendChild(td2);
            let td3 = document.createElement('td');

            let btnAtualizar = document.createElement('button');
            btnAtualizar.textContent = 'Atualizar';
            btnAtualizar.addEventListener('click', function () {
                // Redireciona para a tela de atualização
                redirectAtividades(atvs.id);
            });
            td3.appendChild(btnAtualizar);

            let btnExcluir = document.createElement('button');
            btnExcluir.textContent = 'Excluir';
            btnExcluir.addEventListener('click', function () {
                // Confirma a exclusão e, se confirmado, chama a função de exclusão
                var resposta = confirm("Deseja realmente excluir essa atividade?");
                if (resposta) {
                    excluirAtividade(atvs.id);
                }
            });
            td3.appendChild(btnExcluir);

            tr.appendChild(td3);
            table.appendChild(tr);
        }
    }

    let resultado = document.querySelector('#resultado');
    resultado.appendChild(table);
}

// Função para redirecionar para a página de atualização de atividades
function redirectAtividades(id) {
    window.location.href = "atualizarAtividade.php?id=" + id;
    localStorage.setItem('id', id)
}

// Função para excluir a atividade
function excluirAtividade(id) {
    // Envia uma solicitação para excluir a atividade
    fetch("php/excluirAtv.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'id=' + id
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Verifica se a exclusão foi bem-sucedida antes de recarregar a página
        if (data.message === "Atividade excluída com sucesso!") {
            window.location.reload();
        } else {
            alert("Erro ao excluir atividade: " + data.message);
        }
    })
    .catch(error => console.error('Erro ao excluir atividade:', error));
}
