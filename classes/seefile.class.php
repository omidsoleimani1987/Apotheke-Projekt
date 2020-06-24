<?php
/**
 * after searching for the table, this class reads the records of the table and bring the infos to the user as a html table
 */
class SeeFile extends SetQuery {
    
    /**
     * a function to search an "id" from "buy" table of DB, then get the name of searched table and show it as html table to user
     *
     * @param int $id
     * @return void
     */
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