<?php 
include 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $movieId = $_POST['id'];
    $movieName = $_POST['name'];
    $movieDescription = $_POST['description'];
    $movieImage = $_POST['image'];
    $conn = openConn();
   
    if($conn = openConn())
    {
        $query = "INSERT INTO listing (id, name, description, image) VALUES ('$movieId', '$movieName', '$movieDescription', '$movieImage')";
        $result = $conn->query($query);
        if($result)
        {
            echo json_encode(array('status' => 'success', 'message' => 'Movie added successfully'));
        }
        else
        {
            echo json_encode(array('status' => 'failure', 'message'=> 'Couldnt insert movie'));
        }
    }
    else{
        echo json_encode(array("status" => "dbProblem", "message" => "Couldnt connect to database"));
    }
}

?>
