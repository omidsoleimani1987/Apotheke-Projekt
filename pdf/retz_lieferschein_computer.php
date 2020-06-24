<?php

session_start();

//class auto loader:
require $_SERVER["DOCUMENT_ROOT"].'/includes/autoloader.inc.php';

//config:
require $_SERVER["DOCUMENT_ROOT"].'/includes/config.inc.php';

// check if user is logged in
userLoginStatus('Bitte loggen Sie zuerst ein.');

$tableName = $_SESSION['fileTableName'];
$find  = '_';
$pos = strpos($tableName, $find);
$company = substr($tableName, 0, $pos);

$arrayObject = new TableInfo($tableName);

$array = $arrayObject->tableArray;

//////////////////// ---------- dompdf part start---------- ////////////////////

// include autoloader
require $_SERVER["DOCUMENT_ROOT"].'/Dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

//make the content here:
////using the output buffer:
ob_start();
?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'helvetica';
    }
    .page-break {
        page-break-before: always;
    }
    .logo{
        /* to show in every page:fixed, and for just one page:absolute */
        position: absolute;
        top: 1cm;
        right: 1cm;
    }
    .sender {
        margin: 1cm 1.5cm 1cm 1.5cm;
        padding-bottom: 1.5cm;
        border-bottom: 1px solid rgb(149, 149, 149);
    }
    .receiver {
        margin: 1cm 1.5cm 1cm 1.5cm;
        padding-bottom: 1.5cm;
        border-bottom: 1px solid rgb(149, 149, 149);
    }
    .detail {
        margin: 1cm 1.5cm 1cm 1.5cm;
        padding-bottom: 1.5cm;
    }
    img {
        width: 3.5cm;
    }
    pre {
        margin-top: 15px;
    }
    /* ***************table**************** */
    table {
    border-collapse: collapse;
    padding: 50px 20px;
    width: 100%;
    margin: 100px 0;
    }
    th, td {
        text-align: left;
        border-bottom: 1px solid rgb(143, 143, 143);
    }
    th, .footer {
        padding: 15px 5px;
        background-color: #4b4b4b;
        color: #fff;
    }
    td {
        height: 40px;
        padding: 5px 5px;
        font-size: 14px;
    }
    tr:nth-child(odd) {
        background-color: #d8d9e2;
    }
    
</style>

<div class="logo">
<img src="../style/images/logo.png" alt="image">
</div>

<div class="sender">
<h1>Wienerberg-Apotheke</h1>
<pre>
Wienerberg Apotheke
Tesarekplatz 1
1100 Wien
Tel: +431 6160530
Fax: +431 6160530 5
info@wienerberg-apotheke.at
https://www.wienerberg-apotheke.at
</pre>
</div>

<div class="receiver">
<h2>Retz Apotheke</h2>
</div>

<div class="detail">
<h2>Lieferung Daten</h2>
<pre>
<?php echo "Firma: " . $company . '<br>'; ?>
<?php echo "Datum: " . date("Y-m-d"); ?>
</pre>    
</div>

<div class="page-break"></div>

<table>
    <tr>
        <th>PZN</th>
        <th>Bezeichnung</th>
        <th>Menge</th>
        <th>Einheit</th>
        <th>Bestellt</th>
        <th>Verkauf</th>
    </tr>
<?php
for($i=0; $i<count($array); $i++) {
    if($i != count($array)-1) {
        if(intval($array[$i]['retz_v']) != 0) {
            echo "<tr>";
            echo '<td>'. $array[$i]['pzn'] . '</td>';
            echo '<td>'. $array[$i]['Bezeichnung'] . '</td>';
            echo '<td>'. $array[$i]['Menge'] . '</td>';
            echo '<td>'. $array[$i]['Einheit'] . '</td>';
            echo '<td>'. $array[$i]['retz_k'] . '</td>';
            echo '<td>'. $array[$i]['retz_v'] . '</td>';
            echo "</tr>";
        }
    } else {
        echo '<tr class="footer">';
        echo '<td>Summe</td><td></td><td></td><td></td><td>'.$array[$i]['retz_k'].'</td><td>'.$array[$i]['retz_v'].'</td>';
        echo "</tr>";
    }
}
?>
</table>

<?php
$html = ob_get_clean();


$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

//Output the generated PDF to Browser(preview automatically)
$dompdf->stream('Lieferschein.pdf', Array('Attachment'=>0));

// Output the generated PDF to Browser(download automatically)
//$dompdf->stream('omid.pdf');

//////////////////////////////////////////////////////////////////////////////////