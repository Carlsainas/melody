 <?php  
	class Account{

		private $connection;
		private $errorArray; //Creating error array

		public function __construct($connection){
			$this->connection = $connection;
			$this->errorArray = array();	
		}

		public function login($un, $pw){

			$pw = md5($pw);
			
			$query = mysqli_query($this->connection, "SELECT * FROM users WHERE username = '$un' AND password = '$pw'");

			if(mysqli_num_rows($query) == 1){
				return true;
			}
			else{
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}
		}

		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
			$this->validateUsername($un);
			$this->validateFirstname($fn);
			$this->validateLastname($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);

			if(empty($this->errorArray) == true){   //checking if error array is "empty".. 
				//insert into db
				return $this->insertUserDetails($un, $fn, $ln, $em, $pw);	
			}
			else{
				return false;
			}
		}

		public function getError($error){
			if(!in_array($error, $this->errorArray)){ //if something is not valid, 
				$error = "";							//returns it back empty
			}
			return "<span class='errorMessage'>$error</span>";
		}

		private function insertUserDetails($un, $fn, $ln, $em, $pw){
			$encryptedPw = md5($pw); //encrypts password 
			$profilePic = "assets/images/profile-pics/minpic.jpg";
			$date = date("Y-m-d");

			$result = mysqli_query($this->connection, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em','$encryptedPw', '$date', '$profilePic')"); //id,un,fn,ln,em,pw,date,pic 
			return $result;
		}

		private function validateUsername($un){ 	
			if(strlen($un) > 25 || strlen($un) < 5){ //strlen = string.lenght basically
				array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}
			$checkUsernameQuery	= mysqli_query($this->connection, "SELECT username FROM users WHERE username = '$un'");
			if(mysqli_num_rows($checkUsernameQuery) != 0){
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			}
			
		}

		private function validateFirstname($fn){
			if(strlen($fn) > 25 || strlen($fn) < 2){ 
				array_push($this->errorArray, Constants::$firstnameCharacters);
				return;
			}
		}

		private function validateLastname($ln){
			if(strlen($ln) > 25 || strlen($ln) < 2){ 
				array_push($this->errorArray, Constants::$lastnameCharacters);
				return;
			}
		}

		private function validateEmails($em, $em2){
			if($em != $em2){
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}
			if(!filter_var($em, FILTER_VALIDATE_EMAIL)){ //this knows in what format email should be in (makes sure .com part)
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}
			$checkEmailQuery = mysqli_query($this->connection, "SELECT email FROM users WHERE email ='$em'");
			if(mysqli_num_rows($checkEmailQuery) !=0){
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}
		}

		private function validatePasswords($pw, $pw2){
			if($pw != $pw2){
				array_push($this->errorArray, Constants::$passwordsDoNotMatch);
				return;
			}
			if(preg_match('/[^A-Za-z0-9]/', $pw)){  // if ^-not A-Z, a-z, 0-9 (must be some other characters)
			array_push($this->errorArray, Constants::$passwordsNotAlphanumeric);
				return;
			}
			if(strlen($pw) > 30 || strlen($pw) < 5){ //strlen = string.lenght basically
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}
		}
	}
?> 