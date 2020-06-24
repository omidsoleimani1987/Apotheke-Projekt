<?php
/**
 * this class gets the infos like year and month anf the name of company to look in the database to find a match with this infos and bring it to the user
 */
class SearchFile extends SetQuery {
    /**
     * all these properties sre string values
     *
     * @var string
     */
    public  $year = '';
    public  $month = '';
    public  $company = '';
    public  $error = array('year'=>'', 'month'=>'', 'company'=>'');
    
    /**
     * validate if user chose the correct value for the year
     * if not sets the error in the error array 
     * @param string $data
     * @return void
     */
    public function yearValidate($data) {
        if(empty($data) || trim($data) == '') {
            $this->error['year'] = 'Das Feld "Jahr" ist auszufüllen.';
        } else {
            $this->year = htmlspecialchars(strtolower($data));
        }
    }
    
    /**
     * validate if user chose the correct value for the month
     * if not sets the error in the error array
     * @param string $data
     * @return void
     */
    public function monthValidate($data) {
        if(empty($data) || trim($data) == '') {
            $this->error['month'] = 'Das Feld "Monat" ist auszufüllen.';
        } else {
            $this->month = htmlspecialchars(strtolower($data));
        }
    }

    /**
     * validate if user chose the correct value for the company name
     * if not sets the error in the error array
     * @param string $data
     * @return void
     */
    public function companyValidate($data) {
        if(empty($data) || trim($data) == '') {
            $this->error['company'] = 'Das Feld "Firma" ist auszufüllen.';
        } else {
            $this->company = htmlspecialchars($data);
        }
    }

    /**
     * checks first the error array, when there is an error or errors, it returns an html to the screen to shows to the user that inserted field are not correct or fix the issues
     *
     * @return void
     */
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