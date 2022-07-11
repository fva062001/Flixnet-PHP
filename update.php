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
        $query = "UPDATE listing SET name = '$movieName', description = '$movieDescription', image = '$movieImage' WHERE id = '$movieId'";
        $result = $conn->query($query);
        if($result)
        {
            echo json_encode(array('status' => 'success', 'message' => 'Movie updated successfully'));
        }
        else
        {
            echo json_encode(array('status' => 'failure', 'message'=> 'Couldnt update movie'));
        }
    }
    else{
        echo json_encode(array("status" => "dbProblem", "message" => "Couldnt connect to database"));
    }
}

?>
