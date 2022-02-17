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
	public	String $host;
	private String $port;
	private String $dbname;
	private String $un;
	private String $up;

	public function connact($debug=True)
	{
		if($debug){
			// on debug = true local mode
			$this->host = "localhost";
			$this->prot = "3306";
			$this->dbname = "your mysql db name";
			$this->un = "root";
			$this->up = "";
			return $this->get_pdo();
		}else{
			// on debug = false hosting mode;
			$this->host = "your online hosted mysql";
			$this->port = "your port";
			$this->dbname = "your dbname";
			$this->un = "your username";
			$this->up = "your pass word";
			return $this->get_pdo();

		}
	}


	private function get_pdo()
	{
		$pattern = "/^[0-9]$/";
		$pdo;
		$is_port = preg_match($pattern, $this->prot);
		if ( $is_port) {
			$pdo = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbname};",$this->un,$this->up);
			echo("local");
			return $pdo;
		}else{
			$pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};",$this->un,$this->up);
			echo("online");
			return $pdo;


		}

	}


}


               
$pdo = new DB();
$pdo = $pdo->connact();
echo "<pre>";
var_dump($pdo);
echo "</pre>";



// header("Location:index.php")

?>