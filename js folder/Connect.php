<?php
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Userid = $_POST['Userid'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $Mobilenumber = $_POST['Mobilenumber'];

    //database connection

    $conn = new mysqli('localhost','root','','cofeex');
    if($conn->connect_error){
        die('Connection Failed :' .$conn->connect_error);
    }
    
    else{
        $stmt = $conn->prepare("insert into register(FirstName,LastName,userid,email,password,birthday,Mobilenumber)
        values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssissi",$FirstName,$LastName,$userid,$email,$password,$birthday,$Mobilenumber);
        $execval = $stmt->execute();
        echo $execval;
        echo "registration successful....";
        echo "please go to main page";
        $stmt->close();
        $conn->close();
    }
?>