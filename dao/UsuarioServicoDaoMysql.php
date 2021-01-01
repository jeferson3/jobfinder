<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/jobfinder/vo/UsuarioServico.php';

class UsuarioServicoDaoMysql implements UsuarioServicoDao {
    /**
     * O PDO vai ser passado por parâmetro no arquivo que
     * precisar instanciar essa classe Usuario_servicosDaoMysql.
     */
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    /**
     * Os métodos concretos a seguir são obrigatórios para esta classe
     * funcionar e foram implementados da interface Usuario_servicosDao
     * que está no arquivo Usuario_servicos.php da pasta vo.
     **/

    public function salvar(UsuarioServico $usuarioServico){
        //É melhor quebrar a query de inserção de dados, por questão de segurança. Onde tem :data_finalizacao_servico, :servico_id...serão as máscaras para inserir os valores pelo bindValue
        $sql = $this->pdo->prepare("INSERT INTO usuario_servico (data_finalizacao_servico, metodo_pagamento, valor_final, servico_id, contratante_id, contratado_id) VALUES (:data_finalizacao_servico, :metodo_pagamento, :valor_final, :servico_id, :contratante_id, :contratado_id)");
        $sql->bindValue(":data_finalizacao_servico", $usuarioServico->getDataFinalizacaoServico());
        $sql->bindValue(":metodo_pagamento", $usuarioServico->getMetodoPagamento());
        $sql->bindValue(":valor_final", $usuarioServico->getValorFinal());
        $sql->bindValue(":servico_id", $usuarioServico->getServicoId());
        $sql->bindValue(":contratante_id", $usuarioServico->getContratanteId());
        $sql->bindValue(":contratado_id", $usuarioServico->getContratadoId());
        $sql->execute();

        $usuarioServico->setId($this->pdo->lastInsertId());
        return $usuarioServico;
    }

    public function buscarTodos(){
        $arrayUsuarioServico = [];

        $sql = $this->pdo->query("SELECT * FROM usuario_servico");
        if($sql->rowCount() > 0){
            $arrayDadosUsuarioServico = $sql->fetchAll(); //Pega todos os dados dos usuário_serviços encontrados e joga no arrayDados

            foreach($arrayDadosUsuarioServico as $dadoUsuarioServico){
                /**
                 * Deve-se construir objetos do tipo UsuarioServico e preenchê-los com os dados
                 * advindos do banco com a consulta para adicionar ao arrayUsuarioServico e retornar
                 * **/
                $usuarioServico = new UsuarioServico();
                $usuarioServico->setId($dadoUsuarioServico['id']);
                $usuarioServico->setData_finalizacao_servico($dadoUsuarioServico['data_finalizacao_servico']);
                $usuarioServico->setMetodo_pagamento($dadoUsuarioServico['metodo_pagamento']);
                $usuarioServico->setServico_id($dadoUsuarioServico['servico_id']);
                $usuarioServico->setContratante_id($dadoUsuarioServico['contratante_id']);
                $usuarioServico->setContratado_id($dadoUsuarioServico['contratado_id']);

                $arrayUsuarioServico[] = $usuarioServico; //Adiciona o usuário_serviço construído e preenchido no arrayUsuario_serviços que ao final da iteração será devolvido para quem chamou o método.
            }
        }
        return $arrayUsuarioServico;
    }

    public function buscarPeloId($id){
        $sql = $this->pdo->prepare("SELECT * FROM usuario_servico WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $dadoUsuarioServico = $sql->fetch(); //Pega os dados de um usuário_serviço que foi encontrado com o id passado por parâmetro e atribui à variável dadosUsuarioServico

            /**
             * Faz o processo de construção de um objeto usuarioServico com os dados encontrados passando o id por parâmetro
             */
            $usuarioServico = new UsuarioServico();
            $usuarioServico->setId($dadoUsuarioServico['id']);
            $usuarioServico->setData_finalizacao_servico($dadoUsuarioServico['data_finalizacao_servico']);
            $usuarioServico->setMetodo_pagamento($dadoUsuarioServico['metodo_pagamento']);
            $usuarioServico->setServico_id($dadoUsuarioServico['servico_id']);
            $usuarioServico->setContratante_id($dadoUsuarioServico['contratante_id']);
            $usuarioServico->setContratado_id($dadoUsuarioServico['contratado_id']);

            return $usuarioServico;
        } else {
            return false;
        }

    }

    public function buscarPeloContratante_id($contratante_id){
        $sql = $this->pdo->prepare("SELECT * FROM usuario_servico WHERE contratante_id = :contratante_id");
        $sql->bindValue(":contratante_id", $contratante_id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $dadoUsuarioServico = $sql->fetch(); //Pega os dados de um usuário_serviço que foi encontrado com o contratante_id passado por parâmetro e atribui à variável dadosUsuarioServico

            /**
                 * Deve-se construir um objeto do tipo UsuarioServico e preenchê-lo com os dados
                 * advindos do banco com a consulta para retornar à aplicação que chamou a busca por contratante_id
            * **/
            $usuarioServico = new UsuarioServico();

            $usuarioServico->setId($dadoUsuarioServico['id']);
            $usuarioServico->setData_finalizacao_servico($dadoUsuarioServico['data_finalizacao_servico']);
            $usuarioServico->setMetodo_pagamento($dadoUsuarioServico['metodo_pagamento']);
            $usuarioServico->setServico_id($dadoUsuarioServico['servico_id']);
            $usuarioServico->setContratante_id($dadoUsuarioServico['contratante_id']);
            $usuarioServico->setContratado_id($dadoUsuarioServico['contratado_id']);

            return $usuarioServico;

        } else {    //Se não encontrar nenhum usuário_serviço com o contratante_id fornecido, retorna falso
            return false;
        }

    }

    public function atualizar(UsuarioServico $usuarioServico){
        /**
         * Todos os dados do usuário_serviço para serem atualizados no banco de dados
         * estão no parâmetro usuarioServico, só é preciso dar os gets nos atributos em cada bindValue
         */
        $sql = $this->pdo->prepare("UPDATE usuario_servico SET data_finalizacao_servico = :data_finalizacao_servico, metodo_pagamento = :metodo_pagamento, servico_id = :servico_id, contratante_id = :contratante_id, contratado_id = :contratado_id WHERE id = :id");
        $sql->bindValue(":id", $usuarioServico->getId());
        $sql->bindValue(":data_finalizacao_servico", $usuarioServico->getData_finalizacao_servico());
        $sql->bindValue(":metodo_pagamento", $usuarioServico->getMetodo_pagamento());
        $sql->bindValue(":servico_id", $usuarioServico->getServico_id());
        $sql->bindValue(":contratante_id", $usuarioServico->getContratante_id());
        $sql->bindValue(":contratado_id", $usuarioServico->getContratado_id());
        $sql->execute();

        return true;
    }

    public function deletar($id){
        $sql = $this->pdo->prepare("DELETE FROM usuario_servico WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}