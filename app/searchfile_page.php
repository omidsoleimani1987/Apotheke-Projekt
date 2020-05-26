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
 * check if user is logged in
 */   
userLoginStatus('Bitte loggen Sie zuerst ein.');
/**
 * check if there is a message of successful operation
 */ 
checkMessage();

$searchobject = new SearchFile;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="omid soleimani" />
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/searchfile_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="///">
    <title>Aufteilung suchen</title>
</head>
<body>
    <header>
        <span id="pill-icon"><i class="fas fa-capsules"></i></span>
        <span id="back-icon"><a id ="back-link" href="home_page.php"><i class="fas fa-arrow-circle-left"></i></a></span>
    </header>
    <main>
    <section class="flex container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" class="flex">
                <h1 class="title">Daten</h1>
                <select name="year" class="input">
                    <option value="">Jahr</option>                    
                    <option value="2020">2020</option>                    
                    <option value="2021">2021</option>                    
                    <option value="2022">2022</option>                    
                    <option value="2023">2023</option>                    
                    <option value="2024">2024</option>                    
                    <option value="2025">2025</option>                    
                    <option value="2026">2026</option>                    
                    <option value="2027">2027</option>                    
                    <option value="2028">2028</option>                    
                    <option value="2029">2029</option>                    
                    <option value="2030">2030</option>                    
                </select>
                <small><?php echo $searchobject->error['year']; ?></small>

                <select name="month" class="input">
                    <option value="">Monat</option>
                    <option value="Januar">Januar</option>                   
                    <option value="Februar">Februar</option>                   
                    <option value="März">März</option>                   
                    <option value="April">April</option>                   
                    <option value="Mai">Mai</option>                   
                    <option value="Juni">Juni</option>                   
                    <option value="Juli">Juli</option>                   
                    <option value="August">August</option>                   
                    <option value="September">September</option>                   
                    <option value="October">October</option>                   
                    <option value="November">November</option>                   
                    <option value="Dezember">Dezember</option>                   
                </select>
                <small><?php echo $searchobject->error['month']; ?></small>
       
                <input list="company" class="input" name="company" placeholder="Firma" required pattern="[A-Za-z ]+" title="Just letters are accepted" value="<?php echo $searchobject->company; ?>"/>
                <small><?php echo $searchobject->error['company']; ?></small>
                <datalist id="company">
                    <option value="Genericon">
                    <option value="Kwizda">
                    <option value="PlusPharma">
                    <option value="Stada">
                    <option value="RatioPharm">
                </datalist>

                <input type="submit" value="Suchen" class="button" />
            </form>
        </section>
        <div class="result-table">
            <?php 
            // showing the result of search:
            if(count($_POST) > 0) {
                //validating the form inputs:
                $searchobject->yearValidate(trim($_POST['year']));
                $searchobject->monthValidate(trim($_POST['month']));
                $searchobject->companyValidate(trim($_POST['company']));
                        
                //controlling error array:
                $searchobject->checkError();   
            } 
            ?>
        </div>
    </main>
</body>
</html>