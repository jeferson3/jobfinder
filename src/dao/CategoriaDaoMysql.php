<?php
namespace App\Dao;
use App\VO\Categoria;
use App\VO\CategoriaDao;
use PDO;

class CategoriaDaoMysql implements CategoriaDao {

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function salvar(Categoria $categoria){
        $sql = $this->pdo->prepare("INSERT INTO categorias(nome) VALUES (:nome)");
        $sql->bindValue(":nome", $categoria->getNome());
        if($sql->execute()) {
            $categoria->setId($this->pdo->lastInsertId());
            return $categoria;
        }
        return null;
        
    }

    public function buscarTodas(){
        $arrayCategorias = [];

        $sql = $this->pdo->query("SELECT * FROM categorias");
        if($sql->rowCount() > 0){
            $arrayDadosCategorias = $sql->fetchAll(); 
            
            foreach($arrayDadosCategorias as $dadoCategoria){
                
                $categoria = new Categoria();
                $categoria->setId($dadoCategoria['id']);
                $categoria->setNome($dadoCategoria['nome']);

                $arrayCategorias[] = $categoria; 
            }
            return $arrayCategorias;
        }
        return false;
    }

    public function buscarPeloId($id){
        $sql = $this->pdo->prepare("SELECT * FROM categorias WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $dadoCategoria = $sql->fetch(); 
            $categoria = new Categoria();
            $categoria->setId($dadoCategoria['id']);
            $categoria->setNome($dadoCategoria['nome']);
            
            return $categoria;

        } else {
            return false;
        }

    }

    public function buscarPeloNome($nome){
        $arrayCategorias = [];
        $sql = $this->pdo->prepare("SELECT * FROM categorias WHERE nome LIKE :nome");
        $sql->bindValue(':nome', '%'.$nome.'%');
        $sql->execute();
        if($sql->rowCount() > 0){
            $arrayDadosCategorias = $sql->fetchAll(); 
            
            foreach($arrayDadosCategorias as $dadoCategoria){
                
                $categoria = new Categoria();
                $categoria->setId($dadoCategoria['id']);
                $categoria->setNome($dadoCategoria['nome']);

                $arrayCategorias[] = $categoria; 
            }
            return $arrayCategorias;
        }
        return false;

    }
  
    public function atualizar(Categoria $categoria){
        $sql = $this->pdo->prepare("UPDATE categorias SET nome = :nome WHERE id = :id");
        $sql->bindValue(":id", $categoria->getId());
        $sql->bindValue(":nome", $categoria->getNome());
        if($sql->execute()) {
            return true;
        }
        return false;
        
    }

    public function deletar($id){
        
        if ($this->buscarPeloId($id)) {
            $sql = $this->pdo->prepare("DELETE FROM categorias WHERE id = :id");
            $sql->bindValue(':id', $id);
            if($sql->execute()) {
                return true;
            }
            return false;
        }
        return false;
    }
}