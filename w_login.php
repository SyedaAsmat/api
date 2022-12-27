<?php session_start();  ?>
<html>
	<head>
        <h2 Align="center">Writer Login</h2>
    </head>
    <body>
		<form method="post" name="Doctor Login" enctype = "multipart/form-data" Align="center">
            <table Align="center" cellpadding="2" cellspacing="3">
                <tr>
                    <th><Label>Email</Label></th>
                    <td><input class="" name="email" maxlength="20" placeholder="Your Email" autocomplete="off"> </td>
                </tr>
                <tr>
                    <th><Label>Password</Label></th>
                    <td><input class="" name="password" type="password" maxlength="10" placeholder="Your Password" autocomplete="off"> </td>
                </tr>
            </table>
            <button class="button" name="submit" type="submit" Align="center">Login</button>
            <button class="button" name="back" type="back" Align="center"><a href="main_login.php">Main Log In</a></button>
        </form>
        <?php 
		$_SESSION['user']=""; 
            $conn = mysqli_connect("localhost", "root", "", "api"); 
  
            if ($conn == false) { 
                die("ERROR: Could not connect. ".mysqli_connect_error()); 
            }  

            if(!isset($_SESSION)){
                session_start();
                }

			if(isset($_POST["submit"])){
                $sql= "SELECT * FROM user WHERE email= '" . $_POST["email"]."' AND password= '" . $_POST["password"]."'";
                if ($res = mysqli_query($conn, $sql)) { 
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_array($res)) {
                            $_SESSION["email"]= $_POST["email"];
                            $_SESSION['password']= $_POST["password"];
                            echo "<script>location.replace('w_profile.php');</script>";
                        } 
                    }else {
                            echo "<script>Invalid username or password or role is editor</script>";
                        }
                } else { 
                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                }
            }	
            mysqli_close($conn);		
		?>
    </body>
</html>