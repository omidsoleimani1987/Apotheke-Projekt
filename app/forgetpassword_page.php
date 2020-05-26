<?php
    session_start();
    
    //class auto loader:
    require $_SERVER["DOCUMENT_ROOT"].'/includes/autoloader.inc.php';

    //config:
    require $_SERVER["DOCUMENT_ROOT"].'/includes/config.inc.php';
    
    $forgetobject = new ForgetPassword;

    if(count($_POST) > 0) {
        //validating the form input:
        $forgetobject->emailValidate(trim($_POST['email']));
        $forgetobject->checkError();
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
    <title>Passwort vergessen</title>
</head>
<body>
    <header>
        <span id="pill-icon"><i class="fas fa-capsules"></i></span>
        <span id="back-icon"><a href="login_page.php"><i class="fas fa-arrow-circle-left"></i></a></span>
    </header>
    <main>
        <section class="flex container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" class="flex">
                
                <h1 class="title">Passwort-Wiederherstellung</h1>
                <p>Bitte geben Sie die Email Addresse, mit der Sie Ihr konto registriert haben.</p>
                
                <input type="email" name="email" class="input" placeholder="E-Mail" required="required" value="<?php echo $forgetobject->email; ?>"/>
                <small><?php echo $forgetobject->error['email']; ?></small>
                
                <input type="submit" value="Weiter" class="button" />
            </form>
        </section>
    </main>
</body>
</html>