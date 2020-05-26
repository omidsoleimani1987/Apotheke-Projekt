<?php

class SeeFile extends SetQuery {
    
    // a function to search an "id" from "buy" table of DB, then get the name of searched table and show it as ahtml table to user
    public function showTabledata($id) {

        $tableName = $this->getTablename($id);
        $_SESSION['fileTableName'] = $tableName;

        $tableArray = $this->getTabledata($tableName);

        for($i=0; $i<count($tableArray); $i++) {
            echo "<tr>";
            foreach($tableArray[$i] as $key => $value) {
                echo '<td>'. $value . '</td>';
            }
            echo "</tr>";
        }
    }
}