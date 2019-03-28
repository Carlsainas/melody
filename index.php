<?php include("includes/header.php"); ?>

<h1 class="pageHeadingBig">Get better recommendations the more you listen</h1>
<div class="gridViewContainer">
	
<?php 
$albumQuery = mysqli_query($connection, "SELECT * FROM albums ORDER BY RAND() LIMIT 5");
while($row = mysqli_fetch_array($albumQuery)){

	echo "<div class = 'gridViewItem'>
		<a href = 'album.php?id= ". $row['id'] . "'>
			<img src = '" . $row['artworkPath'] . "'>

			<div class = 'gridViewInfo'>"
			. $row['title'] .
			"</div>
		</a>
	</div>";


}

?>
	
</div>


<?php include("includes/footer.php"); ?>
				

		