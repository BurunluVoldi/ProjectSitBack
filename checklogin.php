<?php 
include "databs.php";
session_start();

if(isset($_POST["username"])){
    $username=$_POST["username"];
    $formpassword=$_POST["password"];
    
    if($statement=$connect->prepare("SELECT * FROM users WHERE username=:username")){
        $statement->bindParam(":username",$param_username, PDO::PARAM_STR);
        
        $param_username=trim($_POST["username"]);
        $statement->execute();
        
        if($result = $statement->fetch()){
            $id=$result["id"];
            $username = $result["username"];
            $password = $result["password"];
            
            if($password == $formpassword){
                $message="logged in successfully";
                $_SESSION["message"]=$message;
                $loggedin="OK";
                $_SESSION["loggedin"]=$loggedin;
                $_SESSION["id"]=$result["id"];
                header("location:homepage.php");
                exit;
            } else {
                if(!isset($_SESSION["attempt"])){
                    $_SESSION["attempt"]=0;
                } else {
                    $_SESSION["attempt"]+=1;
                }
                header("location:login.php?sonuc=passerror");
                exit;
            }
        } else {
            header("location:login.php?sonuc=usererror");
            exit;
        }
    }
}

?>