function verificarCPF(c) {
    var i;
    s = c;
    var c = s.substr(0, 9);
    var dv = s.substr(9, 2);
    var d1 = 0;
    var v = false;

    for (i = 0; i < 9; i++) {
        d1 += c.charAt(i) * (10 - i);
    }
    if (d1 == 0) {
        alert("CPF Inválido")
        v = true;
        document.getElementById('cpf').value = '';
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9)
        d1 = 0;
    if (dv.charAt(0) != d1) {
        alert("CPF Inválido")
        v = true;
        document.getElementById('cpf').value = '';
        return false;
    }

    d1 *= 2;
    for (i = 0; i < 9; i++) {
        d1 += c.charAt(i) * (11 - i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9)
        d1 = 0;
    if (dv.charAt(1) != d1) {
        alert("CPF Inválido")
        v = true;
        document.getElementById('cpf').value = '';
        return false;
    }
    if (!v) {
        //alert(c + "n CPF Válido")

    }
    $('.idcpf').mask('000.000.000-00', {reverse: true});
}

function validacaoEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@") + 1, field.value.length);
    if ((usuario.length >= 1) &&
            (dominio.length >= 3) &&
            (usuario.search("@") == -1) &&
            (dominio.search("@") == -1) &&
            (usuario.search(" ") == -1) &&
            (dominio.search(" ") == -1) &&
            (dominio.search(".") != -1) &&
            (dominio.indexOf(".") >= 1) &&
            (dominio.lastIndexOf(".") < dominio.length - 1)) {
        
        //alert("email valido");
        //document.getElementById("msgemail").value = '';
    } else {
        
        alert("E-mail invalido");
        document.getElementById("msgemail").value = '';
    }
}


$(document).ready(function () {
    $('#data_ing').change(function () {
        var elemento = document.getElementById("data_ing").value;
        //alert(elemento);
        var date = new Date(elemento.split('/').reverse().join('/'));
        //alert(date);
        var novaData = new Date();
        //alert(novaData);
        if (date > novaData) {
            alert("Essa data ainda não chegou!");
            document.getElementById('data_ing').value = ''; // Limpa o campo
            //elemento.innerHTML = '';
        }

    });
});


$(document).ready(function () {
    $('#data_entrada').change(function () {
        var elemento = document.getElementById("data_entrada").value;
        //alert(elemento);
        var date = new Date(elemento.split('/').reverse().join('/'));
        //alert(date);
        var novaData = new Date();
        //alert(novaData);
        if (date > novaData) {
            alert("Essa data ainda não chegou!");
            document.getElementById('data_entrada').value = ''; // Limpa o campo
            elemento.innerHTML = '';
        }

    });
});


$(document).ready(function () {
    $('#data_nascimento').change(function () {
        var elemento = document.getElementById("data_nascimento").value;
        //alert(elemento);
        //elemento.setYear(elemento.getYear() + 17);
        var date = new Date(elemento.split('/').reverse().join('/'));
        //alert(elemento);
        var novaData = new Date();
        //alert(date.getFullYear()+17);
        if (date > novaData) {
            alert("Essa data ainda não chegou!");
            elemento.innerHTML = '';
        }
        date.setYear(date.getFullYear() + 17);
        //alert(date);
        if (!(date < novaData)) {
            alert("voce  é de menor");
            document.getElementById('data_nascimento').value = ''; // Limpa o campo
            elemento.innerHTML = '';
        }

    });
});