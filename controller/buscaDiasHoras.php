
<?php
include_once('controller/conexao_pdo.php');
function buscarDia($cidade){
    $sql = "SELECT distinct dia FROM horarios WHERE codcidade =$cidade";
    $resultado="";s
    echo $sql;
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
    echo 'res:'.$resultado;
}

function buscarHoras($dia){
    $sql = "SELECT distinct gura FROM horarios WHERE dia =$dia";
    $resultado="";
    echo $sql;
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
    echo 'res:'.$resultado;
}         
?>
