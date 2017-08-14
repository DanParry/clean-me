<?php

/** 
 * This class handles functions for users as a whole
 * 
 * @copyright (c) Sykes Cottages Ltd
 * @author D Parry
 */
class Users {
	public $users;
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
	 * Get all details for all users in the users table
	 * 
	 * @return Obj The users result
	 */
	function getUsers(){
		$res = $this->db->query('SELECT * FROM users');
		$obj = $this->db->createObjArray($res);

		return $obj;
	}
}