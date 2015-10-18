<?php
function genPath($dirdown) {
	$tempstr = '';
	for ($i = 0; $i < $dirdown; $i++) {
		$tempstr .= "../";
	}
	
	return $tempstr;
}

function createHeader($foldersDown=0, $title) {
	$insertedText = $foldersDown != 0 ? genPath($foldersDown) : '';
	echo "\t\t<title>{$title}</title>\n";
	echo "\t\t<meta charset='UTF-8'>\n";
	echo "\t\t<meta name='keywords' content='Thunderbots, Thunderbots 5604, Mountain View High School, MVHS'>\n";
	echo "\t\t<meta name='description' content='Thunderbots 5604 Website'>\n";
	echo "\t\t<meta name='author' content='Javier Anton, Zachary Waldron'>\n";
	echo "\t\t<meta http-equiv='X-UA-Compatible' content='IE=edge, chrome=1'>\n";
	echo "\t\t<link rel='icon' type='image/png' href='{$insertedText}css/img/thunderbots_icon-32x32.png' sizes='32x32' />\n";
	echo "\t\t<link rel='icon' type='image/png' href='{$insertedText}css/img/thunderbots_icon-16x16.png' sizes='16x16' />\n";
	echo "\t\t<link type='text/css' rel='stylesheet' href='{$insertedText}css/normalize.css'>\n";
	echo "\t\t<link type='text/css' rel='stylesheet' href='{$insertedText}css/shift.css'>\n";
	echo "\t\t<link type='text/css' rel='stylesheet' href='{$insertedText}css/bootstrap.css'>\n";
	echo "\t\t<link type='text/css' rel='stylesheet' href='{$insertedText}css/main.css'>\n";
	echo "\t\t<link type='text/css' rel='stylesheet' href='{$insertedText}fonts\font-awesome\css\font-awesome.min.css'>\n";
	echo "\t\t<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>\n";
	echo "\t\t<!--[if lt IE 9]>\n";
	echo "\t\t\t<script src='http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>\n";
	echo "\t\t\t<script src='http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>\n";
	echo "\t\t<![endif]-->\n";
}