<?php 
include 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $movieId = $_POST['id'];
    $conn = openConn();
    if($conn = openConn())
    {
        $query = "DELETE FROM listing WHERE id = '$movieId'";
        $result = $conn->query($query);
        if($result)
        {
            echo json_encode(array('status' => 'success', 'message' => 'Movie deleted successfully'));
        }
        else
        {
            echo json_encode(array('status' => 'failure', 'message'=> 'Couldnt delete movie'));
        }
    }
    else{
        echo json_encode(array("status" => "dbProblem", "message" => "Couldnt connect to database"));
    }
}

?>
