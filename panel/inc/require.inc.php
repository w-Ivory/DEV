<?php
	
    require_once($file_dir_racine.'inc/constants.inc.php');

    // MYSQL CONNECTION 
    try {$db = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_NAME.'', MYSQL_USER, MYSQL_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));} catch (Exception $e) {die('Erreur : ' . $e->getMessage());}	

    session_start();

    require_once($file_dir_racine.'inc/functions.inc.php');
    _client_verif_cookies();
    require_once($file_dir_racine.'inc/commun.inc.php');



?>