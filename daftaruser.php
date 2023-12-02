<?php include("config.php"); ?>


<!DOCTYPE html>
<html>

	<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Full Name</th>
            <th>username</th>
			<th>Email</th>
	    	<th>Password</th>

		</tr>
	</thead>
	<tbody>

		<?php
		$query = pg_query("SELECT * FROM users");



		while($user = pg_fetch_array($query)){
			echo "<tr>";

			echo "<td>".$user['id']."</td>";
			echo "<td>".$user['fullname']."</td>";
			echo "<td>".$user['username']."</td>";
			echo "<td>".$user['email']."</td>";
			echo "<td>".$user['password']."</td>";

			echo "<td>";
			echo "<a href='hapus.php?id=".$user['id']."'>Hapus </a><br>";
		
			echo "<a href='formedit.php?id=".$user['id']."'>Edit</a>";
			echo "</td>";


			echo "</tr>";

			}


		?>
