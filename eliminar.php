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

//$id=$_GET["id"];
//print_r($_GET);
$id = $_GET["id"];
// sql to delete a record
$sql = "DELETE FROM productos WHERE id='$id'";

//echo $sql;
//exit();

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully";
  header("Location: menu.php");
} else {
  echo "Error deleting record: " . $conn->error;
  ?>
  <a href="menu.php">Presione aca para regresar al menú principal</a>
  <?php
}

$conn->close();
?>