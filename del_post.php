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

    $sql = "DELETE FROM article WHERE aid='{$_REQUEST['id']}'"; 
    if(mysqli_query($con, $sql)){ 
        echo "<script>alert('Record was deleted successfully.')</script>"; 
    }  
    else{ 
        echo "ERROR: Could not able to execute $sql. ". mysqli_error($con); 
    } 
    mysqli_close($con); 
    header("refresh:2; url=my_post.php");
?> 