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
 * check if user is already logged in
 */
userLogoutStatus('Sie haben schon eingeloggt');
/**
 * check if user comes from signup_page after registering :
 */   
checkMessage();
    
/**
 * validation:
 */
$userobject = new UserLogin;

if(count($_POST) > 0) {
    /**
     * validating the form inputs:
     */
    $userobject->usernameValidate(trim($_POST['username']));
    $userobject->passwordValidate(trim($_POST['password']));
    /**
     * controlling error array:
     */
    $userobject->checkError();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="omid soleimani" />
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/login_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <title>Login</title>
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" class="flex">
                <h1 class="title">login</h1>
                <input type="text" name="username" class="input" placeholder="Benutzername" required="required" value="<?php echo $userobject->username; ?>" autofocus="autofocus" />
                <small><?php echo $userobject->error['username']; ?></small>
                
                <input type="password" name="password" class="input" placeholder="Passwort" required="required" />
                <small><?php echo $userobject->error['password']; ?></small>
                
                <a class="forget" href="forgetpassword_page.php">Passwort vergessen?</a>

                <input type="submit" value="Einloggen" class="button" />
                <h1 class="title">Sie haben noch kein Konto?</h1>
                <a class="register" href="signup_page.php">Registrieren</a>
            </form>
        </section>
        <!-- form end -->
    </main>
</body>
</html>