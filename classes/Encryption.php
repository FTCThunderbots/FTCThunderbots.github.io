<?php
// Copyright (C) 2015 Zachary Waldron
// Encryption.php
// Contains all of the encryption files in
// accordance to AES-128/256 standards.

/*
*
*|----------------*WARNING/DISCLAIMER*---------------|
*|													 |
*| All "salts" or private keys, must be handled      |
*| in the HTTPS protocol using TLS 1.2 or higher!    |
*| In addition, the use of these functions must be   |
*| handled by the programmer, as keys are randomly   |
*| generated, and must be stored MANUALLY.           |
*|---------------------------------------------------|
*
*/
class Encryption
{		
	/**
	 * Returns an encrypted & utf8-encoded
	 */
	function encrypt($pure_string, $encryption_key) {
		$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
		return $encrypted_string;
	}

	/**
	 * Returns decrypted original string
	 */
	function decrypt($encrypted_string, $encryption_key) {
		$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
		return $decrypted_string;
	}
	
	public static function hash_string($pure_string)
	{
		return password_hash($pure_string, PASSWORD_DEFAULT);
	}

	public static function verify_hash($input, $hashed_string)
	{
		return password_verify($input, $hashed_string);
	}

	function secure_encrypt($pure_string, $encryption_key)
	{
		return base64_encode($this->encrypt($pure_string, $encryption_key));
	}

	function secure_decrypt($encrypted_string, $encryption_key)
	{
		return $this->decrypt(base64_decode($encrypted_string), $encryption_key);
	}
	
	function private_key_gen($length) {
		if ($length < 1 || $length > 56) { $length = 56; }
		
		$alphabet = str_split("abcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*");
		$output = '';
		
		for ($i = 0; $i < $length; $i++)
		{
			$letter = rand(0, count($alphabet) - 1);
			$isUpper = rand(0, 1) == 1 ? true : false;
			
			if ($isUpper)
			{
				$output .= strtoupper($alphabet[$letter]);
			}
			else
			{
				$output .= strtolower($alphabet[$letter]);
			}
		}
		
		return $output;
	}
	
	public $data = 'invalid', $key = 'invalid';
	
	function Encryption($data_i, $strength)
	{
		$this->data = $data_i;
		$this->key = $this->private_key_gen($strength);
	}
}