<?php

require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {

    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Usuario $u) {

        $sql = $this->pdo->prepare("INSERT INTO funcionario_teste (nome, email, telefone) VALUES (:nome, :email, :telefone)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;

        header("Location: index.php");
        exit;

    }

    public function findAll() {

        $array = [];

        $sql = $this->pdo->query("SELECT * FROM funcionario_teste");
        if($sql->rowCount() > 0) {
            $lista = $sql->fetchAll();
            foreach($lista as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);
                $u->setTelefone($item['telefone']);

                $array[] = $u;
            }
        } 

        return $array;

    }

    public function findById($id) {

        $sql = $this->pdo->prepare("SELECT * FROM funcionario_teste WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $data = $sql->fetch();

            $f = new Usuario();
            $f->setId($data['id']);
            $f->setNome($data['nome']);
            $f->setEmail($data['email']);
            $f->setTelefone($data['telefone']);

            return $f;

        } else {
            return false;
        }

    }

    public function findByEmail($email) {
        
        $sql = $this->pdo->prepare("SELECT * FROM funcionario_teste WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $data = $sql->fetch();

            $f = new Usuario();
            $f->setId($data['id']);
            $f->setNome($data['nome']);
            $f->setEmail($data['email']);
            $f->setTelefone($data['telefone']);

            return $f;

        } else {
            return false;
        }

    }

    public function update(Usuario $u) {

        $sql = $this->pdo->prepare("UPDATE funcionario_teste SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;

        header("Location: index.php");
        exit;

    }

    public function delete($id) {

        $sql = $this->pdo->prepare("DELETE FROM funcionario_teste WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();

        return true;

    }

}