<?php

//class auto loader:
require $_SERVER["DOCUMENT_ROOT"].'/includes/autoloader.inc.php';

//config:
require $_SERVER["DOCUMENT_ROOT"].'/includes/config.inc.php';

$result = '';

if(count($_POST) > 0) {
$userCode = $_POST['entrance_code'];
$codeObject = new EntranceCode;
$result = $codeObject->checkCode($userCode);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="omid soleimani" />
    <link href="style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style/css/entrance_page.css" />
    <link rel="stylesheet" href="style/css/fonts.css" />
    <script defer src="style/fontawesome/js/all.js"></script>
    <title>Willkommen</title>
</head>
<body>
    <header>
    <span id="pill-icon"><i class="fas fa-capsules"></i></span>
    </header>
    <main>
        <section class="flex container">
            <form action="index.php" method="post" autocomplete="off" class="flex">
                <input class="input" type="password" name="entrance_code" placeholder="Bitte geben Sie den Einstiegs-Code ein" required="required" autofocus="autofocus" />
                <small>
                    <?php echo ($result === 'wrong') ? 'Der Code ist nicht korrekt.' : '';?>
                </small>
                <input type="submit" value="Bestätigen" class="button" />
            </form>
        </section>
    </main>
</body>
</html>