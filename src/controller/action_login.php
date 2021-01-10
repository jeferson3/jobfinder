<?php 
use App\Config\Conexao; //Importa o PDO
use App\Dao\UsuarioDaoMysql; //Importa UsuarioDaoMysql para o CRUD

$pdo = Conexao::getInstance();

$usuarioDaoMysql = new UsuarioDaoMysql($pdo);

$email = filter_input(INPUT_POST,'email');
$senha = md5(filter_input(INPUT_POST,'senha'));
$lembrar = isset($_POST['lembrar']) ? $_POST['lembrar'] : null; //valor on gerado quando marca-se o checkbox lembrar de mim na página de login

//O método a seguir realiza a autenticação do usuário no sistema verificando se os dados do e-mail e a senha coincidem no banco de dados.
function autenticarUsuario($email, $senha, $usuarioDaoMysql, $lembrar) {
    $usuarioBuscado = $usuarioDaoMysql->buscarPeloEmail($email);
    session_start();
    if($usuarioBuscado != false){

        if($usuarioBuscado->getSenha() == $senha){

            //Caso o checkbox lembrar de mim na página de login tenha sido marcado, um cookie com o id do usuário será salvo...OBS: Falta implementar o cookie.

            //$usuarioBuscado->setSenha(""); //apaga a senha pra poder gravar na sessão;
            
            $_SESSION['auth']=serialize($usuarioBuscado);
            header('Location:http://'.$_SERVER['HTTP_HOST'].'/jobfinder/profile');
            exit;

        } else {

            $_SESSION['message'] = (Object) [
                'type'=>'error',
                'message' => 'E-mail e/ou senha incorretos!'
            ];

            header('Location:http://'.$_SERVER['HTTP_HOST'].'/jobfinder/login');
            exit;
        }

    } else {
        $_SESSION['message'] = (Object) [
            'type'=>'error',
            'message' => 'E-mail não cadastrado!'
        ];
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/jobfinder/login');
        exit;
    }
}

autenticarUsuario($email, $senha, $usuarioDaoMysql, $lembrar);