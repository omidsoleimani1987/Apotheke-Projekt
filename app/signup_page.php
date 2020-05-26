<?php

session_start();

//class auto loader:
require $_SERVER["DOCUMENT_ROOT"].'/includes/autoloader.inc.php';

//config:
require $_SERVER["DOCUMENT_ROOT"].'/includes/config.inc.php';
    
// check if user is already logged in
userLogoutStatus('Bitte loggen Sie zuerst aus.');

//validation:
$userobject = new UserSignup;
    
if(count($_POST) > 0) {

    //validating the form inputs:
    $userobject->firstnameValidate(trim($_POST['firstname']));
    $userobject->lastnameValidate(trim($_POST['lastname']));
    $userobject->emailValidate(trim($_POST['email']));
    $userobject->usernameValidate(trim($_POST['username']));
    $userobject->passwordValidate(trim($_POST['password']), trim($_POST['repassword']));
                        
    //controlling error array:
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
    <link rel="stylesheet" href="../style/css/signup_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <title>sign up</title>
</head>
<body>
    <header>
        <span id="pill-icon"><i class="fas fa-capsules"></i></span>
        <span id="back-icon"><a href="login_page.php"><i class="fas fa-arrow-circle-left"></i></a></span>
    </header>
    <main>
        <section class="flex container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="flex" autocomplete="off">
                <h1 class="title">Persönliche Daten</h1>
                
                <input type="text" name="firstname" class="input" placeholder="Vorname" required="required" value="<?php echo $userobject->firstname; ?>" pattern="[A-Za-z ]+" title="Es werden nur Buchstaben akzeptiert."/>
                <small><?php echo $userobject->error['firstname']; ?></small>

                <input type="text" name="lastname" class="input" placeholder="Nachname" required="required" value="<?php echo $userobject->lastname; ?>" pattern="[A-Za-z ]+" title="Es werden nur Buchstaben akzeptiert." />
                <small><?php echo $userobject->error['lastname']; ?></small>

                <input type="email" name="email" class="input" placeholder="E-Mail" required="required" value="<?php echo $userobject->email; ?>"/>
                <small><?php echo $userobject->error['email']; ?></small>

                <h1 class="title">Ihre Zugangsdaten</h1>

                <input type="text" name="username" class="input" placeholder="Benutzername" required="required" value="<?php echo $userobject->username; ?>"/>
                <small><?php echo $userobject->error['username']; ?></small>

                <input type="password" name="password" class="input" placeholder="Passwort" required="required" minlength="6" />
                <small><?php echo $userobject->error['password']; ?></small>

                <input type="password" name="repassword" class="input" placeholder="Passwort wiederholen" required="required" />
                <small><?php echo $userobject->error['repassword']; ?></small>
                    
                <input type="submit" value="Speichern" class="button" />
            </form>
        </section>
    </main>
</body>
</html>