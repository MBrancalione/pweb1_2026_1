<?php
include "../header.php";
include_once '../database/db.class.php';

$db = new db('usuario');

if  (!empty($_POST)) {
    $db->store($_POST);
    /*$conn = new db('usuario');
    $conn->store($_POST);
    echo "Dados inseridos com sucesso!";*/
}
?>

<form action="formulario.php" method="post">
    <h3>Formulário do Usuário</h3>
    <div class="col-6">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome">
    </div>
    <div class="col-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="col-6">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="tel" class="form-control" id="telefone" name="telefone">
    </div>
        <div class="mt-2">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
<?php
include "../footer.php";
?>