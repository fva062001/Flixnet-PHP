<?php
session_start();

$item = $_GET['item'];
$contents=file_get_contents("./UsersRegistry/${item}/File.txt");

if($_POST){
    $ready = rmdir("./UsersRegistry/${item}/");
    echo $ready;
        header("Location:./main.php");
        echo '<div class="audun_success">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
          Folder deleted
        </div>';
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
              <h2 class="fw-bold mb-2 text-uppercase">Text</h2>
              <form id="my-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <textarea style="border-radius: 8px; margin-bottom: 30px;" name="" id="" cols="30" rows="10"><?php
                    $lines=explode("\n",$contents);
                    foreach($lines as $line){
                     echo $line;
                    }
                ?></textarea>
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Delete</button>
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