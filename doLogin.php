<?php 
include 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = openConn();
   
    if($conn = openConn())
    {
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);
        if($result->num_rows > 0)
        {
            if($username === "admin")
            {
                echo json_encode(array('status' => 'success', 'admin' => true));
            }
            else{
                echo json_encode(array('status' => 'success', 'admin' => false));
            }
        }
        else
        {
            echo "Invalid username or password";
        }
    }
    else{
        echo json_encode(array("status" => "db","username" => $username, "password" => $password));
    }
}

?>
