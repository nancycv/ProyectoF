<?php include 'header.php';?>

    <!-- Page Content -->
    <div class="container">
      <div class="row my-3">

        <div class="col-xl-1">
          <h2>Kart</h2>
        </div>

    

        <div class="col-xl-7">
        </div>

       

      <table class="table">
        <thead class="thead-dark">
          <tr>
            
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

        <!-- Product -->
        <?PHP
          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          if(!isset($_SESSION['sess_user'])){
            header("Location:./index.php");
          }else {
            $result = mysqli_query($con,"SELECT DISTINCT u.ID_usuario,p.Fotos, p.Nombre, p.Precio, up.Cantidad, up.ID_producto FROM carrito up, productos p, usuarios u WHERE up.ID_producto=p.ID_producto AND u.ID_usuario=up.ID_usuario AND up.ID_usuario='{$_SESSION['sess_user']}' AND Pagado=0;");

            while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
             //   echo "<td class='align-middle'> <img src='.".$row['Fotos']."' style='height:130px;'> </td>";
                echo "<td class='align-middle'> <h4>{$row['Nombre']} </h4></td>";
                echo '<td class="align-middle"> <h4>$'. $row['Precio'] .'</h4></td>';
                echo "<td class='align-middle'> <h4>{$row['Cantidad']} </h4></td>";
                echo "<td class='align-middle'><form action='./deleteCart.php' method='post'>";
                echo "<input type='hidden' name='product' value='{$row['ID_producto']}'</input>";
                echo "<button type='submit' class='btn btn-primary align-middle'>Remove</button></form></td>";
              echo "</tr>";
            }
          }
        ?>
        

        </tbody>
        
      </table>
      <div class="col-md-2">
          <form action="./buyAction.php" method="post">
            <button type='submit' class='btn btn-md btn-primary btn-block align-middle' style="border-radius: 15px;">Buy</button>
          </form>
        </div>
        <div class="col-md-2">
          <form action="./history.php" method="post">
            <button type='submit' class='btn btn-md btn-primary btn-block align-middle' style="border-radius: 15px;">Bought History</button>
          </form>
        </div><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
    </div>
   
    <?php
include 'footer.php';
?>
    <!-- /.container -->
