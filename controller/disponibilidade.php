<?php
include_once('../controller/conexao_pdo.php');

//if(isset($_POST['cpf'])){

$cpf = ($_POST['cpf']);
$nome = ($_POST['nome']);
	$cidade = 1;//isset($_POST['cidade']);
	

	$dat= $_POST['data'];
    echo 'data antes:'.$_POST['data'];
	//$data_d = new DateTime("Y-m-d");
    $data = date("Y-m-d", strtotime($dat));
	//$data = $data_d->format('Y-m-d H:i:s');
    //echo "data: $data";


	//$hora = date('H:i:s',$hora_d);
	$hora_old = $_POST['hora'];//'23-5-2016 23:15:23';
    echo "hora antes: $hora_old";
	//$hora_d = new DateTime($hora_old);//isset($_POST['hora']);
    $hora = date("Y-m-d H:i:s", strtotime($hora_old));

    $email = $_POST['email'];

    //echo "hora: $hora";

    try{

      $sql = "insert into cadastro_agendar(cpf,nome,codcidade,dia,hora,status)
      values('$cpf','$nome','$cidade','$data','$hora',0)";
        //$count = $conexao->exec($sql);
      if ($conexao->exec($sql)) {
            //session_start();
        echo '<script> window.location="../controller/pagina_sucesso_agendamento.php"</script>';
            //echo "registro foi incluido com sucesso!";
            //echo '<script> window.location="../view/listar_agendamento.php"; </script>';
    } else {
        echo "Erro ao inserir novo dados!";
            //echo '<script> window.location="../view/listar_agendamento.php"; </script>';
    }
} catch (PDOException $ex) {
    echo 'Erro na inserçao ..' . $ex->getMessage();
        //header('location: erros/pagina_erro_cadastro.php');
    exit();
}


//}
//echo "Fora";


date_default_timezone_set('Etc/UTC');
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once '../PHPMailer/src/Exception.php';
use \PHPMailer\PHPMailer\SMTP;
//use PHPMailer\src\Exception;

//require 'vendor/autoload.php';

//$mail = new PHPMailer();
$mail = new \PHPMailer\PHPMailer\PHPMailer();
if (!empty($_POST)) {
    include '../controller/conexao_pdo.php';

    //$cpf = $_POST['cpf'];
    //$user = $_POST['email'];
    //$data_inc = $_POST['data_nascimento'];
    //$data = date("Y-m-d", strtotime(str_replace('/', '-', $data_inc)));
/**
    $sql = "select cpf, email, data_nascimento from cadastro_socio where cpf=$cpf and email='$user' and data_nascimento ='$data'";
    $stmt = $conexao->prepare($sql);

    $stmt->execute();
    if ($stmt->rowcount() > 0) {

        $chave = sha1(uniqid(mt_rand(), true));

        // guardar este par de valores na tabela para confirmar mais tarde
        $conf = $conexao->prepare("INSERT INTO recuperacao VALUES ('$user', '$chave')");
        //echo "INSERT INTO recuperacao VALUES ('$user', '$chave')";
        $conf->execute();

        if ($conf->rowcount() == 1) {


            $link = "https://www.aegbec.org/login/recuperar.php?utilizador=$user&confirmacao=$chave";
            echo "link--> $link";
*/
            $mensagem = " <section id=\"clients\" class=\"section-bg\">

            <div class=\"container\">
            <h3>ASSOCIAÇÃO DOS ESTUDANTE DA GUINE-BISSAU NO ESTADO DO CEARÁ</h3>
            <h3>Embaixada da Guine-Bissau</h3>
            <div class=\"section-header\">

            <h3>Agendamento</h3>
            <p>Presado ".$nome.", você acabou de fazer agendamento para serviço junto ao embaixada da Guine-Bissau.<br>
            Estamos enviando Esta mensagem como confirmação do seu agendamento com seus dados:.<br>Caso não seja você, favor desconsidere!.</p>
            <hr>
            <p>CPF:  ".$cpf."</p>

            <p>Data de atendimento: ".$data."</p>
            <p>Hora de atendimento: ".$hora."</p>
            </div>

            <div class=\"row no-gutters clients-wrap clearfix wow fadeInUp\">

            <div class=\"col-lg-12 col-md-8 col-xs-6\">
            <div class=\"client-logo\">
            
            </div>
            </div>



            </div>

            </div>

            </section>";
            try {
                //$link = "localhost/AEGBEC/login/recuperar.php?utilizador=$user&confirmacao=$chave";
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Debugoutput = 'html';
                $mail->CharSet = 'utf-8';
                $mail->Host = 'tls://smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                $mail->Username = 'ildoramosvieira@alu.ufc.br';                     // SMTP username
                $mail->Password = 'ramos10@';                               // SMTP password
                $mail->SMTPSecure = 'tsl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                //Recipients
                $mail->setFrom('ildoramosvieira@alu.ufc.br', 'Associação dos Estudantes no Estado do Ceará');
                $mail->addAddress($email, $cpf);     // Add a recipient
                //$mail->addAddress($user);               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Recuperação da Senha';
                $mail->Body = $mensagem;
                $mail->AltBody = $mensagem;
                //$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
                //$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";
                $mail->send();
                   // $_SESSION["success"] = "Mensagem enviada com sucesso";
                //echo '<script> window.location=" ../login/pagina_sucesso_solicit_reset.php"; </script>';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
            
        
} else {
    // mostrar formulário de recuperação
    echo '<script> window.location="../view/tela_recupera_senha.php"; </script>';
}

?>