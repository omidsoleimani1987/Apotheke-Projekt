<?php

    class SeeUsers extends SetQuery {
        
        //read all info from "users" table of DB and preview all users to just admin(s) of website
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