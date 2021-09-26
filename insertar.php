<?php
session_start();
//print_r($_SESSION);

if(empty($_SESSION['usuario'])){
  echo "Acceso invalido";
  ?>
  <a href="index.php">Presione aca para regresar al inicio de sesión</a>
  <?php
  exit();
}
?>
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
/*print_r($_POST);*/
if(!empty($_POST["id"])){
$id=$_POST["id"];
$nombre=$_POST["nombre"];
$precio=$_POST["precio"];
$sql = "INSERT INTO productos (id, nombre, precio) VALUES ('$id', '$nombre', '$precio')";

/*echo $sql;
exit();*/
if ($conn->query($sql) === TRUE) {
  header("Location: menu.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  ?>
  <a href="menu.php">Presione aca para regresar al menú principal</a>
  <?php
}

$conn->close();
}else{
    header("Location: menu.php");
}
?>