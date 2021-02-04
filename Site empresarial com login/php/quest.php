<div id="forum">
<table id="myforum">
<?php

$q = "SELECT u.id, u.nome, u.tipo, m.id_msg, m.mensagem FROM mensagens AS m JOIN usuarios AS u ON m.id_nome=u.id ORDER BY m.id_msg";
$busca = $banco->query($q);
while($reg = $busca->fetch_object()) {
    $id = $reg->id;
    echo "<tr><td>$reg->nome [ $reg->tipo ]: $reg->mensagem";
}
?>
<form method="POST" action="new-msg.php" id="enviar">
<input type="text" name="menssage" placeholder="Digite aqui sua mensagem...">
<input type="submit" value="Enviar">
</form>
</table>
</div>
