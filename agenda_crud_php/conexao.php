<?php
try{
$pdo = new PDO ("mysql:dbname=agenda;host=localhost:3307","root","");

}catch(PDOException $e) {
    echo "Deu erro na conexão: conexao com o banco de dados dados errados " . $e-> getMessage();
} catch (Exception $e) {
    echo "Erro de boa" . $e-> getMessage();
}

echo "A conexao funcinou parabéns";



//--------------------------------INSERT DADOS-------------------------------------------

/*$res = $pdo ->prepare("INSERT INTO tb_pessoa(ds_nome, cd_sexo, dt_nasc, nr_telefone, 
ds_email) VALUES (:n, :s, :na, :t, :e)");
$res->bindValue(":n","Roberta");
$res->bindValue(":s","F");
$res->bindValue(":na","2003-07-06");
$res->bindValue(":t","61965432367");
$res->bindValue(":e","robzinha@uol.com.dx");
$res->execute();*/

/*$pdo->query("INSERT INTO tb_pessoa(ds_nome, cd_sexo, dt_nasc, nr_telefone, 
ds_email) VALUES('Roberta','F','2003-07-06','61986543278','robert@gmail.com')");*/


//--------------------------------------Deletar Dados--------------------------------------

/*
$cmd = $pdo-> prepare ("DELETE FROM tb_pessoa WHERE id_pessoa = :id_pessoa");
$id_pessoa = 2;
$cmd-> bindValue(":id_pessoa",$id_pessoa);
$cmd -> execute();

*/

/*

--------------------------------------------UPDATE PESSOA----------------------------------------------
$cmd = $pdo->prepare("UPDATE tb_pessoa SET ds_email = :e WHERE id_pessoa = :id_pessoa");
$cmd->bindValue(":e","Miriam@gmail.com");
$cmd->bindValue(":id_pessoa",1);
$cmd->execute();
*/

//$res = $pdo->query("DELETE FROM pessoa WHERE id = '3'");

?>