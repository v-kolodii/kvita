<?php
$servername = getenv('MYSQL_HOST');
$database = getenv('MYSQL_DATABASE');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$port = getenv('MYSQL_PORT');
$name = getenv('DOCKER_PROJECT_NAME');
$hostname = 'mysql8-container-' . $name;
$mysqli = new mysqli($hostname,$username,$password,$database, $port);

//$db = new PDO('mysql:host=mysql8-container-my_app;port=3306;dbname=cabinet_of_ministers', $username, $password);
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

//mysqli_close($conn);
