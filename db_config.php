

<?php 


/**
 * 
 */
// on hosting mode use this 
// to access congiged data first requitre it in php file then $data=DbConfig::get_dbconfig() this will return the hass map of {host,name,pass,dbname} 
class DbConfig
{
	
	private	String $host = "your online hosted mysql";
	private String $un = "your username";
	private String $up = "your pass word";
	private String $dbname = "your dbname";

	public static function get_dbconfig()
	{
		$data = ["host"=>$this->host,"name"=>$this->un,"pass"=>$this->up,"dbname"=>$this->dbname];
		return $data;
	}
}

echo "<pre>";
var_dump(DbConfig::get_dbconfig());
echo "</pre>";



?>
