<?php 
    $id = $_GET['id'];
    include('./db.php');
    if($conn = openConn())
    {
        $query = "SELECT * FROM listing WHERE id = '$id'";
        $result = $conn->query($query);
        if($result)
        {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $image = $row['image'];
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Flixnet Login</title>
                <link rel="stylesheet" href="./stylePreview.css">
                <script src="https://kit.fontawesome.com/a6948756a2.js" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
            </head>
            <body>
                
            <div class="login-form" style="width:800px !important;">
                    <div class="row">
                        <div class="col-6">
                            <img src="./img/'.$image.'" width="70%" style="margin-left:10px;">
                        </div>
                        <div class="col-6">
                            <h1>'.$name.'</h1>
                            <p>'.$description.'</p>
                        </div>
                    </div>
                </div>
            </body>
            </html>';

        }
        else
        {
            echo "Couldnt get movie";
        }
    }
    else
    {
        echo "Couldnt connect to database";
    }

?>