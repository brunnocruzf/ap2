<form method="post" action="#">
Nome
<input name="nome" type="text"><br>
Senha
<input name="senha" type="password"><br>
telefone
<input name="telefone" type="text"><br>
Sexo
<input name="sexo" type="text"><br>
endereço
<input name="endereco" type="text"><br>
cpf
<input name="cpf" type="number"><br>
rg
<input name="rg" type="number"><br>
<input type="reset" value="limpar">
<input type="submit" value="continuar">
</form>

<?php
require_once "conecta_banco.php";

if(isset($_POST["nome"])){$nome = $_POST["nome"];}else{$nome = "";};
if(isset($_POST["senha"])){$senha = $_POST["senha"];}else{$senha = "";};
if(isset($_POST["telefone"])){$senha = $_POST["telefone"];}else{$telefone = "";};
if(isset($_POST["sexo"])){$senha = $_POST["sexo"];}else{$sexo = "";};
if(isset($_POST["endereco"])){$senha = $_POST["endereco"];}else{$endereco = "";};
if(isset($_POST["cpf"])){$senha = $_POST["cpf"];}else{$cpf = "";};
if(isset($_POST["rg"])){$senha = $_POST["rg"];}else{$rg = "";};

try{
    //conecta com a classe conexão e metodo getConnection
    $Conexao    = Conexao::getConnection();
    //variavel que armazena a query
    $sql = "insert into user(nome,telefone,sexo,endereco,cpf,rg,senha)
            values (:nome,:telefone,:sexo,:endereco,:cpf,:rg,:senha);";
    //prepara conexão com a query
    $stmt = $Conexao->prepare($sql);
    //executa query informada na variavel $Inserir_registro com os valores do array
    $stmt->execute(array(
        ':nome'=>$nome,
        ':telefone'=>$telefone,
        ':sexo'=>$sexo,
        ':endereco'=>$endereco,
        ':cpf'=>$cpf,
        ':rg'=>$rg,
        ':senha'=>$senha
    ));
    $mensagem = "<div class='margin'>".$nome." Cadastrado com sucesso!<div/>";
    echo $mensagem;
    echo "</br><a href='../index.php'>Voltar</a>";
}catch(Exception $e){
    echo $e->getMessage();
    exit;
}
?>