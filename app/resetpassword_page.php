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
 * validation:
 */    
$resetobject = new ResetPassword;
    
if(count($_POST) > 0) {

    /**
     * validating the form inputs:
     */
    $resetobject->passwordValidate(trim($_POST['password']), trim($_POST['repassword']));
    /**
     * controlling error array:
     */
    $resetobject->checkError($_SESSION['resetPasswordEmail']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="omid soleimani" />
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/forgetpassword_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <title>Passwort-Wiederherstellung</title>
</head>
<body>
    <!-- header start -->
    <header>
        <span id="pill-icon"><i class="fas fa-capsules"></i></span>
    </header>
    <!-- header end -->
    <main>
        <!-- form start -->
        <section class="flex container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="flex" autocomplete="off">
                <h1 class="title">Passwort-Wiederherstellung</h1>
                
                <input type="password" name="password" class="input" placeholder="Passwort" required="required" minlength="6" />
                <small><?php echo $resetobject->error['password']; ?></small>

                <input type="password" name="repassword" class="input" placeholder="Passwort wiederholen" required="required" />
                <small><?php echo $resetobject->error['repassword']; ?></small>
                    
                <input type="submit" value="Speichern" class="button" />
            </form>
        </section>
        <!-- form end -->
    </main>
</body>
</html>