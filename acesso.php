<?php
    // Iniciar a sessão
    session_start();
    $_SESSION['acesso']=1;
    // Abre o arquivo com as conexões do 80
    include "connection.php";

    //Define as variaveis
    $result = NULL;
    $acao = NULL;
    $query = NULL;
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $query = mysqli_query($cnn, "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'") or die(mysqli_error());
    $result = mysqli_num_rows($query);
    if($result == 0){
        unset ($_SESSION['pri']);
        echo "<script>alert('Login e/ou senha não cadastradas!!');</script>";
        echo "<script>window.location='index.php';</script>";
    }
    else {
        $registro = mysqli_fetch_row($query);
        $email = $registro[2];
        $senha = $registro[3];
        $privilegio = $registro[6];
        if($privilegio == "Master"){
            $_SESSION['pri'] = $privilegio;
            echo "<script>alert('Bem-Vindo ao Sistema!!);</script>";
            echo "<script>window.location='sistema.php';</script>";
        }else{
            if($privilegio == "Cliente"){
                $_SESSION['pri'] = $privilegio;
                echo "<script>alert('Bem-Vindo ao Sistema!!);</script>";
                echo "<script>window.location='iniciousuario.php';</script>";
            }

        }
    }
    ?>