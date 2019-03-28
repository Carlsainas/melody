 <?php  
	class Song{

		private $connection;
		private $id;
		private $mysqliData; //holds the result of the query below
		private $title;
		private $artistId;
		private $albumId;
		private $genre;
		private $duration;
		private $path;


		public function __construct($connection, $id){
			$this->connection = $connection;
			$this->id = $id;

			$query = mysqli_query($this->connection, "SELECT * FROM songs WHERE id = '$this->id'");
			$this->mysqliData = mysqli_fetch_array($query); 

			$this->title =  $this->mysqliData['title'];
			$this->artistId = $this->mysqliData['artist'];
			$this->albumId = $this->mysqliData['album'];
			$this->genre = $this->mysqliData['genre'];
			$this->duration = $this->mysqliData['duration'];
			$this->path = $this->mysqliData['path'];
			//we wont do 'plays' in db becouse value is gonna change
		}

		public function getTitle(){
			return $this->title;
		}
	
		public function getArtist(){
			return new Artist($this->connection, $this->artistId);
		}

		public function getAlbum(){
			return new Album($this->connection, $this->albumId);
		}

		public function getPath(){
			return $this->path;
		}

		public function getDuration(){
			return $this->duration;
		}

		public function getGenre(){
			return $this->genre;			
		}

		public function mysqliData(){
			return $this->mysqliData;
		}
	}	
?> 