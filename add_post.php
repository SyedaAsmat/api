<?php
    function console_log($output,$with_script_tags=true){
        $js_code = 'console.log('.json_encode($output,JSON_HEX_TAG).');';
        if($with_script_tags){
            $js_code='<script>'.$js_code.'</script>';
        }
        echo $js_code;
    }

    $con = mysqli_connect('localhost','root','');

    if(!$con)
    {
        echo 'Not connected to Server';
    }

    if(!mysqli_select_db($con,'api'))
    {
        echo 'Database not Selected';
    }

    if(!isset($_SESSION)){
        session_start();
    }

    $title=$_POST['title'];
    $post=$_POST['post'];

    $email = isset($_GET['email'])?$_GET['email']:"";

			$sql="SELECT email FROM user WHERE email='" . $_SESSION["email"] . "'";
			if ($result = mysqli_query($con, $sql)) { 
    			if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_array($result)) {
						$email = $row["email"];
					}
				}else { 
        			echo "User id not found!!"; 
    			}
			}else { 
    			echo "ERROR: Could not able to execute $sql. ".mysqli_error($con); 
			}

    $sql = "INSERT INTO article (uemail,title,post) VALUES ('$email','$title','$post')";
    if(!mysqli_query($con,$sql))
    {
        echo 'Not Inserted';
        header("refresh:2; url=my_post.php");
    }
    else
    {
        //echo 'Inserted';
        header("refresh:2; url=my_post.php");
    }
?>