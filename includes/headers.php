<?php
function createHeader($foldersDown=0, $title) {
	echo "\t<link rel='stylesheet' href='./styles/w3.css' />\n";
	echo "\t<link rel='stylesheet' href='./styles/base.css' />\n"; 
	echo "\t<title>$title</title>\n";
	echo "\t<meta charset='UTF-8' />\n";
	echo "\t<meta name='content-type' content='text/html' />\n";
	echo "\t<meta name='author' content='Thunderbots Robotics' />\n";
	echo "\t<meta name='viewport' content='width=device-width, initial-scale=1' />\n";
	echo "\t<script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>\n";
	echo "\t<script src='http://www.thunderbots.x10host.com/script/api.js'></script>\n";
}