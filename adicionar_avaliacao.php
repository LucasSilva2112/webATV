<?php
include 'db.php';

$alunos = $pdo->query("SELECT * FROM alunos")->fetchAll(PDO::FETCH_ASSOC);
$disciplinas = $pdo->query("SELECT * FROM disciplinas")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aluno_id = $_POST['aluno_id'];
    $disciplina_id = $_POST['disciplina_id'];
    $nota = $_POST['nota'];
    $data_avaliacao = $_POST['data_avaliacao'];

    $stmt = $pdo->prepare("INSERT INTO avaliacoes (aluno_id, disciplina_id, nota, data_avaliacao) VALUES (:aluno_id, :disciplina_id, :nota, :data_avaliacao)");
    $stmt->execute(['aluno_id' => $aluno_id, 'disciplina_id' => $disciplina_id, 'nota' => $nota, 'data_avaliacao' => $data_avaliacao]);

    header('Location: listar_avaliacoes.php');
    exit; 
}
?>

<h2>Adicionar Avaliação</h2>
<form method="POST" action="">
    <label>Aluno:</label>
    <select name="aluno_id" required>
        <?php foreach ($alunos as $aluno) : ?>
            <option value="<?php echo $aluno['id']; ?>"><?php echo $aluno['nome']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <label>Disciplina:</label>
    <select name="disciplina_id" required>
        <?php foreach ($disciplinas as $disciplina) : ?>
            <option value="<?php echo $disciplina['id']; ?>"><?php echo $disciplina['nome']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <label>Nota:</label>
    <input type="number" name="nota" step="0.01" required>
    <br>

    <label>Data da Avaliação:</label>
    <input type="date" name="data_avaliacao" required>
    <br>

    <input type="submit" value="Salvar">
</form>