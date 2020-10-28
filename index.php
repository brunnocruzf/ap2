<form method="post" action="login.php">
Nome
<input name="nome" type="text"><br>
Senha
<input name="senha" type="password"><br>
<input type="reset" value="limpar">
<input type="submit" value="continuar">
</form>
<a href="criarUser.php">Criar usuário</a>

<?php
/*
$conn = new mysqli("localhost", "root","","ap1");

$result = $conn->query("SELECT * FROM user ORDER BY iduser");

while($fetch = mysqli_fetch_row($result)){
    echo "<p>";
    foreach ($fetch as $value)
        echo $value . " - ";
    }
       echo "</p>";

$query = $conn->prepare("INSERT INTO tb_usuarios(login,senha) VALUES (?,?)");
$query->bind_param("ss", $login,$pass);

$login = "user";
$pass = "12345";
$query->execute();

$login = "root";
$pass = "abcdef";
$query->execute();

*/
?>