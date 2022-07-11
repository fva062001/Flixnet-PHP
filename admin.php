<?php 
$statement = $_GET['admin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flixnet admin</title>
    <link rel="stylesheet" href="styleAdmin.css">\
    <script src="https://kit.fontawesome.com/a6948756a2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="login-form text-center" style="height: 700px !important;">
        <div class="row">
            <div class="col-12 title">
                <h1>Admin Panel</h1>
            </div>
            <div class="col-12">
                <div class="mb-4">
                    <input type="text" id="id" class="form-control" placeholder="Movie Id"/>
                </div>
            </div>
            <div class="col-12">
                <div class="form-outline mb-4">
                    <input type="text" id="name" class="form-control" placeholder="Movie Name"/>
                  </div>
            </div>
            <div class="col-12">
                <div class="mb-4">
                    <input type="text" id="imgPath" class="form-control" placeholder="Movie Image Path"/>
                </div>
            <div class="col-12">
                <div class="form-outline mb-4">
                    <textarea class="form-control" style="width:70% ; margin-left:15%;" id="description" rows="3" placeholder="Movie Description"></textarea>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-success" style="width: 30% !important; margin-left:-25px !important;margin-bottom: 10px !important;" id="insertBtn" type="button">Insert</button>
            </div>
            <div class="col-12">
                <button class="btn btn-danger" style="width: 30% !important; margin-left:-25px !important;margin-bottom: 10px !important;" id="deleteBtn" type="button">Delete</button>
            </div>
            <div class="col-12">
                <button class="btn btn-warning" style="width: 30% !important; margin-left:-25px !important;margin-bottom: 10px !important;" id="updateBtn" type="button">Update</button>              
            </div>
            <div class="col-12">
                <button class="btn btn-dark" style="width: 30% !important; margin-left:-25px !important;margin-bottom: 10px !important;" id="logoutBtn" type="button">Logout</button>              
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script>

window.onload = function() {
    var statement = String(<?php echo $statement ?>);
    if(statement !== "true"){
        alert("You are not authorized to access this page");
        window.location.href = "./index.php";
    }
    
}

    document.getElementById("insertBtn")
    .addEventListener("click", function(){
        var id = document.getElementById("id").value;
        var name = document.getElementById("name").value;
        var description = document.getElementById("description").value;
        var imgPath = document.getElementById("imgPath").value;
        $.ajax({
            url: "insert.php",
            type: "POST",
            data: {
                id: id,
                name: name,
                description: description,
                image: imgPath
            },
            success: function(data){
                var response = JSON.parse(data);
                alert(response.message);
            }
        });
    });

    document.getElementById("logoutBtn")
    .addEventListener("click", function(){
        window.location.href = "./login.html";
    });

    document.getElementById("deleteBtn")
    .addEventListener("click", function(){
        var id = document.getElementById("id").value;
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                id: id
            },
            success: function(data){
                var response = JSON.parse(data);
                alert(response.message);
            }
        });
    });

    document.getElementById("updateBtn")
    .addEventListener("click", function(){
        var id = document.getElementById("id").value;
        var name = document.getElementById("name").value;
        var description = document.getElementById("description").value;
        var imgPath = document.getElementById("imgPath").value;
        $.ajax({
            url: "update.php",
            type: "POST",
            data: {
                id: id,
                name: name,
                description: description,
                image: imgPath
            },
            success: function(data){
                var response = JSON.parse(data);
                alert(response.message);
            }
        });
    });


</script>
</body>
</html>