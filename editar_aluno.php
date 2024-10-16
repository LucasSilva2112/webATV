<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = :id");
$stmt->execute(['id' => $id]);
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE alunos SET nome = :nome, email = :email WHERE id = :id");
    $stmt->execute(['nome' => $nome, 'email' => $email, 'id' => $id]);

    header('Location: listar_alunos.php');
    exit; 
}
?>

<h2>Editar Aluno</h2>
<form method="POST" action="">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $aluno['email']; ?>" required>
    <br>
    <input type="submit" value="Salvar">
</form>