<?php
use App\Config\Conexao;//import do pdo
use App\Dao\ServicoDaoMysql; //import da classe ServicoDaoMysql para salvar a atualização do serviço

$pdo = Conexao::getInstance();

$servicoDao = new ServicoDaoMysql($pdo);

function atualizarServico($servicoDao) {
    $servicoId = intval(filter_input(INPUT_POST, 'servico_id'));
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $enderecoServico = filter_input(INPUT_POST, 'endereco_servico', FILTER_SANITIZE_STRING);
    $valor = floatval(filter_input(INPUT_POST, 'valor'));

    //Recuperando todos os dados do serviço buscado pelo id porque no formulário não encaminhou o usuario_id e o id do serviço.
    $servicoAtualizado = $servicoDao->buscarPeloId($servicoId);
    
    //Setando os campos atualizados que vieram do formulário
    $servicoAtualizado->setTitulo($titulo);
    $servicoAtualizado->setDescricao($descricao);
    $servicoAtualizado->setEnderecoServico($enderecoServico);
    $servicoAtualizado->setValor($valor);

    $_SESSION['message'] = (Object) [
        'type'=>'info',
        'message' => 'Serviço editado com sucesso!'
    ];

    $servicoDao->atualizar($servicoAtualizado);
    header('Location:http://'.$_SERVER['HTTP_HOST'].'/jobfinder/profile');
}

atualizarServico($servicoDao);