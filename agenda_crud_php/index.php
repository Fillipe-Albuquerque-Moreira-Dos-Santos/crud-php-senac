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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <selection id="direita">

        <form>
            <h2>CADASTRAR PESSOA</h2>
            <label>Nome</label>
            <input type="text" name="nome" id="nome">
            <label>Telefone</label>
            <input type="text" name="telefone" id="telefone">
            <label>Email</label>
            <input type="text" name="email" id="email">
            <input type="submit" value="cadastrar">

        </form>
    </selection>

    <selection id="esquerda">

    <table>
            <tr>
                <td>Nome</td>
                <td>Telefone</td>
                <td colspan="2">Email</td>
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
                echo "</tr>";
            }
        }
        ?>
            <tr>
                <td>filipe</td>
                <td>12345678</td>
                <td>filipe@gmail.com</td>
                <td><a href="">Editar</a><a href="">Excluir</a> </td>

            </tr>
        </table>
    </selection>

</body>

</html>