<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!-- <script type="text/javascript" src="js/bootstrap.js"></script>-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/mdb.css">
    <link rel="stylesheet" type="text/css" href="../utils/estilos.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>

    <link href="../css/style_1.css" rel="stylesheet">
   <!-- <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">-->

    <style type="text/css">


        .datas{
            padding: 10px;
            border-radius: 3px solid black;
            background-color: green;
        }


        .difer{
            margin: 10px;
            margin-top: 30px;
            align-items: center;
        }


        #livre{
            color: green;
        }

        #reservados{
            color: red;
        }

        .caros{
            display: inline-block;
        }
        .diaas{
            left: center;
        }
        #displaydias{
            padding: 5px;
            margin: 20px;
        }
        .horar{
            margin: 5px;
            border: 1px solid #00a;
            padding: 10px;
            
        }
        .app_datas{
            display: inline-flex;
            width: 100%
        }

        .app_datas div{
            box-shadow: 10px 5px 5px black;
        }

        .iddia .colunas{
            width: 100%;
            height: 100%;
            margin: 5px;
            padding: 15px;
            text-align: center;

        }
        .horasdisponiveis{
            text-decoration: none;
            display: inline-table;
            margin: 5px;

        }
        .totalhoras{}
        #idValDia{text-align: center;}
    </style>

</head>
<body>
    <div class="wrapper">

        <div id="content">


            <section id="clients" class="section-bg">
                <div class="container">
                    <div class="section-header">
                        <div align="center">
                            <img src="../img/logo_aegbce.jpg"  align="center" class="rounded-circle" alt="Associação dos Estudantes Guineense dos Estado de Ceará" width="166" height="166" >
                        </div>
                        <h3>Embaixada da Guiné-Bissau</h3>
                        <p>Sistema de agendamento para emissão de passaportes, Registro criminal e Cartão Consular</p>
                    </div>

                    <form action="agenda.php" method="POST">
                        <div class=" wow fadeInUp diaas">
                            <div class="form-group">
                                <div class="col-md-4 mb-3 form-group">
                                    <label>Cidade >></label>
                                    <?php
                                    
                                    $cidade = isset($_POST['codcid']);
                                    //if($cidade==1){
                                        echo " Fortaleza";
                                    //}else{
                                    //   echo " São Paulo";
                                   //}
                                    //echo $cidade;

                                   ?>
                               </div>
                               <!--codigo php -->


                           </div>

                       </div>
                   </form>

                   <div class="clearfix  diaas" id="dataage" >
                    <div class="  diass">
                        <h3>Escolher dia de agendamento disponivel</h3>
                        <div class="app_datas">

                            <?php
                            include_once('../controller/conexao_pdo.php');
                                    //if(isset($_POST['codcid'])==$cidade && isset($_POST['codcid'])!=""){


                            $sql = "SELECT distinct dia FROM horarioss WHERE codcidade =1";


                            try{
                                $stmt = $conexao->prepare($sql);
                                            //$stmt->bindParam(1,$cid, PDO::PARAM_INT);
                                            //$valAtual = 0;
                                            //$flat =0;

                                if ($stmt->execute()) {

                                    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                                    //$resultado .=$rs->dia.';';

                                        $val=$rs->dia;
                                        $val = explode("-",$rs->dia);
                                        echo'<form action="../view/agendar.php" method="POST">';



                                        echo '<div class=\"colunas">
                                        <button type=\"submit" name="seledia" class=\"iddia" value='.$val[2].'>'.$val[2].'</button>
                                        </div> ';

                                        echo '</form>';

                                    }

                                } else {
                                    echo "Erro: Não foi possível recuperar os dados do banco de dados";
                                }

                            } catch (PDOException $erro) {
                                echo "Erro: " . $erro->getMessage();
                            }

                                //}

                            ?>

                        </div>

                    </div>

                    <input type="date" name="data" hidden="true" id="valordata">

                </div>
                <div class="cols-4 diass" id="displaydias">
                    <table class="table table-secondary table-border table-striped" width="100%">
                        <thead>
                            <th >
                                <td style="text-align: center;"><strong>HORÁRIOS DISPONIVEIS DE ATENDIMENTO</strong></td>
                            </th>
                        </thead>
                        <tbody id="tabdia">
                            <tr>
                            </tr>

                        </tbody>
                    </table>
                    <?php
                    $dia='';
                     if(!isset($_REQUEST['seledia'])){
                        $dia='17';
                     }else if(isset($_REQUEST['seledia'])!==""){
                        $dia='17';
                        $dia = $_REQUEST['seledia'];
                        $inicial ='2020-12-';
                        $dia = $inicial.$dia;
                         
                        echo'<h4 style="align:center" id="idValDia">'. $dia .'</h4>';

                        $sql = "SELECT distinct hora FROM horarioss WHERE dia = '$dia' and situacao<>1" ;


                        try{
                            $stmt = $conexao->prepare($sql);
                                            //$stmt->bindParam(1,$cid, PDO::PARAM_INT);
                                            //$valAtual = 0;
                                            //$flat =0;

                            if ($stmt->execute()) {
                                echo'<div ><ul class="totalhoras">';
                                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                                    //$resultado .=$rs->dia.';';

                                                    //$val=$rs->hora;
                                                    //$val = explode("-",$rs->dia);
                                    echo'<li class="horasdisponiveis">
                                    <div class="colunas1">
                                    <button type="submit"  class="iddia2">'.$rs->hora.'</button>
                                    </div>';
                                    echo'</li>';
                                }
                                echo'</ul> </div>';

                            } else {
                                echo "Erro: Não foi possível recuperar os dados do banco de dados";
                            }

                        } catch (PDOException $erro) {
                            echo "Erro: " . $erro->getMessage();
                        }
                    }
                    ?>

                </div>
                <div id="btnagendar">
                    <form  action="../controller/disponibilidade.php" method="POST">
                        <div class="form-row  wow fadeOut diaas">
                            <input type="text" name="data" value="<?php echo $dia ?>"id="valordata" hidden="true">
                        </div>

                        <div class="form-row  wow fadeOut diaas"  >
                            <input type="text" name="hora" id="valorhora" hidden="true">
                        </div>
                        <div class="form-row  wow fadeOut diaas"  >
                            <label for="idcpf">CPF:</label>
                            <input type="text" name="cpf"  id="idcpf" class="form-control"  required>
                        </div>
                        <div class="form-row  wow fadeOut diaas">
                            <label for="idnome">Nome:</label>
                            <input type="text" name="nome"  id="idnome" class="form-control" required>
                        </div>

                        <div class="form-row  wow fadeOut diaas">
                            <label for="idnome">E-mail:</label>
                            <input type="text" name="email"  id="idemail" class="form-control" required>
                        </div>

                        <div class="row  wow fadeOut diaas" style="
                        margin: 15px;" >

                            <button type="submit" class="form-control" onclick="salvarAgenda()">Agendar</button>
                        </div>
                    </form>
                </div>
            </div>

        </section>

    </div>
</div>

<script type="text/javascript">
    
    function salvarAgenda(){
        var valHora= document.getElementById('valorhora');
         var valDia= document.querySelector('#valordata');
         var valNome= document.querySelector('#valordata');
        var resultado = confirm("Olá "+valNome.value+", Deseja agendar nesta data?: " +"Dia: "+valDia.value+" Hora : " +valHora.value+ " ?");
        if (resultado == true) {

        }else{
            window.location="../view/agendar.php"
        }

    }

</script>

<script  type="text/javascript">
    $(document).ready(function() {
        $("#btnagendar").hide();
        $(".iddia2").css("background", "green");
        $('html').on('click','.iddia2',function () {
            $(".iddia2").css("background", "green");
            $(this).css("background", "red");
            $("#btnagendar").show();

            //var hora = $(this).val();
            
            //var valHora=$(this).attr("hora");
            var hora = (this.innerHTML);

            var valHora= document.getElementById('valorhora');
           $(valHora).val(hora);
            //alert(valHora.value);

            var dia = document.getElementById('idValDia').innerHTML;

            var valDia= document.querySelector('#valordata');
           $(valDia).val(String(dia));
            //alert(valDia.value);
            /*

            var hora = (this.innerHTML);

            document.getElementById('valorhora').innerHTML = hora;
            //alert(hora);

            var dia = document.getElementById('idValDia').innerHTML;
            document.getElementById('valordata').innerHTML=dia;
            //alert(dia);*/

        });  
    });



    $(document).ready(function () {
        //$("#dataage").hide();
        //$("#btnagendar").hide();
        //$("#displaydias").hide();
        var td = document.querySelector('div.app_datas');
/*
        $("#proximo").click(function () {
            var cpf_element = document.getElementById('idcpf');
            var nome_element = document.getElementById('idnome');
            var valorcidade = document.getElementById('idcidade').value;

            var outrovalor = parseInt(valorcidade);
                    //alert(outrovalor);
                    $.ajax({
                        type: "POST",
                        url: "view/agendar.php",
                        data: {codcid: outrovalor},
                        complete: function(data){
                            //alert(data);
                        }
                    });

                    

                    var novoresult= "<?php //echo $resultado ?>";
                     //alert(novoresult);



                     var vetor = novoresult.split(';');
                     alert(vetor.length);
                     for(var i =0; i< vetor.length-1; i++){
                       //while(count<6 ){

                         //alert("Aqui");
                         var novodiv = document.createElement('div');
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
                         console.log(td)
                       //}
                   }


                   $("#dataage").show();
                   
               });*/

               $('.datas').click(function () {
                $(".datas").css("background", "green");
                $(this).css("background", "red");
                    //$('.datas').hide();
                    //$(this).show();
                    $("#displaydias").show();

                    //var datas = parseFloat(this.innerHTML);
                    //document.getElementById('valordata').innerHTML = datas;
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
           });


       </script>

       <?php
            //include 'view/rodape.php';
       ?>

       <script type="text/javascript" src="../js/mdb.js"></script> 
       <script type="text/javascript" src="../js/animation.js"></script>
       <script type="text/javascript" src="../js/cpf.js"></script>

   </body>
   </html>