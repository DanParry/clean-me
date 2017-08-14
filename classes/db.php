<?php

/*^ 
 * Singleton class to ensure one connection to the database as it's an expensive operation
 * 
 * @copyright (c) Sykes Cottages Ltd
 * @author D Parry
 */

class DB {
	/**
	 * Static member to hold the instance of this class
	 * 
	 * @var Object Class instance.
	*/
	private static $instance = null;
	/**
	 *
	 * @var Res Holds the database connection
	 */
	private $db;

	/**
	 * Connect to the database and place the connection in the private member. Throws exception on error
	 * 
	 * @return Void
	 */
	private function __construct()
	{
		// connect using the config definiteoins
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);
		
		// make sure the connection succeeded
		if ($this->db->connect_error) {
			throw new Exception($this->db->connect_error);
		}
	}

	/**
	 * The object is created from within the class itself only if the class has no instance
	 * 
	 * @return Obj The instance of the DB class
	 */
	public static function getInstance()
	{
		if (self::$instance == null) {
			// create the instance as it doesn't exist
			self::$instance = new DB();
		}

	  return self::$instance;
	}
	
	/**
	 * Perform a general SQL query
	 * 
	 * @param Str The SQL statement
	 * 
	 * @return Obj The returned query object
	 */
	public function query($sql) {
		if (!$res = $this->db->query($sql)) {
			throw new Exception($this->db->error);
		}
		
		return $res;
	}
	
	/**
	 * Escape the given string
	 * 
	 * @param Str The string to clean
	 * 
	 * @return Str The cleaned string
	 */
	public function clean($str) {
		// pack the cleaned string back into the variable in case any further processing is to be added
		$str = $this->db->real_escape_string($str);
		
		return $str;
	}
	
	/**
	 * Convert the mysqli result into a PHP array of objects
	 * 
	 * @param Res The resource to be converted
	 * 
	 * @return Arr Array of objects
	 */
	public function createObjArray($res) {
		// set up an arary to hold the results
		$output = [];
		
		// if a successful select has been run, convert it into an array of objects
		if ($res->num_rows > 0) {
			while($row = $res->fetch_object()) {
				$output[] = $row;
			}
		}
		
		return $output;
	}
}