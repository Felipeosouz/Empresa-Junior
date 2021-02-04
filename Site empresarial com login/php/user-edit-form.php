<?php
$q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '" . $_SESSION['user'] . "'";
$busca = $banco->query($q);
$reg = $busca->fetch_object();
?>
<form method="POST" action="user-edit.php" id="edit">
    <table>
    <tr><td> Usuario: <input type="text" name="userupdate" value="<?php echo $reg->usuario ?>">
    <tr><td> Nome: <input type="text" name="nomeupdate" value="<?php echo $reg->nome ?>">
    <tr><td> Tipo: <input type="text" name="tipo" readonly value="<?php echo $reg->tipo ?>" id="tipo">
    <tr><td> Senha: <input type="password" name="senha1">
    <tr><td> Confirme a senha: <input type="password" name="senha2">
    <tr><td> <input type="submit" value="Enviar" id="button">
    </table>
</form>