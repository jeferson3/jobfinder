<?php

namespace App\Tests;

use App\Config\Conexao;
use App\Dao\UsuarioDaoMysql;
use App\VO\Usuario;

class UsuarioDaoCenario
{
    public function cadastrar(Usuario $usuario)
    {
        $usuarioDaoMysql = new UsuarioDaoMysql(Conexao::getInstance());

        return $usuarioDaoMysql->salvar($usuario);
    }
}