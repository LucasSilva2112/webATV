<?php
include 'db.php';
include 'Aluno.php';

$alunoObj = new Aluno($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $alunoObj->excluir($id);
    header('Location: listar_alunos.php');
    exit; 
} else {
    echo "ID do aluno não fornecido.";
}
?>