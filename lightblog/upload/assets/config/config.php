<?php
class CConfig{

	static $theme            = "default"; // The name of the folder the theme is in.
	static $company          = "Company Name Ltd."; // Name of the company. (leave as blank if none)
	static $title            = "Light Blog"; // Name of the blog.
	static $baseurl          = "//localhost/blog/"; /* The base url of the website.
	
	/*
		To add an account just type:
		, "username2" => "password2"
	
		For example:
		array("username" => "password")
		
		To add an extra user simply add the line above:
		array("username" => "password", "username2" => "password2");
	*/
	static $accounts         = array("username" => "password", "username2" => "password2");
	

	static $apilock        	 = false;

	static $DBServer         = "localhost"; // The IP address of the database.
	static $DBUser           = "root"; // The user of the database.
	static $DBPass           = ""; // The password of the user.
	static $DBName           = "blog"; // The name of the database.
}
?>