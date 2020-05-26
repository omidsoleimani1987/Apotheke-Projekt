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

<div class="sender">
<h1>Muster-Apotheke</h1>
<pre>
Lorem ipsum dolor sit, amet
Musterstraße 1
1220 Wien
Tel: 01 888 88 88
Fax: 01 888 88 88 8
info@muster-apotheke.at
http://www.muster-apotheke.at
</pre>
</div>

<div class="receiver">
<h2>Apotheke Name</h2>
<pre>
Mag. pharm. NAME...
Addresse
1010 Wien
</pre>
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
        <th>Prozent</th>
    </tr>
<?php
for($i=0; $i<count($array); $i++) {
    if($i != count($array)-1) {
        if(intval($array[$i]['kwizda_v']) != 0) {
            echo "<tr>";
            echo '<td>'. $array[$i]['pzn'] . '</td>';
            echo '<td>'. $array[$i]['Bezeichnung'] . '</td>';
            echo '<td>'. $array[$i]['Menge'] . '</td>';
            echo '<td>'. $array[$i]['Einheit'] . '</td>';
            echo '<td>'. $array[$i]['kwizda_k'] . '</td>';
            echo '<td>'. $array[$i]['kwizda_v'] . '</td>';
            echo '<td>'. $array[$i]['kwizda_prozent'] . '</td>';
            echo "</tr>";
        }
    } else {
        echo '<tr class="footer">';
        echo '<td></td><td></td><td></td><td></td><td></td><td>'.$array[$i]['kwizda_k'].'</td><td>'.$array[$i]['kwizda_v'].'</td><td></td>';
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