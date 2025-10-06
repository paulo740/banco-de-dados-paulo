<?php
include_once 'conexao.php';
if(isset($_POST['cadastra'])){
    $nome  = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $msg   = mysqli_real_escape_string($conexao, $_POST['msg']);

    $sql = "INSERT INTO paulo (nome, email, mensagem) VALUES ('$nome', '$email', '$msg')";
    mysqli_query($conexao, $sql) or die("Erro ao inserir dados: " . mysqli_error($conexao));
    header("Location: mural.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Mural de pedidos</title>
<link rel="stylesheet" href="style.css"/>
<script src="scripts/jquery.js"></script>
<script src="scripts/jquery.validate.js"></script>
<script>
$(document).ready(function() {
    $("#mural").validate({
        rules: {
            nome: { required: true, minlength: 4 },
            email: { required: true, email: true },
            msg: { required: true, minlength: 10 }
        },
        messages: {
            nome: { required: "Digite o seu nome", minlength: "O nome deve ter no mínimo 4 caracteres" },
            email: { required: "Digite o seu e-mail", email: "Digite um e-mail válido" },
            msg: { required: "Digite sua mensagem", minlength: "A mensagem deve ter no mínimo 10 caracteres" }
        }
    });
});
</script>
</head>
<body>
<div id="main">
<div id="geral">
<div id="header">
    <h1>Mural de pedidos</h1>
</div>

<div id="formulario_mural">
<form id="mural" method="post">
    <label>Nome:</label>
    <input type="text" name="nome"/><br/>
    <label>Email:</label>
    <input type="text" name="email"/><br/>
    <label>Mensagem:</label>
    <textarea name="msg"></textarea><br/>
    <input type="submit" value="Publicar no Mural" name="cadastra" class="btn"/>
</form>
</div>

<?php
$seleciona = mysqli_query($conexao, "SELECT * FROM paulo ORDER BY id DESC");
while($res = mysqli_fetch_assoc($seleciona)){
    echo '<ul class="paulo">';
    echo '<li><strong>ID:</strong> ' . $res['id'] . '</li>';
    echo '<li><strong>Nome:</strong> ' . htmlspecialchars($res['nome']) . '</li>';
    echo '<li><strong>Email:</strong> ' . htmlspecialchars($res['email']) . '</li>';
    echo '<li><strong>Mensagem:</strong> ' . nl2br(htmlspecialchars($res['mensagem'])) . '</li>';
    echo '</ul>';
}
?>

<div id="footer">

</div>
</div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body background=https://wallpapers.com/images/hd/ben-10-background-26hfehbl3yjuhmx4.jpg>
   <style>

 h1{
    font-family: "Arial", sans-serif;
    text-align:center;
 }

 section {
    padding: 40px;
    text-align: center;
 }

 section {
    padding: 40px;
    text-align: center;
}

 form{
    max-width: 400px;
    margin: auto;
    display: flex;
    flex-direction: column;
    gap: 10px;
 }

   </style>

</body>
</html>