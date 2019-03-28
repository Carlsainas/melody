var currentPlaylist = [];
var audioElement;


function Audio(){

	this.currentlyPlaying;
	this.audio = document.createElement('audio');

	this.setTrack = function(src){
		this.audio.src = src;
	}

	this.play = function(){		//play function // before we had to write audioElement.audio.play() in index file
		this.audio.play();
	}

	this.pause = function(){
		this.audio.pause();
	}
}