<?php
$servername = "localhost";
$username = "id17616815_robles";
$password = "?Y)Pb3OFur[iw!8+";
$dbname = "id17616815_bdpos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(!empty($_POST["usuario"])){
    $usuario=$_POST["usuario"];
    $contraseña=$_POST["contraseña"];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña=MD5('$contraseña')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['usuario'] = $row['nombre'];
    //print_r($row);
    //exit();
    header('Location: menu.php');
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    ?>
    <a href="menu.php">Presione aca para regresar al menú principal</a>
    <?php
    }

    $conn->close();
}else{
    header("Location: index.php");
}
?>