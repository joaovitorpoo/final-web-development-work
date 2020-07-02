if (localStorage.getItem("id") != null) {
    if (localStorage.getItem("id") == "admin@barbershop.com") {
        window.location.href = "http://localhost/FrontEnd/administrador.html";
    } else {
        window.location.href = "http://localhost/FrontEnd/user.html";
    }
}

function logar() {
    var emailOn = false;
    var campoEmail = document.getElementById("campoEmail").value;
    var campoSenha = document.getElementById("campoSenha").value;

    fetch('http://localhost/BackEnd/pessoas').then(
        Response => Response.json()
    ).then( data => {
        console.log(data);
        for (let index = 0; index < data.length; index++) {
            if (data[index].email == campoEmail){
                emailOn = true;
                if (data[index].senha == campoSenha){
                    localStorage.setItem("id", data[index].id);
                    window.location.href = "http://localhost/FrontEnd/user.html";
                } else {
                    alert("A senha inserida está incorreta.");
                }
            }
        }
        if (campoEmail == "admin@barbershop.com") {
            emailOn = true;
            if (campoSenha == "admin1234") {
                localStorage.setItem("id", "admin@barbershop.com");
                window.location.href = "http://localhost/FrontEnd/administrador.html";
            } else {
                alert("A senha inserida está incorreta.");
            }
        }
        if (emailOn == false){
            alert("O email inserido não corresponde a nenhuma conta.");
        }
    })
}