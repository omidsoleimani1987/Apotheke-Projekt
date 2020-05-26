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
 * validation:
 */
$fileobject = new UploadFile($_SESSION['username']);
/**
 * phpspreadsheet import link
 */
require $_SERVER["DOCUMENT_ROOT"].'/phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

if(count($_POST) > 0) {
    /**
     * validating the form inputs
     */
    $fileobject->yearValidate(trim($_POST['year']));
    $fileobject->monthValidate(trim($_POST['month']));
    $fileobject->companyValidate(trim($_POST['company']));
    $fileobject->typeValidate(trim($_POST['type']));
    $fileobject->sendtoValidate(trim($_POST['sendto']));
    $fileobject->detailValidate(trim($_POST['detail']));
    $fileobject->extensionValidate();
    /**
     * controlling error array
     */
    $resultStatus = $fileobject->checkError();
    if($resultStatus == true) {

        /////////////////////phpspreadsheet part////////////////////////
        
        $inputFileType = $_SESSION['libraryFileExtension'];
        $inputFileName = $_SESSION['libraryFilepath'];
        $reader = IOFactory::createReader($inputFileType);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $excel = $sheetData;

        /////////////////////end of phpspreadsheet part////////////////////////

        /**
         * now: create the database and then inserting the excel data into created database:
         */
        $savingResult = $fileobject->saveExcel($excel);
        if($savingResult == true) {
            //after insertion the excel file into DB , we delete the File of local storage:
            $fileToDelete = $_SESSION['libraryFilepath'];
            unlink($fileToDelete);
            $_SESSION['libraryFilename'] = '';
            $_SESSION['libraryFileExtension'] = '';
            $_SESSION['libraryFilepath'] = '';
            header ('location: home_page.php?message=Die Excel Datei wurde erfolgreich hochgeladen und gespeichert&status=success');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="omid soleimani" />
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/uploadfile_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <title>Datei hochladen</title>
</head>
<body>
    <header>
        <span id="pill-icon"><i class="fas fa-capsules"></i></span>
        <span id="back-icon"><a href="home_page.php"><i class="fas fa-arrow-circle-left"></i></a></span>
    </header>
    <main>
        <section class="flex container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" autocomplete="off" class="flex">

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
                <small><?php echo $fileobject->error['year']; ?></small>
                
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
                <small><?php echo $fileobject->error['month']; ?></small>

                <input list="company" class="input" name="company" placeholder="Firma" required pattern="[A-Za-z ]+" title="Just letters are accepted" value="<?php echo $fileobject->company; ?>"/>
                <small><?php echo $fileobject->error['company']; ?></small>
                <datalist id="company">
                    <option value="Genericon">
                    <option value="Kwizda">
                    <option value="PlusPharma">
                    <option value="Stada">
                    <option value="RatioPharm">
                </datalist>

                <input list="type" class="input" name="type" placeholder="Art" required pattern="[A-Za-z ]+" title="Just letters are accepted" value="<?php echo $fileobject->type; ?>" />
                <small><?php echo $fileobject->error['type']; ?></small>
                <datalist id="type">
                    <option value="RX">
                    <option value="OTC">
                    <option value="Nachlieferung">
                </datalist>
                
                <input list="sendto" class="input" name="sendto" placeholder="Es geht über" required pattern="[A-Za-z ]+" title="Just letters are accepted" value="<?php echo $fileobject->sendto; ?>"/>
                <small><?php echo $fileobject->error['sendto']; ?></small>
                <datalist id="sendto">
                    <option value="Schachinger">
                    <option value="Wienerberg">
                </datalist>

                <input type="text" class="input" name="detail" placeholder="Anmerkungen" value="<?php echo $fileobject->detail; ?>" required/>

                <input type="file" id="upload" name="excelfile" accept=".xls,.xlsx" required />
                <small><?php echo $fileobject->error['file']; ?></small>

                <input type="submit" value="Hochladen" class="button" />
            </form>
        </section>
    
    </main>
</body>
</html>