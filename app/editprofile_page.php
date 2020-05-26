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
userLoginStatus('Bitte loggen Sie zuerst ein.');

/**
 * validation:
 */
$editprofileobject = new EditProfile($_SESSION['username']);

if(count($_POST) > 0) {
    $editprofileobject->validateUserInfo($_POST);
    $editprofileobject->checkError();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/editprofile_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <title>Profil bearbeiten</title>
</head>
<body>
    <!-- header start -->
    <header>
        <span id="pill-icon"><i class="fas fa-capsules"></i></span>
        <span id="back-icon"><a href="home_page.php"><i class="fas fa-arrow-circle-left"></i></a></span>
    </header>
    <!-- header end -->
    <main>
        <!-- form start -->
        <section class="flex container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" class="flex">
                
                <h1 class="title">Persönliche Daten</h1>
                  
                <input type="text" class="input" name="firstname" placeholder="Vorname" value="<?php echo $editprofileobject->firstname; ?>" pattern="[A-Za-z ]+" title="Es werden nur Buchstaben akzeptiert."/>
                <small><?php echo $editprofileobject->error['firstname']; ?></small>

                <input type="text" class="input" name="lastname" placeholder="Nachname" value="<?php echo $editprofileobject->lastname; ?>" pattern="[A-Za-z ]+" title="Es werden nur Buchstaben akzeptiert." />
                <small><?php echo $editprofileobject->error['lastname']; ?></small>

                <input type="email" class="input" name="email" placeholder="E-mail" value="<?php echo $editprofileobject->email; ?>"/>
                <small><?php echo $editprofileobject->error['email']; ?></small>

                <h1 class="title">Ihre Zugangsdaten</h1>

                <input type="text" class="input" name="username" placeholder="<?php echo $_SESSION['username']; ?>" disabled="disabled" />

                <input type="password" class="input" name="password" placeholder="Passwort" minlength="6" />

                <input type="password" class="input" name="repassword" placeholder="Password wiederholen" />
                <small><?php echo $editprofileobject->error['repassword']; ?></small>
                    
                <input type="submit" value="Speichern" class="button" />       

            </form>
        </section>
        <!-- form end -->
    </main>
</body>
</html>