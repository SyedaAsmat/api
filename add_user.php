<?php
    $con = mysqli_connect('localhost','root','');

    if(!$con)
    {
        echo 'Not connected to Server';
    }

    if(!mysqli_select_db($con,'api'))
    {
        echo 'Database not Selected';
    }

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $role=$_POST['role'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $sql = "INSERT INTO user (f_name,l_name,role,email,phone,password) VALUES ('$firstname','$lastname','$role','$email','$phone','$password')";
    if(!mysqli_query($con,$sql))
    {
        echo 'Not Inserted';
        header("refresh:2; url=reg.php");
    }
    else
    {
        echo 'Inserted';
    }
    //header("refresh:2; url=login.php");
?>