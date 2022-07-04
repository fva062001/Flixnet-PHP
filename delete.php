<?php 
ini_set("display_errors",1);
error_reporting(E_ALL);
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $file = isset($_POST['name']) ? $_POST['name'] : null;
        $url = "./UsersRegistry/". $file;
        if( unlink($url) ){
            echo json_encode($file);
        }else{
            print_r("gg");
        }
    }
?>