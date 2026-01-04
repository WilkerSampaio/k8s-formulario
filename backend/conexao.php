<?php
$servername = "mysql-service"; 
$username = "root";
$password = getenv('MYSQL_ROOT_PASSWORD'); 
$database = getenv('MYSQL_DATABASE'); 

// Criar conexão
$link = new mysqli($servername, $username, $password, $database);

/* check connection */
if ($link->connect_error) {
    printf("Connect failed: %s\n", $link->connect_error);
    exit();
}

echo "Conexão realizada com sucesso!";
?>