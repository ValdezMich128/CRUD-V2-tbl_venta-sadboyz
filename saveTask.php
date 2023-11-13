<?php

include('db.php');

if (isset($_POST['saveTask'])) {
  $id_articulo = $_POST['id_articulo'];
  $tipotarjeta = $_POST['tipotarjeta'];
  $nip = $_POST['nip'];
  $id_sucursal = $_POST['id_sucursal'];
  $cantidadapagar = $_POST['cantidadapagar'];
  $id_cliente = $_POST['id_cliente'];
  $id_empleado = $_POST['id_empleado'];

  $query = "INSERT INTO tbl_venta(
    id_venta, 
    id_articulo, 
    tipotarjeta, 
    nip, 
    id_sucursal, 
    cantidadapagar, 
    id_cliente, 
    id_empleado)
  VALUES (
    null,
    '$id_articulo',
    '$tipotarjeta',
    '$nip',
    '$id_sucursal', 
    '$cantidadapagar',
    '$id_cliente',
    '$id_empleado')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>