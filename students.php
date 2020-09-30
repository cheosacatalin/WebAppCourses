<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Student Registration System | Register</title>
    <style type="text/css">
    	#students{
    		font-family: Arial, Helvetica, sans-serif;
    		width: 100%;
    	}
    	#students td, th{
    		border: 1px solid #ddd;
    		padding: 8px;
    	}

    	#students tr:nth-child(even){
    		background: #c6c9ce;
    	}

    	#students tr:hover{
    		background: #ddd;
    	}

    	#students th{
    		padding: 12px 0;
    		text-align: left;
    		background: #008F95;
    		color: white;
    	}
    </style>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="brand">
          <h1><span class="clujschool">ClujSchool</span> Student Registration</h1>
        </div>
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="register.html">Register</a></li>
            <li><a href="view.html">View</a></li>
            <li class="actual"><a href="students.php">Students</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <section id="subscribe">
      <div class="container">
        <h1>Subscribe for news</h1>
        <form>
          <input type="email" placeholder="Enter email address">
          <button type="submit" class="subscribebutton">Subscribe</button>
        </form>
      </div>
    </section>

   <section id="continut">
      <div class="container">
        <article id="articol">
          <h1 class="h1-titlul">Registered Students</h1>
           	
        <?php 
		    // Prepare variables for db connection
			$serverName = "localhost";
			$userName = "root";
			$password = "";
			$dbName = "admin";

			// Create connection
			$conn = new mysqli($serverName,$userName,$password,$dbName);

			// Check connection
			if($conn->connect_error){
				die("Connection failed".$conn->connect_error);
			}

			$query = mysqli_query($conn, "SELECT * FROM students");
        ?>
        <table id="students">
        	<tr>
        		<th>ID</th>
        		<th>First Name</th>
        		<th>Last Name</th>
        		<th>Address</th>
        		<th>Age</th>
        	</tr>

        	<?php 
        		while($row = mysqli_fetch_array($query)){
        			echo "<tr>";
        			echo "<td>".$row['id']."</td>";
        			echo "<td>".$row['firstname']."</td>";
        			echo "<td>".$row['lastname']."</td>";
        			echo "<td>".$row['address']."</td>";
        			echo "<td>".$row['age']."</td>";
        			echo "/<tr>";
        		}
        		mysqli_close($conn);
        		


        	 ?>
        </table>


        </article>
      </div>
	</section>




    <footer>
      <p>ClujSchool, Copyright &copy; 2017</p>
    </footer>
  </body>
</html>
