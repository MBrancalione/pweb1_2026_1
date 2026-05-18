<?php
include "../header.php";
include_once '../database/db.class.php';

$db = new db('usuario');
$success = "";
$error = "";
if  (!empty($_POST)) {
    //var_dump($_POST);
    //exit; //método de saída para ver os dados so objeto
    try {
        $db->store($_POST);
        $success = "Dados inseridos com sucesso!";
        redirect('UserList.php');

    } catch (PDOException $e) {
        $error = "Erro ao inserir dados: " . $e->getMessage();
    }
    /*$conn = new db('usuario');
    $conn->store($_POST);
    echo "Dados inseridos com sucesso!";*/
}
?>

<div class="row">
    <?php actionMessage($success, $error); ?>



<form action="Userformulario.php" method="post">
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
        <button type="submit" class="btn btn-success">Enviar</button>
            <div class="row">
        <div class="col">
            <a href="UserList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    </div>
</form>
</div>
<?php
include "../footer.php";
?>