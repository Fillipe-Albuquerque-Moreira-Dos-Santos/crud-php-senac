<?php

class Pessoa {
private $pdo;
    public function __construct($dbname, $host, $user, $senha)
    {
        try {
          $this -> pdo = new PDO ("mysql:dbname=".$dbname.";host=".$host,$user,$senha);

        }catch(PDOException $e) {
            echo "Deu erro na conexão: conexao com o banco de dados dados errados " . $e-> getMessage();
        } catch (Exception $e) {
            echo "Erro de boa" . $e-> getMessage();
        } 
        
    }


    
    public function buscarDados() {
        $res = array();
        $cmd = $this -> pdo -> query ("SELECT * FROM tb_pessoa ORDER BY ds_nome");
        $cmd -> execute();
        $res = $cmd -> fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function cadastrarPessoa($nome,$sexo,$data_nasc,$telefone,$email) {

        $cmd = $this -> pdo->prepare("INSERT INTO tb_pessoa(ds_nome, cd_sexo, dt_nasc, nr_telefone, 
        ds_email) VALUES (:n, :s, :na, :t, :e)");
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":s",$sexo);
        $cmd->bindValue(":na",$data_nasc);
        $cmd->bindValue(":t",$telefone);
        $cmd->bindValue(":e",$email);
        $cmd->execute();
    }

    public function excluirPessoa ($id) {
        $cmd = $this -> pdo->prepare ("DELETE FROM tb_pessoa WHERE id_pessoa = :id_pessoa");
        $cmd -> bindValue(":id_pessoa",$id);
        $cmd -> execute();
    }

    public function buscarDadosPessoa($id) {
        $res = array();
        $cmd = $this -> pdo -> prepare("SELECT * FROM tb_pessoa WHERE id_pessoa = :id_pessoa");
        $cmd -> bindValue(":id_pessoa",$id);
        $cmd -> execute();
        $res = $cmd -> fetch(PDO::FETCH_ASSOC);
        return $res;

    }


public function atualizarDados() {

}

}

