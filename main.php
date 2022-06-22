<?php   
    session_start();
    $username = $_SESSION['tempUsername'];
    if($_POST){
      $tempText = $_POST['anotation'];
      $date = date('ymd_his');
      $nomenclature =$username . '_' . $date;
      echo($tempText);
      mkdir("./UsersRegistry/$nomenclature");
      $newFile = fopen("./UsersRegistry/${nomenclature}/File.txt",'w');
      fwrite($newFile, $tempText);
      fclose($newFile);

      if(isset($_FILES['image'])){
        echo 'entre';
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"./UsersRegistry/".$file_name);
           echo '<div class="audun_success">
           <i class="fa fa-check-circle" aria-hidden="true"></i>
           Files Registered 
           </div>';
        }else{
           print_r($errors);
        }
     }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
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
              <h2 class="fw-bold mb-2 text-uppercase">Welcome: <?php echo $username ?></h2>
                <form id="my-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div style="width: 80%; margin-left:auto; margin-right:auto;" class="form-outline form-white mb-4">
                <textarea style="margin-top:20px ;" class="form-control" name="anotation" id="comment" cols="30" rows="5"></textarea>
                <label class="form-label" for="comment">Insert a text here</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input name="image" style="width: 80%; margin-left:auto; margin-right:auto;" type="file" id="file" class="form-control form-control-lg" />
                <label class="form-label" for="file">Insert a file here</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Upload</button>
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