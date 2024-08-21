<?php // comando php usado para conectar o script PHP ao servidor de banco de dados SQL
// Verificar se o formulario foi enviado metodo POST
if ($_SERVER["REQUEST_METHOD"]== "POST") {
 // Capturar entrada do usuario
 $nomeAluno = $_POST["nome"];//converte valor Capturado formulario HTML em variavel php $nomeAluno
 $comentario = $_POST["comentario"];//converte valor COMENTARIO Capturado formulario HTML em variavel php $comentario

 // Verifica SE(if) os campos 'nomeAluno' e 'comentario' estão vazios sim frase sera exibida, senão script continua 
 if (empty($nomeAluno) || empty($comentario)) {
    echo "<p>Erro Preencha todos os campos obrigatorios.</p>";//frase se dados estiver vazio
    return;
 }

// Conexão com o banco de dados 4 informações importantes senão transformadas em variaveis php
$hostname = "localhost";//nome do servidor no caso servidor e local
$username = "root";//usario administrador do banco de dados 
$password = ""; //senha do usario root no casa vazia
$database = "coment"; //Nome do seu banco de dados

$conn = mysqli_connect($hostname, $username, $password, $database);//atribui o comando da conexão
//banco de dados variavel $conn
if (!$conn) {// ! FALSE se(if) não (!) conectar ao banco de dados exiba frase falha, VERDADEIRA continue
    die("Falha na conexão: "   . mysql_connect_error());
}

//Inserir dados no banco (prepared statemrnt para segurança)
$stmt = mysqli_prepare($conn, "INSERT INTO aluno (nome, comentario) VALUES (?, ?)"); //prepara comando sql
mysqli_stmt_bind_param($stmt, "ss",$nomeAluno, $comentario);// Vincula valores às variaveis na instrução SQL prepar
// comando abaixo Tenta executar a instrução SQL preparada armazenada em $stmt
if (mysqli_execute($stmt)) { // Se a instrução for executada com sucesso:
    echo "<p>Aluno cadastrado com sucesso!</p>"; // positivo frase exibida
} else { // senão
    echo "<p>Erro ao cadastrar aluno: " . mysql_error($conn) . "<p>"; //frase exibida
}
mysqli_stmt_close($stmt);// Feche a instrução SQL preparada,evita invasão

mysql_close($conn);// Feche a conexão com o banco de dados barrando intrusos-
}

?>

<!DOCTYPE html>
<
