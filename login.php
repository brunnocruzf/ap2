<?php
session_start(); 
 
$conn = new mysqli("localhost", "root","","ap1");
$usuario = $_POST["nome"];
$senha = $_POST["senha"];

if((isset($_POST['nome'])) && (isset($_POST['senha']))) {
    require_once "conecta_banco.php";

    try {
        $Conexao = Conexao::getConnection();
        //$busca_query    = $Conexao->query("SELECT nome, senha FROM usuarios where nome ='admin' and senha='admin';");
        $sql = "SELECT nome, senha FROM usuarios where nome ='" . $usuario . "'and senha='" . $senha . "';";
        $busca_query = $Conexao->query($sql);
        $resultado = $busca_query->fetch();

        //verificar se resultado da $result_query caso retorne true cria session caso retorne false exclui session
        if ($resultado) {
            $_SESSION['id'] = $resultado['iduser'];
            $_SESSION['nome'] = $resultado['nome'];
            echo "bem vindo " . $_SESSION['nome'];
            echo "<br><br>Nome: " . $resultado['nome'];
            echo "<br>Telefone: " . $resultado['telefone'];
            echo "<br>Sexo: " . $resultado['sexo'];
            echo "<br>Endereço: " . $resultado['endereco'];
            echo "<br>CPF: " . $resultado['cpf'];
            echo "<br>RG: " . $resultado['rg'];
            echo "<br><br><a href='logout.php'>Sair</a>";
        } else {
            unset ($_SESSION['usuario']);
            unset ($_SESSION['senha']);
        }

    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}
?>