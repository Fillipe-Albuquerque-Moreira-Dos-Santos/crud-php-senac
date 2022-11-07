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
}
