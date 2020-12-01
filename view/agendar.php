<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
       <!-- <script type="text/javascript" src="js/bootstrap.js"></script>-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/mdb.css">
        <link rel="stylesheet" type="text/css" href="utils/estilos.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>

        <link href="css/style_1.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

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
        </style>
         
    </head>
    <body>
        <div class="wrapper">
            
            <div id="content">
                
               
            <section id="clients" class="section-bg">

                <div class="container">

                    <div class="section-header">
                        <div align="center">
                            <img src="img/logo_aegbce.jpg"  align="center" class="rounded-circle" alt="Associação dos Estudantes Guineense dos Estado de Ceará" width="166" height="166" >
                        </div>
                        <h3>Embaixada da Guiné-Bissau</h3>
                        <p>Sistema de agendamento para emissão de passaportes, Registro criminal e Cartão Consular</p>
                    </div>

                <form action="../controller/servidor.php" method="POST">
                    <div>
                        <div class=" wow fadeInUp diaas">
                                <div class="form-group">
                                    <div class="col-md-4">
                                       <label for="idcpf">CPF:</label>
                                       <input class="form-control" id="idcpf" type="text" name="cpf_cad" required autocomplete="off" maxlength="11" onblur="return verificarCPF(this.value)">
                                    </div>
                                    <div class=" col-md-4">
                                       <label for="idnome">Nome Completo:</label>
                                       <input class="form-control" id="idnome" type="text" name="nome_cad" required autocomplete="off" maxlength="100">
                                   </div>
                                    <div class=" col-md-4">
                                       <label for="idemail">E-mail:</label>
                                       <input class="form-control" id="idemail" type="email" name="nome_cad" required autocomplete="off">
                                   </div>
                                    <div class="col-md-4 mb-3 form-group">
                                        <div class="">
                                            <label>Cidade</label>
                                            <select class="form-control" name="cidade" id="idcidade">
                                                <option value="" disabled selected>Seleciona uma opção</option>
                                           <option value="2">Fortaleza</option>
                                            <option value="1">São Paulo</option>
                                         </select>
                                        </div>
                                        <script>
                                           $(document).ready(function () {
                                            $('select').material_select();});
                                        </script>
                                    </div>
                                    <div class="form-group col-md-4">
                                       <input class="form-control" type="button" id="proximo" value="Proximo >">
                                    </div>
                                </div>
                            
                        </div>

                        <div class="clearfix wow fadeInUp diaas" id="dataage" >

                                <div class="  diass">
                                    
                                    <h3>Escolher dia de agendamento disponivel</h3>
                                    <div class="app_datas">
                                        
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

                                    <!--<tr>
                                        <th > <span class="horar">09:00</span></th>
                                        <th > <span class="horar">09:30</span></th>
                                        <th > <span class="horar">10:00</span></th>
                                        <th > <span class="horar">10:30</span></th>
                                        <th > <span class="horar">11:00</span></th>
                                        <th > <span class="horar">11:30</span></th>
                                    </tr>
                                    <tr>
                                        <th > <span class="horar">13:00</span></th>
                                        <th > <span class="horar">13:30</span></th>
                                        <th > <span class="horar">14:00</span></th>
                                        <th > <span class="horar">14:30</span></th>
                                        <th > <span class="horar">15:00</span></th>
                                        <th > <span class="horar">15:30</span></th>
                                    </tr>-->
                                    </tbody>
                                    </table>
                                </div>
                    </div>

                    <input type="date" name="hora" hidden="true" id="valorhora">

                    <div class="row  wow fadeOut diaas" id="btnagendar" >
                        <button type="submit">Agendar</button>
                    </div>

                </form>

                </div>

            </section>

            </div>
        </div>

        <script defer type="text/javascript">
            $(document).ready(function () {
                $("#dataage").hide();
                $("#btnagendar").hide();
                 $("#displaydias").hide();
                 var td = document.querySelector('div.app_datas');

                $("#proximo").click(function () {
                    var cpf_element = document.getElementById('idcpf');
                    var nome_element = document.getElementById('idnome');
                    var valorcidade = document.getElementById('idcidade').value;
                    
                    var outrovalor = parseInt(valorcidade);
                    //alert(outrovalor);
                    //$.post("agendar.php", {valor:outrovalor}).done(data => {
                    alert(valorcidade);
                    //});

                    
                    <?php

                       $cidade ="<script>document.write(outrovalor)</script>";
                       //$cid =0;
                       if($cidade=='1'){
                            $cid=1;
                            //echo $cid;
                       }if($cidade==='2'){
                            $cid=2;
                            //echo $cid;
                        }

                       
                        //var_dump($cid);
                       //echo 'codcidade=='.$cid;
                        include_once('controller/conexao_pdo.php');

                        $sql = "SELECT distinct dia FROM horarios WHERE codcidade =1";
                        
                        $resultado="";
                        try{
                            $stmt = $conexao->prepare($sql);
                            //$stmt->bindParam(1,$cid, PDO::PARAM_INT);
                            
                            if ($stmt->execute()) {
                                
                                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                    $resultado .=$rs->dia.';';
                                }
                                
                            } else {
                                echo "Erro: Não foi possível recuperar os dados do banco de dados";
                            }

                        } catch (PDOException $erro) {
                            echo "Erro: " . $erro->getMessage();
                        }
                        //echo 'res:'.$resultado;
                    ?>

                    var novoresult= "<?php echo $resultado ?>";
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
                   
                });

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
            });

           
        </script>

        <?php
            //include 'view/rodape.php';
        ?>

        <script type="text/javascript" src="js/mdb.js"></script> 
        <script type="text/javascript" src="js/animation.js"></script>
        <script type="text/javascript" src="js/cpf.js"></script>
       
    </body>
</html>
