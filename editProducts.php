<?php include 'header.php';?>

  <?PHP
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(!isset($_SESSION['sess_user'])){
      header("Location:./index.php");
    }else{
      $admin = $_SESSION['sess_user'];
      if($admin != '222'){
          header("Location:./index.php");
      }
    }
   ?>
    <style>
      .box {
        padding-top: 3px;
        border:1px;
        border-style: solid;
        border-color:#DDD;
        border-radius: 5px;
        word-wrap: break-word;
        font-size: 15px;
        text-align: center;
      }
      .titlebox {
        color:gray;
        background-color: white;
      }
    </style>


   <div class="container">
     <!-- Page Heading -->
     <h1 class="my-3">Product Catalog</h1>
       <div class='row my-6' >
           <div class="col-md-2 titlebox box" style="font-size:15px">
             Nombre
           </div>

           <div class="col-md-2 titlebox box" style="font-size:15px">
             Pais
           </div>

           <div class="col-md-2 titlebox box" style="font-size:15px">
             Descripción
           </div>

           <div class="col-md-2 titlebox box" style="font-size:15px">
             Precio
           </div>

           <div class="col-md-2 titlebox box" style="font-size:15px">
            Fabricante
           </div>

           <div class="col-md-2 titlebox box" style="font-size:15px">
             Cantidad
           </div>
           
          

      
     </div>
     <?php
         if (mysqli_connect_errno()) {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
         }


           $result = mysqli_query($con,"SELECT * FROM productos");


           while($row = mysqli_fetch_array($result)) {
                          echo "<form action='./eraseProduct.php' method='post'>";
             echo "<div class='row my-6' >";

             echo "<div class='col-md-2 box'><p style='font-size:12px;'>{$row['Nombre']}</div>";
             echo "<div class='col-md-2 box'><p style='font-size:12px;'>{$row['Origen']}</div>";
             echo "<div class='col-md-2 box'><p style='font-size:12px;'>{$row['Descripcion']}</div>";
             echo "<div class='col-md-2 box'><p style='font-size:12px;'>".'$'."{$row['Precio']}</div>";
             echo "<div class='col-md-2 box'><p style='font-size:12px;'>{$row['Fabricante']}</div>";
             echo "<div class='col-md-2 box'><p style='font-size:12px;'>{$row['Cant_Almacen']}</div>";
            // echo "<div class='col-xl-1 box'><img src='.{$row['Fotos']}' style='max-width:100%; display:block; max-height:100%;'></img></div>";
             echo "<div class='col-md-7'><button class='btn btn-primary btn-sm' name='ID_producto' value ={$row['ID_producto']} type='submit'>Eliminar</div>";
             echo "<input type='hidden' value='{$row['ID_producto']}'>";

             echo "</div>";
             echo "</form>";
           }
           ?>
           <br><br><br>
           <h1 class="my-3">Historial de Compra</h1><br><br>
             <tbody>
            <?php
           $result = mysqli_query($con,"SELECT * FROM carrito up, productos p WHERE p.ID_producto=up.ID_producto;");

           echo "<table class='table'>
           <thead class='thead-dark'>
             <tr>
               <th>Name</th>
               <th>Price</th>
               <th>Quantity</th>
             </tr>
           </thead>";

           while($row=mysqli_fetch_array($result)){
            echo "<tr>";
               // echo "<td class='align-middle'> <img src='.".$row['Fotos']."' style='height:100px;'> </td>";
                echo "<td class='align-middle'> <h4>{$row['Nombre']} </h4></td>";
                echo '<td class="align-middle"> <h4>$'. $row['Precio'] .'</h4></td>';
                echo "<td class='align-middle'> <h4>{$row['Cantidad']} </h4></td>";
              echo "</tr>";
           }
           echo "</table>"
     ?>
  </tbody>

         </div>

       </div>

     
    <!-- /.container -->
    <?php
include 'footer.php';
?>