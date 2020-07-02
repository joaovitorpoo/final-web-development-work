var userId = localStorage.getItem("id");

fetch('http://localhost/BackEnd/atendimentos/'+userId).then(
    Response => Response.json()
).then( data => {
    if (data.mensagem == "Não encontrado") {
        document.getElementById("HorarioDiv").remove();

    } else {
        document.getElementById("cadastroHorarioDiv").remove();
        document.getElementById("marcadoData").value = data.data;
        document.getElementById("marcadoHorario").value = data.horario;
    }
})


function sair() {
    localStorage.removeItem("id");
    window.location.href = "http://localhost/FrontEnd/index.html";
}

function Marca() {
    var campoData = document.getElementById("campoData").value;
    var campoHorario = document.getElementById("campoHorario").value;
    
    fetch('http://localhost/BackEnd/atendimentos', {
        method: 'POST',
        body: JSON.stringify({
            id: userId,
            horario: campoHorario,
            data: campoData
        }),
        headers: {
            "Content-type": "application/json"
        }
    }).then(data => 
        window.location.href = "http://localhost/FrontEnd/cadastrar.html"
    );
}

function Cancelar() {
    fetch('http://localhost/BackEnd/atendimentos', {
        method: 'DELETE',
        body: JSON.stringify({
            id: userId
        }),
        headers: {
            "Content-type": "application/json"
        }
    }).then(data => 
        window.location.href = "http://localhost/FrontEnd/cadastrar.html"
    );
}