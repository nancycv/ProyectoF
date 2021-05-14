
<?php
include 'header.php';
?>

 <meta charset="UTF-8">
    <div class="container">
      <!-- Page Heading -->

      <div class="col-lg-12">
        <div class="card mt-4">
        <div class="card-body">
          <h1>User Login</h1>

          <?php
         
            if(isset($_POST["submit"])){
              if(!empty($_POST['ID_usuario']) && !empty($_POST['Contra'])){
                $ID_usuario = $_POST['ID_usuario'];
                $Contra = $_POST['Contra'];

                $statement = "SELECT * FROM usuarios WHERE ID_usuario='$ID_usuario' AND Contra='$Contra'";
                $result = mysqli_query($con, $statement);
                $numrows = mysqli_num_rows($result);

                if($numrows !=0){
                  while($row = mysqli_fetch_array($result)){
                    $dbusername=$row['ID_usuario'];
                    $dbpassword=$row['Contra'];
                  }
                  if($ID_usuario == $dbusername && $Contra == $dbpassword){
                     session_start();
                     $_SESSION['sess_user']=$ID_usuario;
                     //Redirect Browser
                     header("Location:./index.php");
                     if($ID_usuario = '222'){
                        header("Location:./admin.php");
                  
                
                }
                }else{
                  echo "Invalid Username or Password!";
                }
              }

            }else{
              ?>
              <!--Javascript Alert -->
              <script>alert('Required all fields');</script>
              <?php
            }
          }
          ?>

          <form class="form-horizontal" action="" method="post">
            <br>
            <!-- User -->
            <div class="form-group">
              <label class="control-label col-sm-2">ID:</label>
              <div class="col-sm-12">
                <input type="number" name="ID_usuario" class="form-control" id="ID_usuario" placeholder="Enter ID">
              </div>
            </div>
            <!-- Password -->
            <div class="form-group">
              <label class="control-label col-sm-2">Password:</label>
              <div class="col-sm-12">
                <input type="password" name="Contra" class="form-control" id="pwd" placeholder="Enter password">
              </div>
            </div>

            <!-- Submit -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button> &nbsp &nbsp
                <a href="./register.php" class="button">Register</a>
              </div>
            </div>
          </form>
        </div>
      </div>
