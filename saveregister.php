<?php
include "databs.php";
session_start();

if(isset($_POST["username"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $email=$_POST["email"];
    
    if($statement=$connect->prepare("SELECT * FROM users WHERE username=:username")){
        $statement->bindParam(":username",$param_username, PDO::PARAM_STR);
        
        $param_username=trim($_POST["username"]);
        
        if($statement->execute()){
            if($statement->rowCount()>=1){
                header("location:register.php?sonuc=usererror");
                exit;
            } else {
                $username = trim($_POST["username"]);
            }
        } else {
            header("location:register.php");
            exit;
        }
        
        $password = trim($_POST["password"]);
        $email = trim($_POST["email"]);

        $insertuser="INSERT INTO users (username,password,email) VALUES ('$username',\"$password\",\"$email\")";
        $connect->exec($insertuser);

        header("location:login.php?sonuc=registersucces");
        }

    
    
}

?>