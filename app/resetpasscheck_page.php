<?php
session_start();
/**
 * class auto loader:
 */
require $_SERVER["DOCUMENT_ROOT"].'/includes/autoloader.inc.php';

/**
 * config:
 */
require $_SERVER["DOCUMENT_ROOT"].'/includes/config.inc.php';
/**
 * check if user comes to this page with the link in email ur just typing in browser URL
 */    
if(empty($_GET['selectorToken']) && empty($_GET['email'])) {
    $message = 'Bitte versuchen Sie noch einmal.';
    header("Location: $app_path/app/error_page.php?message=$message");
}
/**
 * comparing the infos inside the link in email with the same values in database
 */
$resetCheckobject = new ResetPassword;
$resetCheckobject->checkValues($_GET['email'], $_GET['selectorToken']);