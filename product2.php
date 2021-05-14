<?php include 'header.php';?>

    <!-- Page Content -->
    <div class="container">

      <!-- Product -->
      <?PHP

        if (!isset($_POST['id'])){
          header("Location:./index.php");
        }else{
          $id = $_POST['id'];
          $result = mysqli_query($con,"SELECT * FROM productos WHERE ID_producto = $id");

          $row = mysqli_fetch_array($result);
            echo "<br><h1 class='my-6'>". $row['Nombre'] ."  ";
            echo "<small> - ". $row['Fabricante'] ."</small></h1>";
            echo "<div class='row'>";
            echo "<div class='col-md-7'>";
            echo "<a href='#'>";
           
            echo "<img  class='card-img-top' src='". $row['Fotos'] ."' alt=''>";
            echo "</a></div>";
            echo "<div class='col-md-5'><br><br><br>";
            echo "<p style='font-size: 30px;'>". $row['Descripcion'] ."</p>";
            echo "<h3> $". $row['Precio'] ."</h3><br>";
            echo "<h5 style='color: gray;'> Stock: ". $row['Cant_Almacen'] ."</h5><br>";
            
            if(isset($_SESSION['sess_user'])){
              if($row['Cant_Almacen']>0){
                echo "<div class='col-md-4'>";
                echo "<form ' action='./addCart.php' method='post'>";
                echo "<input type='hidden' name='product' value='{$row['ID_producto']}'</input>";
                echo "<button type='submit' class='btn btn-primary'>Add to Cart</button><br><br>";
                echo "<div class='form-group'><h5> &nbsp&nbsp&nbsp Quantity: &nbsp</h5><input type='number' name='Cantidad' min=1 max={$row['Cant_Almacen']} value=1 class='form-control'></div></form>";
              }
            }
            echo "</div></div>";
        }
      ?>
    </div>
    <!-- /.container -->
