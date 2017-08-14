<?php

/* 
 * Handles all functions relating to Properties
 * 
 * @copyright (c) Sykes Cottages Ltd
 * @author D Parry
 */
class Properties {
	/**
	 * Holds the details of all properties
	 * 
	 * @var Mixed
	 */
	protected $properties;
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
	 * Get details of all properties in the database
	 * 
	 * @return Arr The properties
	 */
	public function getProperties() {
		// $acceptsPets = 1;
		/* this hard-coded result has been placed in a database table
		return [
			['7439', 'Craster Reach', '1', 'Craster', 'no smoking', "pets $acceptsPets"],
			['2105', 'Richard House', '5', 'chester', 'smoking', "pets $acceptsPets"]
		]; */
		
		$this->properties = $this->db->query("SELECT * FROM `properties`");
		
		return $this->properties;
	}
}