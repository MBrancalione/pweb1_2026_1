<?php
include '../header.php';
include '../autenticacao.php';
include_once "../database/db.class.php";

$db = new db('usuario');

if (!empty($_GET['id'])) {
    $db->destroi($_GET['id']);
    $dados = $db->all(); //  estava assim  $dados = $db->search($_POST);, só que o método search espera um array com os campos para buscar, e o método all retorna todos os registros, então para exibir a lista atualizada após a exclusão, é necessário chamar o método all novamente para pegar todos os registros atualizados.
}else{
  $dados = $db->all();
} 
?>

<div class="row">

  <h3>Listagem de Usuário</h3>
    <form action="./UserFormulario.php" method="post">
      <div class="row">
        <div class="col-6">
            <label for="nome">Tipo</label>
            <select name="tipo" class="form-selection">
                <option value="nome">Nome</option>
                <option value="email">Email</option>
                <option value="telefone">Telefone</option>
            </select>
        </div>
        <div class="col-6">
            <label for="email">Valor</label>
            <input type="text" name="valor" placeholder="Valor da busca" class="form-control" value="<?php echo getFormValue('valor'); ?>">
        </div>
        <div class="col">
          <button type="submit"  class="btn btn-primary">Buscar</button>
          <a href="./UserFormulario.php" class="btn btn-success"> Novo</a>
        </div>
      </div>
    </form>
</div>


<div class="row">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dados as $item) {
                echo "<tr>
                <th scope='row'>$item->id</th>
                <td>$item->nome</td>
                <td>$item->telefone</td>
                <td>$item->email</td>
                <td><a 
                    class='btn btn-warning' title='Editar'
                    href='./UserFormulario.php?id=$item->id'>Editar</a></td>   
                <td><a 
                    class='btn btn-danger' title='Deletar'
                    onclick='return confirm(\"Tem certeza que deseja deletar este usuário?\")'
                    href='./UserList.php?id=$item->id'>Deletar</a></td>   
            </tr>";
            }
            ?>
        </tbody>
    </table>
</div>



<?php
include '../footer.php';
?>  