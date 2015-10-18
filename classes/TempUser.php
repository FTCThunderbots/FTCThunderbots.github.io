<?php
class TempUser
{
	private $_db,
			$_username,
			$_password,
			$_salt;

	public function __construct()
	{
		$this->_db = DB::getInstance();	// Use singleton connection
	}

	public static function verify_user($username, $_password, $_salt)
	{

	}
}