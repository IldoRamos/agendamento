
function mostraAlerta(elemento) {
    window.alert(elemento.value);
}


function buscarDias(valorcidade) {
    	
        var td = document.querySelector('div.app_datas');
        var cpf_element = document.getElementById('idcpf');
        var nome_element = document.getElementById('idnome');
                   
        var outrovalor = parseInt(valorcidade);
        
        //<?php $val = "<script>document.write(outrovalor);</script>"?>;
        

        var novoresult= '<?php echo buscarDia(1);?>';
        alert(novoresult);
        var vetor = novoresult.split(';');
        alert(vetor.length);
        for(var i =0; i< vetor.length-1; i++){
        
            novodiv = document.createElement('div');
            novodiv.style.width='50px';
            novodiv.style.height='50px';
            novodiv.style.backgroundColor='green';
            novodiv.style.margin='5px';
            novodiv.setAttribute('class','horinha');
            var val = vetor[i].split('-');
            var textNote = document.createTextNode(val[2]);
            novodiv.style.padding='15px';
            novodiv.appendChild(textNote);
                        
            td.appendChild(novodiv);
            console.log(td);
        }


        $("#dataage").show();
                   
                //});
                /*
                $('.datas').click(function () {
                    $(".datas").css("background", "green");
                    $(this).css("background", "red");
                    //$('.datas').hide();
                    //$(this).show();
                    $("#displaydias").show();

                    var datas = parseFloat(this.innerHTML);
                    document.getElementById('valordata').innerHTML = datas;
                    //alert(datas);

                });

                $('.horar').click(function () {
                    $('.horar').css("background", "#D3D3D3");
                    $(this).css("background", "brown");
                    $("#btnagendar").show();
                    var hora = (this.innerHTML);
                    document.getElementById('valorhora').innerHTML = hora;
                    alert(hora);

                });

                $('html').on('click','.horinha',function () {
                    var dias= parseFloat(this.innerHTML)
                    alert(dias);
                });

                $('.idcpf').mask('000.000.000-00', {reverse: true});
                */
   
}