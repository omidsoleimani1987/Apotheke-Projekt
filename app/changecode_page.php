<?php

session_start();

//class auto loader:
require $_SERVER["DOCUMENT_ROOT"].'/includes/autoloader.inc.php';

//config:
require $_SERVER["DOCUMENT_ROOT"].'/includes/config.inc.php';
    
// check if user is already logged in
userLoginStatus('Bitte loggen Sie zuerst ein.');

//validation:
$codeobject = new CodeChange;
    
if(count($_POST) > 0) {

    //validating the form inputs:
    $codeobject->codeValidate(trim($_POST['code']), trim($_POST['recode']));
                        
    //controlling error array:
    $codeobject->checkError();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="omid soleimani" />
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/changecode_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <title>Registerieren</title>
</head>
<body>
    <header>
        <span id="pill-icon"><i class="fas fa-capsules"></i></span>
        <span id="back-icon"><a href="home_page.php"><i class="fas fa-arrow-circle-left"></i></a></span>
    </header>
    <main>
        <section class="flex container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="flex" autocomplete="off">
                
                <h1 class="title">Den neuen Code eingeben</h1>
                
                <input type="password" name="code" class="input" placeholder="Code" required="required" minlength="6" />
                <small><?php echo $codeobject->error['code']; ?></small>

                <input type="password" name="recode" class="input" placeholder="Code wiederholen" required="required" />
                <small><?php echo $codeobject->error['recode']; ?></small>
                    
                <input type="submit" value="Speichern" class="button" />
            </form>
        </section>
    </main>
</body>
</html>