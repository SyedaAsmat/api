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

    $uid=$_POST['uid'];
    $aid=$_POST['aid'];
    $firstname=$_POST['f_name'];
    $comment=$_POST['comment'];

    $sql = "INSERT INTO comment (uid,aid,f_name,comment) VALUES ('$uid','$aid','$firstname','$comment')";
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