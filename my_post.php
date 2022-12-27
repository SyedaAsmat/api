<?php include('w_header.php');
?>
<html>
    <head>
        <h1 Align="center">Articles</h1>
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

            $sql = "SELECT * FROM article WHERE uemail='" . $_SESSION["email"] . "'"; 
			if ($res = mysqli_query($conn, $sql)) { 
    		if (mysqli_num_rows($res) > 0) { 
        	echo "<br><br><table cellpadding=9 cellspacing=0 align=center border=0>"; 
					echo "<tr>";
            ?>
            <form Align="center">
			<?php 
                echo "<th>Title</th>";
				echo "<th>Post</th>";
                ?>
                <td><button class="button"><a href="new_post.php" name="">Add</a></button></td>
                <?php
      		    echo "</tr>";
                while ($row = mysqli_fetch_array($res)) { 
                echo "<tr>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['post']."</td>";
            ?>
            <td><button class="button"><a href="edit_post.php?id=<?php echo $row['uemail'] ?>" name="">Edit</a></button></td>
		    <td><button class="button"><a href="del_post.php?id=<?php echo $row['aid'] ?>" name="">Remove</a></button></td>
		</form>
        <?php
    echo "</tr>";
}
echo "</table>";
            }
        }
        else{
            print "<p align='center'>Sorry, No match found for your search result..!!!</p>";
        }

    ?>
    </body>
</html>