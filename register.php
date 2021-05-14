
<meta charset="UTF-8">
<?php
include 'header.php';
?>
<?php
 
 $user="root";
 $pass="";
 $server="localhost";
 $db="final";
 $con = mysqli_connect($server,$user,$pass,$db);
 
     // Check connection
     if (mysqli_connect_errno()) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }else{
     // echo "si jala";
     }
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Art Gallery</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />
  <link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
    <div class="container">
      <!-- Page Heading -->

      <div class="col-lg-12">
        <div class="card mt-4">
        <div class="card-body">
        <br> <br>
       
          <h1>Crea tu perfil</h1>
          <form class="form-horizontal" action="" method="post">
            <!-- ID -->
            <br>
            <div class="row form-group">
              <label class="control-label col-sm-1">ID:</label>
              <div class="col-sm-6">
                <input type="number" name="ID_usuario" class="form-control" id="email" placeholder="Ingresa ID " >
              </div>
            </div>
            <!-- Nombre -->
            
            <div class="row form-group">
              <label class="control-label col-sm-1">Nombre:</label>
              <div class="col-sm-6">
                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Ingresa Nombre " >
              </div>
            </div>
            <!-- Correo -->
            
            <div class="row form-group">
              <label class="control-label col-sm-1">Email:</label>
              <div class="col-sm-6">
                <input type="email" name="Correo" class="form-control" id="email" placeholder="Ingresa email">
              </div>
            </div>
            <!-- Password -->
            <div class="row form-group">
              <label class="control-label col-sm-1">Contraseña:</label>
              <div class="col-sm-6">
                <input type="password" name="Contra" class="form-control" id="pwd" placeholder="Ingresa password" >
              </div>
            </div>
            <!-- Año-->
            <div class="row form-group">
              <label class="control-label col-sm-1">Fecha de nacimiento:</label>
              <div class="col-sm-6">
                <input type="date" name="Fecha_Nac" class="form-control" id="Fecha_Nac" placeholder="Ingresa Fecha de nacimiento">
              </div>
            </div>

           <!-- Tarjeta-->
           <div class="row form-group">
              <label class="control-label col-sm-1">Tarjeta:</label>
              <div class="col-sm-6">
                <input type="number" name="Tarjeta" class="form-control"  placeholder="Ingresa tu tarjeta" >
              </div>
            </div>
           

            <!-- Postal-->
            <div class="row form-group">
              <label class="control-label col-sm-1">Codigo postal:</label>
              <div class="col-sm-6">
                <input type="number" name="Codigo_Postal" class="form-control" id="email" placeholder="Ingresa código postal" >
              </div>
            </div>


            <!-- Submit -->
            <br>
            <div class=" row form-group">
              <div class="col-sm-offset-2 col-sm-12">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button> &nbsp &nbsp
              <a href="./login.php" class="button">Login</a>
              </div>
            </div>
          </form>
        </div>
      </div>
      

      <?php
        if(isset($_POST["submit"])){
          if(!empty($_POST['ID_usuario']) && !empty($_POST['Nombre']) && !empty($_POST['Correo']) && !empty($_POST['Contra']) && !empty($_POST['Fecha_Nac'])&& !empty($_POST['Tarjeta'])&& !empty($_POST['Codigo_Postal'])){
          $ID_usuario = $_POST['ID_usuario'];
          $Nombre = $_POST['Nombre'];
          $Correo = $_POST['Correo'];
          $Contra = $_POST['Contra'];
          $Fecha_Nac = $_POST['Fecha_Nac'];
          $Tarjeta = $_POST['Tarjeta'];
          $Codigo_Postal = $_POST['Codigo_Postal'];

         

          //Selecting Database
          $query = mysqli_query($con, "SELECT * FROM usuarios");
          $numrows = mysqli_num_rows($query);

            
              //Insert to Mysqli Queryss')";
              $sql = "INSERT INTO usuarios VALUES ('$ID_usuario', '$Nombre', '$Correo', '$Contra', '$Fecha_Nac', $Tarjeta, $Codigo_Postal)";
              $result = mysqli_query($con, $sql);
              //Result Message
              if($result){
                echo "Your Account Created Successfully";
              }
            }}

           
            ?>
            

