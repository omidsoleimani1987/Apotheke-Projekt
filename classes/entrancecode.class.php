<?php
/**
 * this class compares the given code by user and the code in database
 */
class EntranceCode extends SetQuery {
    /**
     * this method sends a request to database to get the actual code from database and verify the code from db with the user code
     * the query is in the SetQuery class
     *  if true then send the user to the login page
     * @param string $userCode
     * @return void
     */
    public function checkCode($userCode) {
         
        $currentCode = $this->getCode();
       
            if(password_verify($userCode, $currentCode)) {
                header("Location: $app_path/app/login_page.php");
            }  else {
                $answer = 'wrong';
                return $answer;
            }
        
    }
    
}