<?php
$servername = "mysql-service";
$username = "root";
$password = "senha123";
$database = "db_comentario";

// Criar conexão


$link = new mysqli($servername, $username, $password, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
