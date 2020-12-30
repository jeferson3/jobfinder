<?php
require $_SERVER['DOCUMENT_ROOT'].'/jobfinder/config/config.php'; //Importa o PDO
require $_SERVER['DOCUMENT_ROOT'].'/jobfinder/dao/UsuarioDaoMysql.php'; //Importa UsuarioDaoMysql para o CRUD
session_start();

$usuarioDaoMysql = new UsuarioDaoMysql($pdo);
$formatosImagemPermitidos = ['image/jpeg', 'image/jpg', 'image/png'];

//O método validarImagem verifica se $_FILES recebeu um arquivo e verifica se este arquivo é compatível com os tipos de imagem jpeg, jpg e png
function validarImagem($formatosImagemPermitidos){
    if($_FILES['foto_perfil']['tmp_name'] != null && in_array($_FILES['foto_perfil']['type'], $formatosImagemPermitidos)){
        return true;
    } else {
        return false;
    }
}

function salvarFotoPerfil($usuarioDaoMysql, $formatosImagemPermitidos){
    $fotoPerfil = null;
    $fotoUtilizada = null;
    
    //Após validar a imagem, o nome da variável $fotoPerfil recebe um nome do arquivo com um hash para ser salva no diretório files e não apresentar repetição de nomes.
    if(validarImagem($formatosImagemPermitidos) == true) {
        if($_FILES['foto_perfil']['type'] == 'image/jpg') {
            $fotoPerfil = md5(time().rand(0, 1000)).'.jpg';
        } elseif($_FILES['foto_perfil']['type'] == 'image/jpeg') {
            $fotoPerfil = md5(time().rand(0, 1000)).'.jpeg';
        } else {
            $fotoPerfil = md5(time().rand(0, 1000)).'.png';
        }

        $usuario = unserialize($_SESSION['auth']); //recupera o usuário salvo na sessão e retira a serialização

        //Para que não exista arquivos de imagem sem utilização no servidor, é checado se o usuário já tem uma foto que não é default. Se isso ocorrer a nova foto será salva e a antiga será apagada.
        if($usuario->getFotoPerfil() != "default-user-img.jpg") {
            $fotoAntiga = $usuario->getFotoPerfil();   
        }

        $usuario->setFotoPerfil($fotoPerfil);
        $usuarioDaoMysql->atualizar($usuario);

        //move_uploaded_file move o arquivo que foi feito upload pelo formulário e salva no diretório files
        move_uploaded_file($_FILES['foto_perfil']['tmp_name'],'../files/'.$fotoPerfil);
        $_SESSION['auth'] = serialize($usuario); //Para que a foto seja atualizada na página é necessário renovar a sessão com a atualização da foto

        unlink($_SERVER['DOCUMENT_ROOT'].'/jobfinder/files/'.$fotoAntiga);
        
    }
    header('Location:http://'.$_SERVER['HTTP_HOST'].'/jobfinder/profile');
    exit;
}

salvarFotoPerfil($usuarioDaoMysql, $formatosImagemPermitidos);
?>