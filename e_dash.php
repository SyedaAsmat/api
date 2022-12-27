<html>
    <head>
        <?php include('e_header.php');?>
        <h2 Align="center">Articles</h2>
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

            $aid = isset($_GET['aid'])?$_GET['aid']:"";

            $sql1="SELECT * FROM article";
			if ($res = mysqli_query($conn, $sql1)) { 
    			if (mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_array($res)) {
						$aid 	= $row["aid"];
					}
				}else { 
        			echo "<scrip>alert('No article records found!!')</script>"; 
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

if(!isset($_SESSION)){
session_start();
}
            $email = isset($_GET['email'])?$_GET['email']:"";

            $sql2="SELECT * FROM user where email='" . $_SESSION["email"] . "'";
			if ($res = mysqli_query($conn, $sql2)) { 
    			if (mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_array($res)) {
						$uid 	= $row["uid"];
                        $firstname 	= $row["f_name"];
					}
				}else { 
        			echo "alert('No user records found!!')"; 
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

if(!isset($_SESSION)){
session_start();
}
            $sql3 = "SELECT * FROM article"; 
			if ($res = mysqli_query($conn, $sql3)) { 
    		if (mysqli_num_rows($res) > 0) { 
                echo "<form align=cnter>";
        	echo "<br><br><table cellpadding=9 cellspacing=0 align=center border=0>"; 
					echo "<tr>"; 
					echo "<th>Title</th>";
					echo "<th>Post</th>";
      		echo "</tr>";
              while ($row = mysqli_fetch_array($res)) { 
                echo "<tr>";
                echo "<td>".$row['title']."</td>";
    echo "<td>".$row['post']."</td>"; 
    ?>
    <tr>
        <form action="add.comment.php">
        <input name="uid" id="uid" value="<?php echo $uid?>" type="hidden">
        <input name="aid" id="aid" value="<?php echo $aid?>" type="hidden">
        <input name="f_name" id="firstname" value="<?php echo $firstname?>" type="hidden">
    <td><input name="comment" id="comment" placeholder="Your Comment Please!" required></td>
    <td><button type="submit" value="Send Us" name="Submit">Comment</button></td>
    </form>
    </tr>
<?php
    echo "</tr>";
}

echo "</table>";

echo "</form>";
            }
        }
        else{
            print "<p align='center'>Sorry, No match found for your search result..!!!</p>";
        }

    ?>
    </body>
</html>