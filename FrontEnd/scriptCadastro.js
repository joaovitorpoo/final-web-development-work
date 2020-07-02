if (localStorage.getItem("id") != null) {
    if (localStorage.getItem("id") == "admin@barbershop.com") {
        window.location.href = "http://localhost/FrontEnd/administrador.html";
    } else {
        window.location.href = "http://localhost/FrontEnd/user.html";
    }
}

function cadastrar() {
    var campoEmail = document.getElementById("campoEmail").value;
    var campoTelefone = document.getElementById("campoTelefone").value;
    var campoSenha = document.getElementById("campoSenha").value;
    var campoNome = document.getElementById("campoNome").value;
    
    if ( campoEmail != "" && campoNome != "" && campoSenha != "" && campoTelefone != "") {
        fetch('http://localhost/BackEnd/pessoas', {
            method: 'POST',
            body: JSON.stringify({
                nome: campoNome,
                telefone: campoTelefone,
                senha: campoSenha,
                email: campoEmail
            }),
            headers: {
            "Content-type": "application/json"
            }
        })
        .then(data => 
            window.location.href = "http://localhost/FrontEnd/login.html"
        );
    } else {
        alert("Digite valores validos.");
    }
}