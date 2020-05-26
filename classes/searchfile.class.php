<?php

class SearchFile extends SetQuery {
    
    public  $year = '';
    public  $month = '';
    public  $company = '';
    public  $error = array('year'=>'', 'month'=>'', 'company'=>'');
    
    //validate inputs:
    public function yearValidate($data) {
        if(empty($data) || trim($data) == '') {
            $this->error['year'] = 'Das Feld "Jahr" ist auszufüllen.';
        } else {
            $this->year = htmlspecialchars(strtolower($data));
        }
    }
    
    public function monthValidate($data) {
        if(empty($data) || trim($data) == '') {
            $this->error['month'] = 'Das Feld "Monat" ist auszufüllen.';
        } else {
            $this->month = htmlspecialchars(strtolower($data));
        }
    }

    public function companyValidate($data) {
        if(empty($data) || trim($data) == '') {
            $this->error['company'] = 'Das Feld "Firma" ist auszufüllen.';
        } else {
            $this->company = htmlspecialchars($data);
        }
    }

    //check for errors:
    public function checkError() {
        $check = true;
        $error = $this->error;
        foreach($error as $key=>$value) {
            if($value !== '') {
                echo '<h1 class="error"><i class="fas fa-exclamation-triangle"></i> Bitte überprüfen Sie Ihre Eingaben!</h1>';
                $check = false;
                break;
            }
        }
        //everything is ok, we bring the result into a table:
        if($check) {
            $result = $this->searchFile($this->year, $this->company);
            echo "<table>";
            echo "<tr>";
            echo "<th>Id</th><th>Benutzer</th><th>Jahr</th><th>Monat</th><th>Firma</th><th>Art</th><th>Standort</th><th>Detail</th><th>Status</th><th>Datum</th>";
            echo "</tr>";
                    
            for($i=0; $i<count($result); $i++) {
                echo "<tr>";
                foreach($result[$i] as $key => $value) {
                    // I could not send a query with word "months" to database because I got everytime an error and I don't know why,maybe there is a problem in sql string with the exact word of "month", so I decided to do with a if condition:
                    if($result[$i]['months'] === $this->month) {
                        $id = $result[$i]['id'];
                        echo '<td><a class="table-link" href="seefile_page.php?id='. $id .'">' . $value . '</a></td>';
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
}