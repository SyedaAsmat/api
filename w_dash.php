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

            $sql = "SELECT * FROM article"; 
			if ($res = mysqli_query($conn, $sql)) { 
    		if (mysqli_num_rows($res) > 0) { 
        	echo "<br><br><table cellpadding=9 cellspacing=0 align=center border=0>"; 
					echo "<tr>"; 
					echo "<th>Title</th>";
					echo "<th>Post</th>";
      		echo "</tr>";
              while ($row = mysqli_fetch_array($res)) { 
                echo "<tr>";
                echo "<td>".$row['title']."</td>";
    echo "<td>".$row['post']."</td>"; 
    
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