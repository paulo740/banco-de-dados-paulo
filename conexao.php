<?php
// ===========================================
// CONFIGURAÇÕES DO BANCO DE DADOS (MySQL)
// ===========================================

// Servidor do banco. Geralmente não precisa alterar no XAMPP/WAMP.
$host = "localhost"; 

// Usuário do banco. O padrão é 'root'.
$usuario = "root"; 

// Senha do banco.
// No XAMPP/WAMP padrão, a senha é uma STRING VAZIA ("").
// Se você configurou uma senha, coloque-a aqui, ex: "minhasenha".
$senha = ""; 

// Nome do banco de dados onde a tabela 'produtos' está.
$banco = "paulo"; 

// Conexão MySQLi
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verifica se a conexão falhou
if (!$conexao) {
    // A função 'die' encerra o script e exibe o erro
    die("Erro ao conectar ao MySQL: " . mysqli_connect_error());
}

// Configura o charset para UTF-8 (suportar acentos e Ç)
mysqli_set_charset($conexao, "utf8");


// ===========================================
// CONFIGURAÇÕES DO CLOUDINARY
// ===========================================
// Substitua os valores abaixo pelas suas credenciais reais do Cloudinary.
// Estes valores serão usados pelo mural.php para o upload via cURL.
$cloud_name = "dzc5fbtou"; 
$api_key    = "236638511443984"; 
$api_secret = "KmgGQ1rga-XsSzTnDuXY5AXs8mI"; 

?>