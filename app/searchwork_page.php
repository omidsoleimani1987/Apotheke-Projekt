<?php

session_start();

//class auto loader:
require $_SERVER["DOCUMENT_ROOT"].'/includes/autoloader.inc.php';

//config:
require $_SERVER["DOCUMENT_ROOT"].'/includes/config.inc.php';

// check if user is logged in
userLoginStatus('Bitte loggen Sie zuerst ein.');

$tableName = $_SESSION['fileTableName'];
$_SESSION['medId'] = '';

$searchworkobject = new Searchwork($tableName);

//first we get the all information about this table of DB to create the Summe row in table and show the information to user:
$rowresult = $searchworkobject->setRowSumme();

if($rowresult == true) {
    $searchworkobject->setcolumnSumme();
} else {
    echo '<hr>Failed to create Summe row and column<hr>';
} 

// we want to show some actual info on page from DB 
$allResultArray = $searchworkobject->getSumme();
$SummeRowId = count($allResultArray) - 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/searchwork_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <title>Waren suchen</title>
</head>
<body>
    <main>
        <aside>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a target="_blank" class="a" href="../pdf/wareneingang.php" style="display:block; width:30%;"><i class="fas fa-file-alt"></i> Wareneingang</a>
                <a target="_blank" class="a" href="../pdf/probleme.php" style="display:block; width:30%;"><i class="fas fa-exclamation-circle"></i> Probleme<a>
                <a target="_blank" class="a" href="../pdf/notatall.php" style="display:block; width:30%;"><i class="fas fa-times-circle"></i> nicht bekommen<a>
                <?php
                // we don't want to see all the create PDF links for all pharmacies, just for those  with values not equal to zero(those who ordered something) 
                    $object = new IconLists;
                    $object->getIcons($tableName);
                ?>
                <a class="a" href="home_page.php" style="display:block; width:30%;"><span style="color: #ff7315;"><i class="fa fa-fw fa-home"></i></span> Home page</a>
            </div>
            <span id="menu-icon" onclick="openNav()">&#9776;</span>
        </aside>
        <section class="one">
            <table class="first">
                <tr id="header">
                    <th></th>
                    <th>Adler</th>
                    <th>Billroth</th>
                    <th>Citygate</th>
                    <th>Hoffnung</th>
                    <th>Retz</th>
                    <th>Wienerberg</th>
                    <th>Phönix</th>
                    <th>Kwizda</th>
                    <th>Herba</th>
                    <th>Summe</th>
                </tr>
                <tr class="first">
                    <td>Bestellt</td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['adler_k']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['billroth_k']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['citygate_k']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['hoffnung_k']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['retz_k']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['wienerberg_k']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['phönix_k']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['kwizda_k']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['herba_k']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['Summe_k']);?></td>
                </tr>
                <tr class="first">
                    <td>Bekommt</td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['adler_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['billroth_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['citygate_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['hoffnung_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['retz_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['wienerberg_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['phönix_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['kwizda_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['herba_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['Summe_v']);?></td>
                </tr>
                <tr class="first">
                    <td>Übrig</td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['adler_k']) - intval($allResultArray[$SummeRowId]['adler_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['billroth_k']) - intval($allResultArray[$SummeRowId]['billroth_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['citygate_k']) - intval($allResultArray[$SummeRowId]['citygate_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['hoffnung_k']) - intval($allResultArray[$SummeRowId]['hoffnung_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['retz_k']) - intval($allResultArray[$SummeRowId]['retz_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['wienerberg_k']) - intval($allResultArray[$SummeRowId]['wienerberg_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['phönix_k']) - intval($allResultArray[$SummeRowId]['phönix_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['kwizda_k']) - intval($allResultArray[$SummeRowId]['kwizda_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['herba_k']) - intval($allResultArray[$SummeRowId]['herba_v']);?></td>
                    <td><?php echo intval($allResultArray[$SummeRowId]['Summe_k']) - intval($allResultArray[$SummeRowId]['Summe_v']);?></td>
                </tr>
            </table>
        </section>
        <section class="two">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" class="input" name="title" placeholder="Bezeichnung ..." required="required" autofocus="autofocus" />
                <small><?php echo $searchworkobject->error['title']; ?></small>
                <input type="submit" value="Suchen" class="button">
            </form>
        </section>
        <section class="three">
            <?php
            if(count($_POST) > 0) {
            $searchworkobject->titleValidate($_POST['title']);
            $searchworkobject->checkError();
            }
            ?>
        </section>
    </main>
    <script src="../script/searchwork_page.js"></script>
</body>
</html>