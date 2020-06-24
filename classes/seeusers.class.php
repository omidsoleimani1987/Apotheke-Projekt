<?php
    /**
     * first reads the all records of "users" table from db and then show it to user
     */
    class SeeUsers extends SetQuery {
        
        /**
         * read all records from "users" table of DB and preview all users to just admin(s) of website
         * @return void
         */
        public function readusers() {
            $usersInfo = $this->readusersInfo();
            for($i=0; $i<count($usersInfo); $i++) {
                echo "<tr>";
                foreach($usersInfo[$i] as $key => $value) {
                    echo '<td>'. $value . '</td>';
                }
                echo "</tr>";
            }
        }
    }