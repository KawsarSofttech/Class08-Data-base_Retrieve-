<?php

include 'Connection.php';
$db = new Connection();
$conn = $db->conn;



?>

<!DOCTYPE html>
<head>
	<title>Add a note</title>
<html>
</head>

<body>
	
	<div class="Add" style="background-color: red;">
		<div class="Container" style="text-align: center; background-color: green; width: 95%; margin: auto;">

			<h2 style="text-align: center; font-size: 30px; color: yellowgreen;">Add a note</h2>
			<?php

				if(isset($_POST['submit'])){
					if(!empty($_POST['title']) && !empty($_POST['details']) && !empty($_POST['day'])){
	
						$db->addNote($_POST['title'],$_POST['details'],$_POST['day']);
						
						echo "Note Added!";

					}else{
						echo "All fields must required";
						}
				}

			?>
			<form method="POST" action="" style="text-align: center; padding: 20px;">
				<input type="text" name="title"  placeholder="Title" style="margin-bottom: 5px; padding: 10px; border: 1px solid red; border-radius: 10px;"><br>
				<input type="text" name="day"  placeholder="Date" style="margin-bottom: 5px; padding: 10px; border: 1px solid red; border-radius: 10px;"><br>
				<textarea name="details" placeholder="Details" style="margin-bottom: 5px; padding: 10px; border: 1px solid red; border-radius: 10px;"></textarea><br>
				<input type="submit" name="submit"  value="Add" style="padding: 10px; border: 1px solid red; border-radius: 5px;"><br>
				
			</form>

			<hr>
			<?php

				$results = $db->getAllnotes();
				foreach ($results as $data){
					echo $data['title']."<br>";
					echo $data['details']."<br>";
					echo "<hr>";
				}
	

			?>

			


			
		</div>
		
	</div>



</body>
</html>
