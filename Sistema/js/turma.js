
fetch("php/turmas.php")
    .then(resposta => resposta.json())
    .then(json => carregaElementosNaPagina(json));
function carregaElementosNaPagina(json) {
    console.log(json)
    let table = document.createElement('table');
    let th1 = document.createElement('th');
    th1.innerHTML = "Número"
    table.appendChild(th1)
    let th2 = document.createElement('th');
    th2.innerHTML = "Nome"
    table.appendChild(th2)
    let th3 = document.createElement('th');
    th3.innerHTML = "Ação"
    table.appendChild(th3)
    for (let turma of json) {
        let tr = document.createElement('tr');
        let td1 = document.createElement('td');
        td1.innerHTML = turma.id;
        tr.appendChild(td1);
        let td2 = document.createElement('td');
        td2.innerHTML = turma.nome_turma;
        tr.appendChild(td2);
        let td3 = document.createElement('td');
        td3.innerHTML = `<button class="visualizar" 
onclick="redirectAtividades(${turma.id})">Visualizar</button>`;
        tr.appendChild(td3);
        let td4 = document.createElement('td');
        td4.innerHTML = `<button class="excluir" 
onclick="redirectExcluirTurma(${turma.id})">Excluir</button>`;
        tr.appendChild(td4);
        table.appendChild(tr);
    }
    let resultado = document.querySelector('#resultado');

    resultado.appendChild(table);
}
function redirectAtividades(id) {
    window.location.href = "atividades.php?id=" + id;
    localStorage.setItem('id', id)
}
function redirectExcluirTurma(id) {
    localStorage.setItem('id', id)
    var resposta = confirm("Deseja remover esse registro?");
    if (resposta == true) {
        window.location.href = "php/excluirTurmas.php?id=" + id;
    }
}
