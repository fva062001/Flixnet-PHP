<?php 
    include('./db.php');
    session_start();
    $user = $_GET['user'];
    $list = false;
    $conn = openConn();
    $result = $conn->query("SELECT * FROM listing");
    if($result->num_rows > 0){
        $list = true;
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a6948756a2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Flixnet</title>
</head>
<body style="background-color: black;">
<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid" style="margin-left: 2%; width:80%;">
    <a class="navbar-brand" href="#">
      <img src="./img/logo.png" alt="" width="50" height="40">
    </a>
    <div style="height:50px;">
      <p style="color: grey; margin:0;">Welcome back <?php echo $user ?> !</p>
    <a class="navbar-brand" href="./login.html">
      <h6 style="color: grey;">Logout</h6>
    </a>
    </div>
  </div>
</nav>
<div class="main_container">
        <main class="p-1">
            <?php
                if($list === TRUE){
                    echo '<div class="row">';
                    while($data = $result->fetch_assoc()){
                        $id = $data['id'];
                        $title = $data['name'];
                        $image = $data['image'];
                        $description = $data['description'];
                        echo ' 
                        
                    <div style="width: 15rem; margin-top:20px; margin-right:5px; margin-left:5px;">
                    <button style="background-color: Transparent; max-width: 300px;"  onclick="goPreview('.$data['id'].')">
                    <img class="card-img-top" style="margin-left:auto; margin-right:auto; padding-top:25px;" src="./img/'.$image.'" alt="Card image cap">
                    </button>
                    </div>';
                    }
                    echo '</div>';
                }
            ?>
            
        </main>
    </div>
    <script>
        function goPreview(data){
            var response = String(data);
            window.location.href = `./moviePreview.php?id=${response}`;
        }
    </script>
</body>
</html>