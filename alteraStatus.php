<?php
include 'model/Conexao.php';
    $id=$_GET['id'];
    $statusAtual=$_GET['status'];

    switch($statusAtual){
        case "Ativa":
            $stmt=$pdo->prepare("UPDATE oportunidade SET status=1 WHERE id={$id}");
    $stmt->execute();
    header('location:manutencaoVagas.php');
    break;
    case "Inativa":
        $stmt=$pdo->prepare("UPDATE oportunidade SET status=0 WHERE id={$id}");
    $stmt->execute();
    header('location:manutencaoVagas.php');
    }
    
    


?>