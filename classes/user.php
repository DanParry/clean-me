<?php

/** 
 * Handles all functions related to singles users
 * 
 * @copyright (c) Sykes Cottages Ltd
 * @author D Parry
 */
class User {
	/**
	 * Stores the name prefix of the person
	 * 
	 * @var Str Ex: Mr, Mrs, Dr
	 */
	protected $prefix;
	/**
	 * Person first name
	 * 
	 * @var Str
	 */
	protected $firstName;
	/**
	 * Person last name
	 * 
	 * @var Str
	 */
	protected $lastName;
	/**
	 * Suffix for the person. Could be qualifications
	 * @var Str Ex: BSC, PhD
	 */
	protected $suffix;
	/**
	 * Database connection
	 * 
	 * @var Obj
	 */
	private $db;

	/**
	 * Class constructor. Perform database connection
	 */
	public function __construct() {
		// database connection
		$this->db = DB::getInstance();
	}
	
	/**
	 * Setter for prefix
	 * 
	 * @param Str $name
	 */
	public function setPrefix($prefix) {
		// never trust input, so clean the string
		$prefix = $this->db->clean($prefix);
		
		// now set the var
		$this->prefix = $prefix;
	}
	
	/**
	 * Setter for first name
	 * 
	 * @param Str $name
	 */
	public function setFirstName($name) {
		// never trust input, so clean the string
		$name = $this->db->clean($name);
		
		// now set the var
		$this->firstName = $name;
	}
	
	/**
	 * Setter for last name
	 * 
	 * @param Str $name
	 */
	public function setLastName($name) {
		// never trust input, so clean the string
		$name = $this->db->clean($name);
		
		// now set the var
		$this->lastName = $name;
	}
	
	/**
	 * Setter for suffix
	 * 
	 * @param Str $name
	 */
	public function setSuffix($suffix) {
		// never trust input, so clean the string
		$suffix = $this->db->clean($suffix);
		
		// now set the var
		$this->$suffix = $suffix;
	}
	
	/**
	 * Returns the person prefix
	 * 
	 * @return Str
	 */
	public function getPrefix() {
		return $this->prefix;
	}
	
	/**
	 * Returns the person first name
	 * 
	 * @return Str
	 */
	public function getFirstName() {
		return $this->firstName;
	}
	
	/**
	 * Returns the person last name
	 * 
	 * @return Str
	 */
	public function getLastName() {
		return $this->lastName;
	}
	
	/**
	 * Returns the person suffix
	 * 
	 * @return Str
	 */
	public function getSuffix() {
		return $this->suffix;
	}
	
	/**
	 * Returns the person full name including prefix and suffix
	 * 
	 * @return Str
	 */
	public function getFullName() {
		// start with the prefix, if there is one
		$fullName = (empty($this->prefix) ? '' : $this->prefix." "); // if there is a prefix, add a trailing space to separate from the name portion
		// now concatenate the first and last names
		$fullName .= $this->firstName." ".$this->lastName;
		// now check for and add the suffix, if there is one
		$fullName .= (empty($this->suffix) ? '' : " ".$this->suffix); // add a preceding space if there's a suffix
		
		return $fullName;
	}
	
	/**
	 * Saves the current user configuration to the database
	 */
	function savePerson(){
		// construct the SQL and keep it easy to read
		$sql = "INSERT INTO
					users
				(`prefix`
				,`first_name`
				,`last_name`
				,`suffix`)
					VALUES
				('".$this->prefix."'
				,'".$this->firstName."'
				,'".$this->lastName."'
				,'".$this->suffix."')";
		
		try {
			$this->db->query($sql);
		} catch (Exception $e) {
			echo 'Sorry, an error has occurred: '.$e->getMessage();
		}
	}

	/**
	 * Load the details into the class of the user to be searched for
	 * 
	 * @param Str If provided, this name will be searched for. Leave blank to search for the set lastName
	 * 
	 * @return Bool true if a result is found, or false if not
	 */
	function getPersonByLastName($name=''){
		// build the search SQL statement, choosing which name to search for
		$sql = "SELECT
					* 
				FROM
					users
				WHERE
					last_name = '".(empty($name) ? $this->lastName : $name)."'";
		
		try {
			$res = $this->db->query($sql);
			$obj = $this->db->createObjArray($res);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
		
		return $obj;
	}
}