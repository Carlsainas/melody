 <?php  
	class Album{

		private $connection;
		private $id;
		private $title;
		private $artistId;
		private $genre;
		private $artworkPath;


		public function __construct($connection, $id){
			$this->connection = $connection;
			$this->id = $id;

			//so we get all the data from db

			$query = mysqli_query($this->connection, "SELECT * FROM albums WHERE id = '$this->id'");
			$album = mysqli_fetch_array($query);

			//sign the data
			$this->title = $album['title'];
			$this->artistId = $album['artist'];
			$this->genre = $album['genre'];
			$this->artworkPath = $album['artworkPath'];
		}

		public function getTitle(){
			return $this->title;
		}

		public function getArtist(){
			return new Artist($this->connection, $this->artistId);
		}

		public function getGenre(){
			return $this->genre;
		}

		public function getArtworkPath(){
			return $this->artworkPath;
		}

		public function getNumberOfSongs(){
			$query = mysqli_query($this->connection, "SELECT * FROM songs WHERE album = '$this->id'");
			return mysqli_num_rows($query);
		}

		public function getSongIds(){
			$query = mysqli_query($this->connection, "SELECT id FROM songs WHERE album = '$this->id' ORDER BY albumOrder ASC"); //ascending album order "DESC" would be other way around
			$array = array();
			while($row = mysqli_fetch_array($query)){
				array_push($array, $row['id']);
			}
			return $array;

		}
	}
?> 