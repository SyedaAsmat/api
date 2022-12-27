<html>
    <head>
        
        <?php include('w_header.php');
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

    $email = isset($_GET['email'])?$_GET['email']:"";

			$sql="SELECT email FROM user WHERE email='" . $_SESSION["email"] . "'";
			if ($result = mysqli_query($con, $sql)) { 
    			if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$email = $row["email"];
					}
				}else { 
        			echo "User id not found!!"; 
    			}
			}else { 
    			echo "ERROR: Could not able to execute $sql. ".mysqli_error($con); 
			}
        ?>
    </head>
    <body>
    <h2 Align="center">Add New Post</h2>
    <form name="add_post" method="post" action="add_post.php" enctype="multipart/form-data" Align="center">
        <table Align="center" cellpadding="5" cellspacing="5">
            <tr>
                <th><Label></Label> </th>
                <td><input  class="" type="hidden" name="email" maxlength="15" placeholder="email" autocomplete="off" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <th><Label>Title</Label> </th>
                <td><input  class="" name="title" maxlength="15" placeholder="Post Title" autocomplete="off"></td>
            </tr>
            <tr>
                <th><Label>Post</Label></th>
                <td><input class="" name="post" maxlength="200" placeholder="Post" autocomplete="off"> </td>
            </tr>
        </table>
        <button class="" type="submit" name="submit">Submit</button>
    </form>
    </body>
</html>