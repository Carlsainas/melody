<?php 

$songQuery = mysqli_query($connection, "SELECT id FROM songs ORDER BY RAND() LIMIT 5");
$resultArray = array();
while($row = mysqli_fetch_array($songQuery)){
array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray); //convert all to json 

?>

<script>

	$(document).ready(function(){
		currentPlaylist = <?php echo $jsonArray; ?>;
		audioElement = new Audio();
		setTrack(currentPlaylist[0], currentPlaylist, false); //trackId, newPlaylist, play etc //false becouse we wouldn't want our song play straight away when we load the page.
	});


function setTrack(trackId, newPlaylist, play){
	
	$.post("put url here", { songId: trackId }, function(data){ //Ajax call
		console.log(data)
	});


	if(play){
		audioElement.play();
	
	}
}

function playSong(){
	//Took button class names and with the help of jQuery we show/hide buttons
	$(".controlButton.play").hide(); 
	$(".controlButton.pause").show();
	audioElement.play();
}

function pauseSong(){
	$(".controlButton.play").show();
	$(".controlButton.pause").hide();
	audioElement.pause();
}

</script>


<div id="nowPlayingBarContainer">
	<div id="nowPlayingBar">
		<div id="nowPlayingLeft">
		
		<div class="content">
			<span class="albumLink">
				<img class="albumArtwork" src="https://static.makeuseof.com/wp-content/uploads/2012/08/redditguy.jpg">
			</span>
			<div class="trackInfo">
				<span class="trackName">
					<span>Bottle of Water</span>
				</span>
				<span class="artistName">
					<span>Jim Beam</span>
				</span>
				</div>
			</div>
		</div>
	<div id="nowPlayingCenter">
		
		<div class="content playerControls">
			<div class="buttons">

				<button class="controlButton shuffle" title="shuffle">
					<img src="assets/images/icons/shuffle.png" alt="Shuffle">
				</button>
				<button class="controlButton previous" title="previous">
					<img src="assets/images/icons/previous.png" alt="previous">
				</button>
				<button class="controlButton play" title="play" onclick = "playSong()">
					<img src="assets/images/icons/play.png" alt="play">
				</button>
				<button class="controlButton pause" title="pause" onclick = "pauseSong()" style="display: none">
					<img src="assets/images/icons/pause.png" alt="pause">
				</button>
				<button class="controlButton next" title="next">
					<img src="assets/images/icons/next.png" alt="next">
				</button>
				<button class="controlButton repeat" title="repeat">
					<img src="assets/images/icons/repeat.png" alt="repeat">
				</button>

			</div>
			<div class="playbackBar">
				<span class="progressTime current">0.00</span>
				<div class="progressBar">
					<div class="progressBarbg">
						<div class="progress"></div>
					</div>
				</div>
				<span class="progressTime remaining">0.00</span>
			</div>
		</div>

	</div>
	<div id="nowPlayingRight">
		<div class="volumeBar">
			<button class="controlButton volume" title="volume button">
				<img src="assets/images/icons/volume.png" alt="volume">
			</button>
			<div class="progressBar">
				<div class="progressBarbg">
					<div class="progress"></div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>