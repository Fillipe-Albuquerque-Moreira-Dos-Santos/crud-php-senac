
<?php
require_once 'classe-pessoa.php';
$p = new Pessoa ("agenda", "localhost", "root", "");
echo "teve conexao";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if (isset($_POST['nome'])) {

if (isset($_GET['id_up']) && !empty($_GET['id_up'])) {

  $id_upd = addslashes($_GET['id_up']);
  $nome = addslashes($_POST['nome']);
  $sexo = addslashes($_POST['sexo']);
  $data_nasc = addslashes($_POST['data_nasc']);
  $telefone= addslashes($_POST['telefone']);
  $email = addslashes($_POST['email']);
  if (!empty($nome) && !empty($sexo) && !empty($data_nasc) && !empty($telefone) && !empty($email)) {
    $p -> atualizarDados($id_upd,$nome,$sexo,$data_nasc,$telefone,$email);
    header("location: index.php");
  }else {
    echo"Todos os campos são obrigatórios";
  } 

}else {

  $nome = addslashes($_POST['nome']);
  $sexo = addslashes($_POST['sexo']);
  $data_nasc = addslashes($_POST['data_nasc']);
  $telefone= addslashes($_POST['telefone']);
  $email = addslashes($_POST['email']);
  if (!empty($nome) && !empty($sexo) && !empty($data_nasc) && !empty($telefone) && !empty($email)) {
    $p -> cadastrarPessoa($nome,$sexo,$data_nasc,$telefone,$email);
  }else {
    echo"Todos os campos são obrigatórios";
  } 

} 
  
}
?>

<?php

if (isset($_GET['id_up'])) {

  $id_update = addslashes($_GET['id_up']);
  $res = $p -> buscarDadosPessoa ($id_update);
}

?>
 
    <section id="esquerda">
        <div class="login-box">
            <h2>Cadastro de Pessoas</h2>
                <form method="POST">

                 <div class="user-box">
                    <input type="text" name="nome" id="nome" value="<?php if (isset($res)) {echo $res['ds_nome'];}?>">
                    <label>Nome</label>
                 </div>

                 <div class="user-box">
                    <input type="text" name="sexo" id="sexo" value="<?php if (isset($res)) {echo $res ['cd_sexo'];}?>">
                    <label>Sexo (M) Masculino e (F) Feminino (N) Neutro</label>
                 </div>

                 <div class="user-box">
                    <input type="date" name="data_nasc" id="data_nasc" value="<?php if (isset($res)) {echo $res['dt_nasc'];} ?>">
                    <label>Data de Nascimento</label>
                 </div>

                <div class="user-box">
                    <input type="text" name="telefone"id="telefone" value="<?php if (isset($res)) {echo $res ['nr_telefone'];} ?>">
                    <label>Telefone</label>
                </div>

                <div class="user-box">
                     <input type="email" name="email" id="email" value="<?php if (isset($res)) {echo $res['ds_email'];} ?>">
                     <label>Email</label>
                </div>
                <input class="inv" type="submit" value="<?php if (isset($res)) {echo "Atualizar";} else{echo "Cadastrar";}?>">
                </form>
           
        </div>
    </section>

    <section id="direita">
        <table>
            <tr style="
    background: linear-gradient(76.8deg, 
    rgb(121, 45, 129) 
    3.6%, rgb(36, 31, 98) 90.4%);">
                <td>ID</td>
                <td>Nome</td>
                <td>Sexo</td>
                <td>Data de Nascimento</td>
                <td>Telefone</td>         
                <td>Email</td>
                <td colspan="2">Edição dos dados</td>
            </tr>
            <?php
        $dados = $p->buscarDados();
        if (count($dados) > 0) {
            for ($i =0; $i < count ($dados); $i++) {

                echo "<tr>";
                foreach($dados[$i] as $k => $v) {
                    if ($k !="id"){
                        echo "<td>".$v."</td>";
                    }
                }
                ?>
                <td>
               
                  <a href = "index.php?id_up=<?php echo $dados[$i]['id_pessoa'];?>">Editar</a>
                  <a href = "index.php?id_pessoa=<?php echo $dados[$i]['id_pessoa'];?>">Excluir</a>
                  
                </td>
                <?php
                echo "</tr>";
            }
        }
        
        
        ?>
        </table>
    </section>
</body>
</html>

<?php
if (isset($_GET['id_pessoa'])) {
  $id_pessoa = addslashes($_GET['id_pessoa']);
  $p -> excluirPessoa($id_pessoa);
  header("location: index.php");
}


?>
