
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
<<<<<<< HEAD
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if (isset($_POST['nome'])) {
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
                    <input type="text" name="nome" id="nome" value="<?php if (isset($res)) {echo $res['nome'];}?>">
                    <label>Nome</label>
                 </div>

                 <div class="user-box">
                    <input type="text" name="sexo" id="sexo" value="<?php if (isset($res)) {echo $res ['sexo'];}?>">
                    <label>Sexo (M) Masculino e (F) Feminino (N) Neutro</label>
                 </div>

                 <div class="user-box">
                    <input type="date" name="data_nasc" id="data_nasc" value="<?php if (isset($res)) {echo $res['data_nasc'];} ?>">
                    <label>Data de Nascimento</label>
                 </div>

                <div class="user-box">
                    <input type="text" name="telefone"id="telefone" value="<?php if (isset($res)) {echo $res ['telefone'];} ?>">
                    <label>Telefone</label>
                </div>

                <div class="user-box">
                     <input type="email" name="email" id="email" value="<?php if (isset($res)) {echo $res['email'];} ?>">
                     <label>Email</label>
                </div>
                <input class="inv" type="submit" value="<?php if (isset($res)) {echo "Atualizar";} else{echo "Cadastrar";}?>">
                </form>
           
=======
    <title>Cadastro</title>
</head>
<body>
    <style>

#direita{
    position: absolute;
  top: 15%;
  right:5%;
 
  }

  table {
  font-family: Arial, Helvetica, sans-serif;
  color: #fff;
  width: 600px;
  text-align: center;
  overflow:hidden;
    border-collapse:collapse;
    border: solid  0px;
    -webkit-border-radius: 12px;
       -moz-border-radius: 12px;
            border-radius: 12px;

 
}

td,  th {
    padding: 13px;
 
}

 tr{background:rgba(0,0,0,.5);}

 tr:hover {background-color:  	#9370DB;}

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

a{
    color: black;
    padding: 8px;
    margin: 0px 5px;
    text-decoration: none;
    border: 2px solid;
    border-radius: 10px 10px 10px;
    background: gray;
}

a:nth-child(1) {
    background: yellow;
}

a:nth-child(2) {
    background: red;
}

a:nth-child(2):hover {
    
    background: #FF6347;
    
}
a:nth-child(1):hover {
   
    background: #F0E68C;
}

html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(to top, #c471f5 0%, #fa71cd 100%);
}

.login-box {
  position: absolute;
  top: 40%;
  left: 17%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #fa71cd;
  font-size: 12px;
}

.inv {
  cursor: pointer;
 --glow-color: rgb(217, 176, 255);
 --glow-spread-color: rgba(191, 123, 255, 0.781);
 --enhanced-glow-color: rgb(231, 206, 255);
 --btn-color: rgb(100, 61, 136);
 border: .25em solid var(--glow-color);
 padding: 1em 3em;
 margin-top: 2em;
 color: var(--glow-color);
 font-size: 15px;
 font-weight: bold;
 background-color: var(--btn-color);
 border-radius: 1em;
 outline: none;
 box-shadow: 0 0 1em .25em var(--glow-color),
        0 0 4em 1em var(--glow-spread-color),
        inset 0 0 .75em .25em var(--glow-color);
 text-shadow: 0 0 .5em var(--glow-color);
 position: relative;
 transition: all 0.3s;
}

.inv::after {
 pointer-events: none;
 content: "";
 position: absolute;
 top: 120%;
 left: 0;
 height: 100%;
 width: 100%;
 background-color: var(--glow-spread-color);
 filter: blur(2em);
 opacity: .7;
 transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
}

.inv:hover {
 color: var(--btn-color);
 background-color: var(--glow-color);
 box-shadow: 0 0 1em .20em var(--glow-color),
        0 0 3em 1em var(--glow-spread-color),
        inset 0 0 .70em .20em var(--glow-color);
}

.inv:active {
 box-shadow: 0 0 0.6em .25em var(--glow-color),
        0 0 2.5em 2em var(--glow-spread-color),
        inset 0 0 .5em .25em var(--glow-color);
}


    </style>
 
    <section id="esquerda">
        <div class="login-box">
            <h2>Login</h2>
                <form>

                 <div class="user-box">
                    <input type="text" name="nome" required="">
                    <label>Username</label>
                 </div>

                <div class="user-box">
                    <input type="text" name="telefone" required="">
                    <label>Telefone</label>
                </div>
                <div class="user-box">
                     <input type="text" name="email" required="">
                     <label>Email</label>
                </div>
            <input class="inv" type="submit" value="Cadastrar">
>>>>>>> 45a66cc7828286c86cfae07d8e3f376b287b867e
        </div>
    </section>

    <section id="direita">
        <table>
            <tr style="
    background: linear-gradient(76.8deg, 
    rgb(121, 45, 129) 
    3.6%, rgb(36, 31, 98) 90.4%);">
<<<<<<< HEAD
                <td>ID</td>
                <td>Nome</td>
                <td>Sexo</td>
                <td>Data de Nascimento</td>
                <td>Telefone</td>         
                <td>Email</td>
                <td colspan="2">Edição dos dados</td>
=======
                <td>Nome</td>
                <td>Telefone</td>
                <td colspan="2">Email</td>
>>>>>>> 45a66cc7828286c86cfae07d8e3f376b287b867e
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
<<<<<<< HEAD

<?php
if (isset($_GET['id_pessoa'])) {
  $id_pessoa = addslashes($_GET['id_pessoa']);
  $p -> excluirPessoa($id_pessoa);
  header("location: index.php");
}


?>
=======
>>>>>>> 45a66cc7828286c86cfae07d8e3f376b287b867e
