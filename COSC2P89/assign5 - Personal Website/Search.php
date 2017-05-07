<?php
	mysql_connect('localhost','root','password') or die('Error, Database not found!');
	mysql_select_db('rb11vg') or die('Error, Database not found!');
	
	if(isset($POST['search'])){
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
		
		$query = mysql_query("SELECT * FROM Song WHERE Song_Title LIKE '%$searchq%'") or die("Error, Could not search!");
		$count = mysql_num_rows($query); //how many rows it picks up
		if($count == 0){
			$output = 'There was no search results.';
		}else{
			while($row = mysql_fetch_array($query)){
				$stitle = $row['Song_Title'];
				$id = $row['Song_ID'];
				
				$output .= '<div> = '.$stitle.' '.$id.'</div>';
			}
		}
	}
?>