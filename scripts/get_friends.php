<?php
	$u_id= $_SESSION['u_id'];
	//connect to the database
	require_once __dir__ . '/db_connect.php';
	$mysqli = connect();

	
	$query="SELECT * FROM user WHERE u_id IN
			(SELECT u_idf FROM friend WHERE u_id=$u_id)";
	$result = $mysqli->query($query);
	if($result !== false && $result->num_rows>0) { 
		while($row=$result->fetch_assoc())
		{
			?>
			<div  class="col-lg-6 center"  id="search_result">
				<div class='col-lg-2'>
					<img src="res/default_profile.jpg" /> 
				</div>
				<div class='col-lg-7'>
					<a href="profile.php?u_id=<?=$row['u_id']?>"><p><?=$row['first_name']?> <?=$row['last_name']?></p></a>
					<p><?=$row['email']?></p>
				</div>
				
				
				<div class='col-lg-3'>
				
				<a href="scripts/unfriend.php?u_id=<?=$row['u_id']?>&redirect=friends">
					<button type='submit' class='btn btn-success'>Friends</button> 
				</a>
				
				</div>
			</div>
			<?php
		} // endwhile
	} else {
		// ??
	}
?>