<?php
/*error_reporting(0);
if(!isset($_SESSION)){
    session_start();
}
    include_once ('../login/verifica_login.php');*/
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>AGENDAMENTO</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
       <!-- <script type="text/javascript" src="js/bootstrap.js"></script>-->
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href=".//css/mdb.css">
        <link rel="stylesheet" type="text/css" href="../utils/estilos.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>

        <link href="../css/style_1.css" rel="stylesheet">
        <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">

        <script src="../js/executar_agenda.js"></script>
    </head>
    <body class="fadeIn">
         <div class="wrapper">            
             <div id="content">
            <section class="text-left section-bg my-4" id="clients">
            <div class="">
                <div style="text-align: center;">
                 <a href="../view/agendar.php">Voltar</a>
                <div class="my-4" style="align-items: center">
               
                </div>
                <div align="center">
                    <img src="../img/logo_aegbce.jpg"  align="center" class="rounded-circle" alt="Associação dos Estudantes Guineense dos Estado de Ceará" width="166" height="166" >
                </div>

                <hr>
                <h3 style="text-align:center">LISTA DE AGENDAMENTO</h3>
                <table class="table table-secondary table-border table-striped" border="1" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Protocolo</th>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>data</th>
                            <th>hora</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                               
                        include '../controller/conexao_pdo.php';
                        if (!(isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $_REQUEST['id'] != "")) {
                            try {
                                $stmt = $conexao->prepare("SELECT * FROM cadastro_agendar ");
                                
                                if ($stmt->execute()) {
                                    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                        echo "<tr>";
                                        echo "<td>" . $rs->codagenda . "</td><td>" .$rs->cpf. "</td><td>" .$rs->nome. "</td><td>".$rs->dia. "</td><td>" . $rs->hora . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "Erro: Não foi possível recuperar os dados do banco de dados";
                                }
                            } catch (PDOException $erro) {
                                echo "Erro: " . $erro->getMessage();
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </section>
             </div>
         </div>
        <?php
          //include ('rodape.php');
        ?>

    </body>
</html>
