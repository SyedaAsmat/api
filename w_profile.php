<html>
    <head>
        <?php include('w_header.php');?>
        <h2 Align="center">User Profile</h2>
    </head>
    <body>
    <?php  
			$conn = mysqli_connect("localhost", "root", "", "api"); 
	  
			if ($conn == false) { 
				die("ERROR: Could not connect. ".mysqli_connect_error()); 
			}	
		
			if(!isset($_SESSION)){
				session_start();
			}

			$sql="SELECT * FROM user WHERE email='" . $_SESSION["email"] . "'";
			if ($res = mysqli_query($conn, $sql)) { 
    			if (mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_assoc($res)) {
						$firstname 	= $row["f_name"];
						$lastname	= $row["l_name"];
                        $role = $row["role"];
					}
				}else { 
        			echo "User not found!!"; 
    			}
			}else { 
    			echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
			}
			mysqli_close($conn);
		?>

		<?php  
			$conn = mysqli_connect("localhost", "root", "", "api"); 
	  
			if ($conn == false) { 
				die("ERROR: Could not connect. ".mysqli_connect_error()); 
			}
		
				if (isset($_POST['Update'])) {
					$firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
					$role=$_POST['role'];
					if(mysqli_query($conn,"UPDATE user SET f_name='".$firstname."',l_name='".$lastname."', role='".$role."' WHERE email='" . $_SESSION["email"] . "'")){
						echo "<script>alert('Record Updated Successfully!!')</script>";
						//header("Location:my_appoint.php");
					}
					else{
						echo "<script>alert('Failed to Update the Record!!')</script>";
					}
				}
		?>
        <form method="post" Align="center" name="profile" enctype="multipath/form-data">
			<table Align="center" cellspacing="3" cellpadding="2">
                <tr>
                    <th><Label>First Name</Label> </th>
                    <td><input  class="" name="firstname" maxlength="10" placeholder=" Your First Name" autocomplete="off"></td>
                </tr>
                <tr>
                    <th><Label>Last Name</Label></th>
                    <td><input class="" name="lastname" maxlength="10" autocomplete="off"> </td>
                </tr>
                <tr>
                    <th><Label>Role</Label></th>
                    <td>
                        <select class="input-field" name="role">
                            <option value="default">---Select---</option>
                            <option value="Writer">Writer</option>
                            <option value="Editor">Editor</option>
                        </select>
                    </td>
                </tr>	
			</table>
			<button class="button" name="Update" type="submit" Align="center">Confirm</button>
		</form>
    </body>
</html>