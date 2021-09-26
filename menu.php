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
    <script>
      function confirmar(){
        if(confirm("¿Estas seguro de eliminar este producto?")){
          return true;
        }
        return false;
      }
    </script>
</head>
<body>
  <h4>Bienvenido <?=$_SESSION['usuario'] ?> <a href="salir.php">Cerrar sesión</a></h4>
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

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border='1' bg='green'>";
  echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Eliminar</th><th>Actualizar</th></tr>";
  while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    echo "<tr>\t\n<td> " . $row["id"]    . "</td>\t\n<td> " 
                          . $row["nombre"]. "</td>\t\n<td> " 
                          . $row["precio"]. "</td>\t\n<td>"
                          ."<a href='eliminar.php?id=$id' onclick='return confirmar()'><img src='delete.png'></a></td><td>"
                          ."<a href='actualizar.php?id=$id'><img src='update.png'></a></td></tr>";
  }

  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>

<form action="insertar.php" method="post">
  <fieldset>
    <legend>Capture los datos del nuevo producto:</legend>
    id: <input type="number" name="id" id="" required><br>
    nombre: <input type="text" name="nombre" id="" required><br>
    precio: <input type="number" name="precio" id="" required><br>
    <input type="submit" value="Capturar">
  </fieldset>
</form>
</body>
</html>