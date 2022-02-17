<?php 


/**
 * 
 */

/**
 * 
 */
class DB
{

	// debug mode db config
	// to go to host mode db congig change the db_configs data to your configuration data
	private	String $host;
	private String $port;
	private String $dbname;
	private String $un;
	private String $up;

	public function connect($debug=false)
	{
		if($debug){
			// on debug = true local mode
			$this->host = "localhost";
			$this->port = "3306";
			$this->dbname = "my-php-site-store";
			$this->un = "root";
			$this->up = "";
			return $this->get_pdo();
		}else{
			// on debug = false hosting mode;
			$this->host = "us-cdbr-east-05.cleardb.net";
			$this->port = "your port";
			$this->dbname = "heroku_b004bd4fb85c8f7";
			$this->un = "b9572f7f3e03ec";
			$this->up = "3647b0df";
			return $this->get_pdo();

		}
	}


	private function get_pdo()
	{
		$pattern = "/^[0-9]{0,}$/";
		$pdo;
		$is_port = preg_match($pattern, $this->port);
		// echo("is_port?". $is_port . " ". $this->port);
		if ( $is_port) {
			$pdo = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbname};",$this->un,$this->up);
			// echo(" local ");
			return $pdo;
		}else{
			$pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};",$this->un,$this->up);
			// echo(" online ");
			return $pdo;


		}

	}


}


               
// $pdo = new DB();
// $pdo = $pdo->connect();
// echo "<pre>";
// var_dump($pdo);
// echo "</pre>";



// header("Location:index.php")

?>