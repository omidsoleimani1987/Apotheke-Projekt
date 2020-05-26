<?php

    class SeeAll extends SetQuery {
        
        // we read all the records of the table "buy" to show them as a html table
        public function allBuy() {
            $allInfo = $this->readAllbuy();
            for($i=0; $i<count($allInfo); $i++) {
                echo "<tr>";
                foreach($allInfo[$i] as $key => $value) {
                    echo '<td>'. $value . '</td>';
                }
                echo "</tr>";
            }
        }
    }