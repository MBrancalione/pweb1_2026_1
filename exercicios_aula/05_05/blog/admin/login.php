<?php
include './header.php';
include_once "./database/db.class.php";

$db = new db('usuario');
$success = '';
$actionError = '';
$errors = [];
$data = '';

if (!empty($_POST)) {

    $data = (object) $_POST; //converte o array associativo do post para um objeto para facilitar o acesso aos campos
    // var_dump($_POST);
    //exit;
    try {
        if (empty($_POST['email'])) {
            $errors[] = "<li>O email é obrigatório</li>";
        }

        if (empty($_POST['senha'])) {
            $errors[] = "<li>A senha é obrigatória</li>";
            if(strlen($_POST['senha']) < 6) {
                $errors[] = "<li>A senha deve conter no mínimo 6 caracteres</li>";
            }
        }

        if (empty($errors)) {
            
            $usuario = $db->findBy('email', $_POST['email']);

            if($usuario && password_verify($_POST['senha'], $usuario->senha)){
                $_SESSION['usuario_id'] = $usuario->id; //armazena o id do usuário na sessão para identificar o usuário logado
                $_SESSION['usuario_nome'] = $usuario->nome; //armazena o nome do usuário na sessão para exibir o nome do usuário logado
                $_sESSION['usuario_email'] = $usuario->email; //armazena o email do usuário na sessão para exibir o email do usuário logado
                $success = "Registro Salvo com sucesso!";
                redirect('./index.php');
            }
        }
    } catch (PDOException $e) {
        $actionError = $e->getMessage();
    } catch (Exception $e) {
        $actionError = $e->getMessage();
    }
}

?>

<div class="row">
    <?php actionMessage($success, $actionError) ?>
    <?php showValidationError($errors) ?>

    <form action="./login.php" method="post">
        <h3>Login Usuário</h3>
        <input type="hidden" name="id" value="<?php echo isset($data->id) ? $data->id : ''; ?>"> 
        <div class="col-6">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo getFormValue($data, 'email'); ?>">
        </div>
        <div class="col-6">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" value="<?php echo getFormValue($data, 'senha'); ?>">
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-success">Entrar</button>
            <a href="./registrar.php" class="btn btn-primary"> Não tem conta? Cadastre-se aqui!</a>
        </div>
    </form>

</div>

<?php
include './footer.php';
?>