<?php 

/*set your website title*/

define('WEBSITE_TITLE', "P17204296 - Flexi-Hires - CTEC3451-Development Project - Freelancing Platform"); //Constant

/*set database variables*/

define('DB_TYPE','mysql');
define('DB_NAME','flexi_hires');
define('DB_USER','flexihiresuser');
define('DB_PASS','flexihirespass');
define('DB_HOST','localhost');

/*protocol http or https*/
define('PROTOCOL','http');

/*root and asset paths*/

$path = str_replace("\\", "/",PROTOCOL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app/core", "public", $path));
define('ASSETS', str_replace("app/core", "public/assets", $path));

/*set to true to allow error reporting
set to false when you upload online to stop error reporting*/

define('DEBUG',true); //set to false when ready to deploy project (live)

if(DEBUG)
{
	ini_set("display_errors",1);
}else{
	ini_set("display_errors",0);
}