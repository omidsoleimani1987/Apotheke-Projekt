<?php
/**
 * a variable for the root server used in "header" functions in pages
 */
$app_path = $_SERVER['DOCUMENT_ROOT'];
/**
 * logout function to delete session and go to starting page
 */
function logout() {
    session_destroy();
    header("location: $app_path/index.php");
    exit();
}
/**
 * a function to make safe some inputs from users
 */
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
/**
 * a function at the top of each page to check when user sent to this page, is there any message for the previous operation, contains success or fail
 */
function checkMessage() {
    if(isset($_GET['message'])) {
        if($_GET['status'] == 'success') {
            echo '<h1 class="success"><i class="fas fa-check-square"></i> ' . $_GET['message'] . '</h1>';
        } else {
            echo '<h1 class="error"><i class="fas fa-exclamation-triangle"></i> ' . $_GET['message'] . '</h1>';
        }
    }
}
/**
 * a function that checks , user should not be logged in
 */
function userLogoutStatus($message) {
    if(isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
        header("Location: $app_path/app/error_page.php?message=$message");
        exit;
    }
}
/**
 * a function that checks , user should be logged in
 */
function userLoginStatus($message) {
    if(!isset($_SESSION['login']) || $_SESSION['login'] !== 'success') {
        header("Location: $app_path/app/login_page.php?message=$message&status=fail");
        exit;
    }
}
/**
 * a function that shows up when user use the back button of browser not the back button of app (just in page : app/seefile_page.php)
 */
function searchfileStatus($message) {
    if(!isset($_GET['id']) || trim($_GET['id']) == '') {
        header("Location: $app_path/app/searchfile_page.php?message=$message&status=fail");
        exit;
    }
}

