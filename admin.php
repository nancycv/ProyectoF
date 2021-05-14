<?php include 'header.php';?>

  <?PHP
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(!isset($_SESSION['sess_user'])){
      header("Location:./admin.php");
    }else {
      $admin = $_SESSION['sess_user'];
      if($admin != '222'){
          header("Location:./index.php");
      }
    }
   ?>


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h2 class="my-5">Administra tus productos
        <small>selecciona una Opción</small>
      </h2>

      <div class="row">
        <div class="col-lg-6 col-sm-6 portfolio-item ">
          <div class="card card text-center">
            <div class="align-middle" style="width: 640px; height: 640px; margin:auto; padding-top:10px;">
              <a href="./addProducts.php"><img class="card-img-top" src="./images/imgp7.jpg" alt=""></a>
            </div>
            <div class="card-body">
              <h4 class="card-title">
              <br><br>
                <a href="./addProducts.php">Añadir Productos</a>
              </h4>
              <p class="card-text">Aquí puedes ingresar el registro de nuevos productos en la Base de Datos.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-sm-6 portfolio-item text-center">
          <div class="card card text-center">
            <div class="align-middle" style="width: 640px; height: 640px; margin:auto; padding-top: 10px;">
              <a href="./editProducts.php"><img class="card-img-top" src="./images/imgp14.jpg" alt=""></a>
            </div>
            <div class="card-body">
              <h4 class="card-title">
              <br><br>
                <a href="./editProducts.php">Historial/Modificar Productos</a>
              </h4>
              <p class="card-text">Aquí puedes eliminar el registro de los productos en la Base de Datos.</p>
            </div>
          </div>
        </div>

    </div>
    <!-- /.container -->
    </div><br><br><br><br>
    <?php
include 'footer.php';
?>