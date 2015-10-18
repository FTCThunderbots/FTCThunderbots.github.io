<?php
require_once '/../vendor/autoload.php';
require_once '../core/init.php'

class SMTPMail
{
	public $host = "localhost", $username = "root", $password = "";
	public $message = "Test message", $from = "John Doe", $subject = "example";
	public $body = "This is a test body.";
	
	private $mail;
	
	public function __construct($host, $username, $password, $protocol)
	{
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		
		// Set the mailer object
		$this->mail = new PHPMailer();
		
		$this->mail->isSMTP();
		$this->mail->Host = $this->host;
		$this->mail->SMTPAuth = true;
		$this->mail->SMTPSecure = $protocol;
		$this->mail->Username = $this->username;
		$this->mail->Password = $this->password;
		$this->mail->From = $this->username;
	}
	
	function setMessage($message)
	{
		$this->message = escape($message);
	}
	
	function setName($name)
	{
		$this->name = escape($name);
		$this->mail->FromName = $this->name;
	}
	
	function setSubject($subject)
	{
		$this->subject = escape($subject);
		$this->mail->Subject = $this->subject;
	}
	
	function setBody($body)
	{
		$this->body = $body;
		$this->mail->Body = $this->body;
	}
	
	function addEmailAddress($address)
	{
		$this->mail->addAddress($address);
	}
	
	function sendMail()
	{
		return $this->mail->send();
	}
}