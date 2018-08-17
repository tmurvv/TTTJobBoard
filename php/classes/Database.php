<?php
    defined('DB_HOST') or define('DB_HOST', 'localhost:3306');
    defined('DB_USER') or define('DB_USER', 'tmurvvvv_admin');
    defined('DB_PASS') or define('DB_PASS', 'jobboard4014');
    defined('DB_NAME') or define('DB_NAME', 'tmurvvvv_innotechjobboard');
    try {
        $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);    
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected to database";
    } catch (PDOException $ex){
        echo "Connection failed ".$ex->getMessage();
    }  