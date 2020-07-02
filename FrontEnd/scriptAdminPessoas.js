
fetch('http://localhost/BackEnd/pessoas').then(
    Response => Response.json()
).then(
    data => {
        console.log(data);
        for (let index = 0; index < data.length; index++) {
            criarLinha(data[index]);
        }
    }
)

function criarLinha(dados){
    let corpoTabela = document.querySelector("table");
    var linha = document.createElement("tr");

    var campo1 = document.createElement("td");
    var campo2 = document.createElement("td");
    var campo3 = document.createElement("td");
    var campo4 = document.createElement("td");

    var text1 = document.createTextNode(dados.id);
    var text2 = document.createTextNode(dados.nome);
    var text3 = document.createTextNode(dados.telefone);
    var text4 = document.createTextNode(dados.email);

    campo1.appendChild(text1);
    campo2.appendChild(text2);
    campo3.appendChild(text3);
    campo4.appendChild(text4);

    linha.appendChild(campo1);
    linha.appendChild(campo2);
    linha.appendChild(campo3);
    linha.appendChild(campo4);

    corpoTabela.appendChild(linha);
}

function sair() {
    localStorage.removeItem("id");
    window.location.href = "http://localhost/FrontEnd/index.html";
}