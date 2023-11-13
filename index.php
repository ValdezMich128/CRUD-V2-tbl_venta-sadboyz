<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="saveTask.php" method="POST">
          <div class="form-group">
            <input type="text" name="id_articulo" class="form-control" placeholder="Id articulo" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="tipotarjeta" class="form-control" placeholder="Tipo tarjeta" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="nip" class="form-control" placeholder="Nip" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="id_sucursal" class="form-control" placeholder="Id sucursal" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="cantidadapagar" class="form-control" placeholder="Cantidad a pagar" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="id_cliente" class="form-control" placeholder="Id cliente" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="id_empleado" class="form-control" placeholder="Id empleado" autofocus>
          </div>
          <input type="submit" name="saveTask" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>id_venta</th>
            <th>id_articulo</th>
            <th>tipotarjeta</th>
            <th>nip</th>
            <th>id_sucursal</th>
            <th>cantidadapagar</th>
            <th>id_cliente</th>
            <th>id_empleado</th>
           
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tbl_venta";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id_venta']; ?></td>
            <td><?php echo $row['id_articulo']; ?></td>
            <td><?php echo $row['tipotarjeta']; ?></td>
            <td><?php echo $row['nip']; ?></td>
            <td><?php echo $row['id_sucursal']; ?></td>
            <td><?php echo $row['cantidadapagar']; ?></td>
            <td><?php echo $row['id_cliente']; ?></td>
            <td><?php echo $row['id_empleado']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id_venta']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteTask.php?id=<?php echo $row['id_venta']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>