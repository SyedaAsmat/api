<html>
	<head>
    	<title>Edit Post</title>
    	<?php
            include('w_header.php');

			$conn = mysqli_connect("localhost", "root", "", "api"); 
	  
			if ($conn == false) { 
				die("ERROR: Could not connect. ".mysqli_connect_error()); 
			}	
		
			if(!isset($_SESSION)){
				session_start();
			}

            $sql="SELECT * FROM article WHERE uemail='" . $_SESSION["email"] . "'";
			if ($res = mysqli_query($conn, $sql)) { 
    			if (mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_assoc($res)) {
						$title 	= $row["title"];
						$post 	= $row["post"];
					}
				}else { 
        			echo "Posts not found!!"; 
    			}
			}else { 
    			echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
			}
		
			if (isset($_POST['Update'])) {
				$title=$_POST['title'];
				$post=$_POST['post'];
				if(mysqli_query($conn,"UPDATE article SET title='".$title."' ,post='".$post."' WHERE uemail='" . $_SESSION["email"] . "'")){
					echo "<script>alert('Post Updated Successfully!!')</script>";
					header("Location:my_post.php");
				}
				else{
					echo "<script>alert('Failed to Update the Record!!')</script>";
				}
			}
			mysqli_close($conn);
		?>
        <form method="post" Align="center" name="edit_post" enctype="multipath/form-data">
			<table Align="center" cellspacing="3">
                <tr>
                    <th><Label>Title</Label></th>
                    <td><input class="" type="text" name="title" value="<?php echo $title;?>"/></td>
                </tr>
                <tr>
                    <th><Label>Post</Label></th>
                    <td><input class="" type="text" name="post" value="<?php echo $post;?>"/></td>
                </tr>
			</table>
			<button class="button" name="Update" type="submit">Confirm</button>&nbsp
			<button class="button" name="cancel" type="cancel" ><a href="my_post.php">Cancel</a></button>
		</form>