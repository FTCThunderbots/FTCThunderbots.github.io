<?php
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'robomtvx_admin',
		'password' => 'thunderbots5604',
		'db' => 'robomtvx_users'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expire' => 604800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

function old_autoloader($class)
{
	require_once 'classes/' . $class . '.php';
}

spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';
require_once 'includes/headers.php';

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

	if ($hashCheck->count())
	{
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}