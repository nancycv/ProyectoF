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


   <div class="container">
     <!-- Page Heading -->

     <div class="col-lg-12">
       <div class="card mt-4">
       <div class="card-body">
         <h1 class="my-2">New Product</h1>

         <h6 style="color:green">
           <?php
             if( !isset($_POST['Nombre']) || !isset($_POST['Descripcion']) || !isset($_POST['Precio']) || !isset($_POST['Cant_Almacen']) || !isset($_POST['Fabricante']) || !isset($_POST['Origen'])){
               echo "Fill all the inputs.";
             }else{
             
               $Nombre = $_POST['Nombre'];
               $Descripcion = $_POST['Descripcion'];
               $Precio = $_POST['Precio'];
               $Cant_Almacen = $_POST['Cant_Almacen'];
               $Fabricante = $_POST['Fabricante'];
               $Origen = $_POST['Origen'];
              // $Fotos = $_POST['Fotos'];
               
               $result = mysqli_query($con,"SELECT * FROM productos ORDER BY ID_producto DESC");
             //  echo $result;
               $row = mysqli_fetch_array($result);

               $ID_producto = $row['ID_producto'] + 1;
               //$date =  date("h:i:sa") ." ". date("Y/m/d");

               $target_dir = "./images/";
               $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
               $uploadOk = 1;
               $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               // Check if image file is a actual image or fake image
               if(isset($_POST["submit"])) {
                   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                   if($check !== false) {
                       $uploadOk = 1;
                   } else {
                       echo "File is not an image.<br>";
                       $uploadOk = 0;
                   }
               }
               // Check if file already exists
               if (file_exists($target_file)) {
                  // echo "Sorry, file already exists.<br>";
                   $uploadOk = 1;
               }
               // Check file size
               if ($_FILES["fileToUpload"]["size"] > 500000) {
                   echo "Sorry, your file is too large.<br>";
                   $uploadOk = 0;
               }
               // Allow certain file formats
               if($imageFileType != "jpg") {
                   echo "Sorry, only PNG files are allowed.<br>";
                   $uploadOk = 0;
               }
               // Check if $uploadOk is set to 0 by an error
               if ($uploadOk == 0) {
                   echo "Sorry, your file was not uploaded.<br>";
               // if everything is ok, try to upload file
               } else {
                 $Fotos = basename($_FILES["fileToUpload"]["name"]);
                 $query =  "INSERT INTO productos VALUES". "(". $ID_producto . ",'$Nombre' , '$Descripcion', $Precio, $Cant_Almacen, '$Fabricante', '$Origen','./images/$Fotos')";
                 $result = mysqli_query($con, $query);

                 if($result){
                   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     echo "The product '$Nombre' with the image file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to the Data Base.<br>";
                   } else {
                       echo "Sorry, there was an error uploading your file.<br>";
                   }
                 }else{
                    echo "Fill all the inputs.";
                 }
               }
             }

           ?>
         </h6>

         <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

           <div class="row">
           
            <!-- p_nombre -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-6">Product Name</label>
                 <div class="col-sm-12">
                   <input type="text" maxlength="30" name="Nombre" class="form-control" placeholder="Enter name">
                 </div>
               </div>
             </div>
            <!-- p_descripcion -->
                <div class="col-xl-6">
                   <div class="form-group">
                 <label class="control-label col-sm-6">Description</label>
                 <div class="col-sm-12">
                   <textarea type="textarea" rows="5" maxlength="200" name="Descripcion" class="form-control" placeholder="Enter a brief description"></textarea>
                 </div>
               </div>
             </div>
              <!-- p_precio -->
              <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-6">Price</label>
                 <div class="col-sm-12">
                   <input type="number" maxlength="11" name="Precio" class="form-control" placeholder="Enter price">
                 </div>
               </div>
             </div>
             <!-- p_cantidad -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-6">Stock</label>
                 <div class="col-sm-12">
                   <input type="number" maxlength="11" name="Cant_Almacen" class="form-control" placeholder="Enter Stock">
                 </div>
               </div>
             </div>
             
            <!-- p_fabricante -->
            <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-6">Company</label>
                 <div class="col-sm-12">
                   <input type="text" maxlength="20" name="Fabricante" class="form-control" placeholder="Enter Company">
                 </div>
               </div>
             </div>

            <!-- p_origen -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-6">Country</label>
                 <div class="col-sm-12">
                   <input type="text" maxlength="20" name="Origen" class="form-control" placeholder="Enter country">
                 </div>
               </div>
             </div>

           

             <!-- file upload-->
              <div class="col-xl-6">
                <div class="form-group">
                  <label class="control-label col-sm-6">Select image to upload:</label>
                  <div class="col-sm-12">
                      <input type="file" name="fileToUpload" id="fileToUpload">
                  </div>
                </div>
              </div>

           

            <!-- Submit -->
             <div class="col-xl-6">
               <div class="form-group">
                 <div class="col-sm-2">
                   <button type="submit" name="submit" class="btn btn-primary btn-block">Insert Product</button>
                 </div>
               </div>
             </div>

           </div>
         </form>
       </div>
     </div>
    <!-- /.container -->