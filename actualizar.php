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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

$id = $_GET["id"];
$sql = "SELECT * FROM productos WHERE id = $id";
//echo $sql;
//exit();
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $nombre=$row["nombre"];
    $precio=$row["precio"];
                          ?>
                          <form action="actualizar2.php" method="post">
                            <fieldset>
                                <legend>Capture los datos a modificar del producto:</legend>
                                id: <input type="number" name="" id="" value="<?=$id?>" disabled><br>
                                <input type="hidden" name="id" id="" value="<?=$id?>"/>
                                nombre: <input type="text" name="nombre" id="" value="<?=$nombre?>" required><br>
                                precio: <input type="number" name="precio" id="" value="<?=$precio?>" required><br>
                                <input type="submit" value="Capturar">
                            </fieldset>
                            </form>
                          <?php
  }

} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>