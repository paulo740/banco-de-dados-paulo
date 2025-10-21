<?php
include_once 'conexao.php';

if (isset($_POST['cadastra'])) {
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

<style> 

li{
    text-align:center;
}

body {
    background-image: url('https://img.freepik.com/fotos-gratis/boletim-de-papel-template-suave_1258-167.jpg');
    background-size: cover;
    font-family: "Arial", sans-serif;
    color: white;
}

h1 {
    padding: 40px;
    text-align: center;
    color: blue;

}

#formulario_mural {
    text-align: center;
}

form {
    max-width: 400px;
    margin: auto;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

input, textarea {
    padding: 10px;
    border-radius: 8px;
    border: none;
    font-size: 1em;
}

.btn {
    background-color: #007BFF;
    color: white;
    cursor: pointer;
    border: none;
    padding: 10px;
    border-radius: 8px;
    transition: background 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}

img.spiderman {
    display: block;
    margin: 20px auto;
    height: 230px;
    width: 340px;
}

</style>


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
    <h1>Mural de Pedidos</h1>

    <img src="https://artpoin.com/wp-content/uploads/2022/08/homem-aranha-com-contorno1.png" class="spiderman">

    <div id="formulario_mural">
        <form id="mural" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" required />

            <label>Email:</label>
            <input type="email" name="email" required />

            <label>Mensagem:</label>
            <textarea name="msg" required></textarea>

            <input type="submit" value="Publicar no Mural" name="cadastra" class="btn"/>
        </form>
    </div>

    <hr style="margin:40px 0;">

    <?php
    $seleciona = mysqli_query($conexao, "SELECT * FROM paulo ORDER BY id DESC");
    while ($res = mysqli_fetch_assoc($seleciona)) {
        echo '<ul class="paulo">';
        echo '<li><strong>ID:</strong> ' . $res['id'] . '</li>';
        echo '<li><strong>Nome:</strong> ' . htmlspecialchars($res['nome']) . '</li>';
        echo '<li><strong>Email:</strong> ' . htmlspecialchars($res['email']) . '</li>';
        echo '<li><strong>Mensagem:</strong> ' . nl2br(htmlspecialchars($res['mensagem'])) . '</li>';
        echo '</ul>';
    }
    ?>
</body>
</html>