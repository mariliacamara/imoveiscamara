<?PHP
//Define as variaveis
    $cnn = NULL;
    $banco = NULL;

//Estabelecer conexão com o banco de dados.
    $cnn = mysqli_connect('localhost','root','');

//Sekeciona o banco de dados
    $banco = mysqli_select_db($cnn,'imc_db');

//Definindo os caracteres de acentuação
    mysqli_set_charset($cnn,'utf8');
?>