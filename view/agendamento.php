<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AGENDAMENTO</title>
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

        #agenda .calendario .semana .dias{
            color: #d3d3d3;
            text-transform: uppercase;
            text-align: center;
            font-size: .75rem;
            margin-bottom: .2rem;
        }

        .calendario .sec_horas {
            width: 100%;
        }
        .row .row{
            margin-right: .625rem;
            margin-left: .625rem;
        }

        .row{
            max-width: 75.5rem;
            margin-left: auto;
            margin-right: auto;
        }

        .column{
            padding: .35rem .3rem;
            width: 50px;
            height: 50px;
        }
        .semana{
            padding: 10px;
        }

        .au-target{
           width: 45px;
           height: 45px;
       }

       .small-up-7>.column,{
        float: left;
        width: 14.28571%;
    }

    .getdia{
        width: 100%;
        height: 100%;
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
                        <div align="center">
                            <h3>Embaixada da Guiné-Bissau</h3>
                            <p>Sistema de agendamento para emissão de passaportes, Registro criminal e Cartão Consular</p>

                            <div class="small-6 text-center columns">
                                <form action="view/agendar.php" method="POST">
                                    <div class="col-md-4 mb-3 form-controle">

                                        <label>Cidade</label>
                                        <select class="form-control" name="codcid" id="idcidade" onchange="javascript:mostraBotao(this);">
                                            <option value="" disabled selected>Seleciona uma cidade</option>
                                            <option value="2">Fortaleza</option>
                                            <option value="1" disabled selected>São Paulo</option>
                                        </select>
                                        <script>
                                            $(document).ready(function () {
                                                $('select').material_select();});
                                            </script>

                                        </div>
                                        <div class="col-md-4 form-controle" id="button1">
                                            <input type="submit" value="Agendar" >
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>

            </div>
            <!-- codigo php-->

            <script  type="text/javascript"> 
                $(document).ready(function () {
                 $('#button1').hide();
             });

                function mostraBotao() {
                    $("#button1").show();
                };

            </script>

            <script type="text/javascript" src="js/mdb.js"></script> 
            <script type="text/javascript" src="js/animation.js"></script>
            <script type="text/javascript" src="js/cpf.js"></script>
        </div>
    </body>
    </html>