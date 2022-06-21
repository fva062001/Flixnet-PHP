<?php
session_start();
if($_POST){
  $_SESSION['tempUsername'] = $_POST['username'];
  $_SESSION['tempPassword'] = $_POST['password'];
  $tempPassword = $_POST['password'];
  $tempUsername = $_POST['username'];
  if(file_exists("./Users/${tempUsername}.txt"))
  {
      $tempVar = file_get_contents("./Users/${tempUsername}.txt");
      if($tempVar == $tempPassword)
      {
        header("Location:./main.php");
      }
      else{
        echo '
        <div class="audun_warn">
           <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
          Incorrect Password
        </div>';
      }
  } 
  else
  {
    $newFile = fopen("./Users/${tempUsername}.txt",'w');
    fwrite($newFile, $tempPassword);
    fclose($newFile);
    echo '<div class="audun_success">
    <i class="fa fa-check-circle" aria-hidden="true"></i>
      Usuario Registrado 
    </div>';

  }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a6948756a2.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-4 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your credentials!</p>




                <form id="my-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div style="width: 80%; margin-left:auto; margin-right:auto;" class="form-outline form-white mb-4">
                <input name="username" type="text" id="typeEmailX" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Username</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input name="password" style="width: 80%; margin-left:auto; margin-right:auto;" type="password" id="typePasswordX" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>