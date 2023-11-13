<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_venta WHERE id_venta=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $id_articulo = $row['id_articulo'];
    $tipotarjeta = $row['tipotarjeta'];
    $nip = $row['nip'];
    $id_sucursal = $row['id_sucursal'];
    $cantidadapagar = $row['cantidadapagar'];
    $id_cliente = $row['id_cliente'];
    $id_empleado = $row['id_empleado'];
  }
}

if (isset($_POST['update'])) {
  $id_venta = $_GET['id'];
  $id_articulo= $_POST['id_articulo'];
  $tipotarjeta = $_POST['tipotarjeta'];
  $nip = $_POST['nip'];
  $id_sucursal = $_POST['id_sucursal'];
  $cantidadapagar = $_POST['cantidadapagar'];
  $id_cliente = $_POST['id_cliente'];
  $id_empleado = $_POST['id_empleado'];


  $query = "UPDATE tbl_venta set  id_articulo = '$id_articulo', tipotarjeta = '$tipotarjeta', nip = '$nip', id_sucursal ='$id_sucursal',
   cantidadapagar = '$cantidadapagar', id_cliente = '$id_cliente',
  id_empleado = '$id_empleado' WHERE id_venta=$id_venta";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="id_articulo" type="text" class="form-control" value="<?php echo $id_articulo; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="tipotarjeta" type="text" class="form-control" value="<?php echo $tipotarjeta; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="nip" type="text" class="form-control" value="<?php echo $nip; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="id_sucursal" type="text" class="form-control" value="<?php echo $id_sucursal; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="cantidadapagar" type="text" class="form-control" value="<?php echo $cantidadapagar; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="id_cliente" type="text" class="form-control" value="<?php echo $id_cliente; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="id_empleado" type="text" class="form-control" value="<?php echo $id_empleado; ?>" placeholder="Update Title">
        </div>
        
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>