<?php
    /**
     * this class reads all the records from "buy" table and show it all as a html table to the user
     */
    class SeeAll extends SetQuery {
        
        /**
         * reads all the records of the table "buy"
         *
         * @return void
         */
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