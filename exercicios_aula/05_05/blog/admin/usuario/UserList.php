<?php
include "../header.php";
include_once '../database/db.class.php';

$db = new db('usuario');

if  (!empty($_POST)) {
    //var_dump($_POST);
    //exit; //método de saída para ver os dados so objeto
    //$db->store($_POST);
    /*$conn = new db('usuario');
    $conn->store($_POST);
    echo "Dados inseridos com sucesso!";*/
}else{
    $dados = $db->getAll(); //chama o método getAll para pegar os dados do banco
}
?>

<div class="row">
    <div class="row">
        <div class="col">
            <a href="Userformulario.php" class="btn btn-success">Novo Usuário</a>
        </div>
    </div>
</div>

<div class="row">
    <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($dados as $item){
        echo "<tr>";
        echo "<th scope='row'>{$item['id']}</th>";
        echo "<td>{$item['nome']}</td>";
        echo "<td>{$item['telefone']}</td>";
        echo "<td>{$item['email']}</td>";
        echo "</tr>";
    }
    <tr>
      <th scope="row">3</th>
      <td>John</td>
      <td>Doe</td>
      <td>@social</td>
    </tr>
  </tbody>
</table>
</div>